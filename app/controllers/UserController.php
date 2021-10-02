<?php
class UserController extends Controller{

    public function __construct(){
        $this->universityModel = $this->model('University');
        $this->userModel = $this->model('User');
        $this->userUniversityModel = $this->model('UserUniversity');
        $this->majorModel = $this->model('Major');
        $this->countryModel = $this->model('Country');
    }

    public function index(){
        $this->view('user/signup_choice');
    }

    public function signupProspective()
    {
        $countries = $this->countryModel->all();
        $data= [];
        if(isset($_SESSION['data'])){
             $data = array_merge($data,$_SESSION['data']);
        }
        $data['countries']=$countries;
        unset($_SESSION['data']);

        $this->view('user/signup_prospective',$data);
    }

    public function signupUniStudent()
    {
        $universities = $this->universityModel->all();
        $countries = $this->countryModel->all();
        $data= [];
        if(isset($_SESSION['data'])){
            $data = array_merge($data,$_SESSION['data']);
        }
        $data['universities']=$universities;
        $data['countries']=$countries;

        unset($_SESSION['data']);

        $this->view('user/signup_unistudent',$data);
    }

    public function signupTeacher()
    {
        $universities = $this->universityModel->all();
        $countries = $this->countryModel->all();
        $data= [];
        if(isset($_SESSION['data'])){
            $data = array_merge($data,$_SESSION['data']);
        }
        $data['universities']=$universities;
        $data['countries']=$countries;
        unset($_SESSION['data']);

        $this->view('user/signup_teacher',$data);
    }

    public function signInSubmit(){
        if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
            die("402 Unsupported htt p method");
        }

        $data = [
            'firstName' => trim($_POST['firstName']),
            'lastName' => trim($_POST['lastName'])
        ];
    
        //$insert = $this->userModel;
    }
    
    public function save(){
        $userType = $_POST['user_type'];

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING); 

        $data = [
            'First_Name'=>$_POST['First_Name'],
            'Last_Name'=>$_POST['Last_Name'],
            'Password'=>$_POST['Password'],
            'Email'=>$_POST['Email'],
            'DOB'=>$_POST['DOB'],
            'Gender'=>$_POST['Gender'],
            'user_Type'=>$_POST['user_type'],
            'Confirm_Password'=>$_POST['Confirm_Password'],
            'phone_number'=>$_POST['Phonenbr'],
            'linked_in_account'=>$_POST['linked_in_account'],
            'country_id'=>$_POST['country_id'],
            'province_id'=>$_POST['province_id'],
            'city_id'=>$_POST['city_id']
        ];

        $view = '';
        switch($userType){
            case 'prospective':
                $data += [
                    'grade'=>$_POST['grade'],
                    'school_name'=>$_POST['school_name']
                ];
                $redirect = 'signupProspective';
                break;
            case 'teacher':
                $data['organization'] = $_POST['organization'];
                $data['department'] = $_POST['department'];
                $data['position'] = $_POST['position'];
                if(isset($_POST['university_id'])){
                    $data += [
                        'university_id'=>$_POST['university_id']
                    ];
                }else{
                    $data += [
                        'university_id'=>[]
                    ];
                }

                $redirect = 'signupTeacher';
                break;
            case 'unistudent':
                $data += [
                    'university_id'=>$_POST['university_id'],
                    'major_id'=>$_POST['major_id'],
                    'standing'=>$_POST['standing'],
                    'branch_id'=>$_POST['branch_id'],
                    'personal_email'=>$_POST['personal_email']
                ];
                $redirect = 'signupUnistudent';
                break;
        }

        if($this->validateSaveUserRequest($data) == 0){
            unset($_SESSION['errorMessages']);
            if($this->userModel->insert($data)){
                redirect('user/login?message=You can now login');
            }else{
                die("Error Occured");
            }
        }else{
            $_SESSION['data'] = $data;
            redirect('user/'.$redirect);
        }
    }


    public function login(){
        $message = '';
        //echo $_SESSION['user_id'];die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['Email'];
            $data = [
                'email' =>$email,
                'password'=>$_POST['Password']
            ];
            $user = $this->userModel->attemptLogin($data);
            if($user != null){
                $message = 'LOGIN SUCCESS, Waiting For Profile PAGE! :)';
                $_SESSION['user_id'] = $user->User_ID;
                if($user->user_Type == 'teacher'){
/*                    $userUniversities = $this->userUniversityModel->all(['user_id'=>$user->User_ID]);
                    $universities = [];
                    foreach($userUniversities as $userUniversity){
                        $universities[$userUniversity->university_id] = $userUniversity->University_Name;
                    }
                    $user->universities = $universities;*/
                }
                $_SESSION['user'] = $user;
                redirect('post');
            }else{
                $message = 'Incorrect email/password';
            }
            $data['email'] = $email;
        }
        $data['message'] = $message;
        return $this->view('user/login',$data);
    }

    public function logout(){
        unset($_SESSION['user_id']);
        redirect('user/login');
    }

    public function forgetPassword(){
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['Email'];
            $data = [
                'email' =>$email
            ];

            $user = $this->userModel->findByMail($data);
            if($user != null){
                $val1 = SecurityUtil::encrypt_decrypt('encrypt',$email.time());//openssl_encrypt();
                $val2 = SecurityUtil::encrypt_decrypt('encrypt',time());//openssl_encrypt(time());

                $resetLink = '<a href="'.URLROOT.'user/resetPassword?val1='.$val1.'&val2='.$val2.'">Reset Password</a>';
                $mailBody = "Dear User,</br>You have requested to reset your password.</br>Please click on the below link:</br>".$resetLink."</br></br>If you didn't request to reset your password, don't worry your account is safe as long as you don't send this link to anyone.</br>Best Regards";
                $mailSender = new MailSender();
                $mailSender->toAddress = $user->Email;
                $mailSender->toName = $user->First_Name." ".$user->Last_Name;
                $mailSender->subject = 'Password Reset';
                $mailSender->body = $mailBody;
                if($mailSender->sendMail()){
                    $message = 'Reset password mail has been sent to your email. Kindly check your inbox';
                }else{
                    $message = 'There was an error resetting your password, kindly try again later';
                }
            }else{
                $message = 'Invalid Email';
            }
        }
        $data['message'] = $message;
        return $this->view('user/forget-password',$data);
    }

    public function resetPassword(){
        $val1 = $_GET['val1'];
        $val2 = $_GET['val2'];

        $time = SecurityUtil::encrypt_decrypt('decrypt',$val2);//openssl_decrypt($val2);
        $val1Decrypted = SecurityUtil::encrypt_decrypt('decrypt',$val1);//openssl_decrypt($val1);

        if(strpos($val1Decrypted,$time) !== false){
            $isAuthorized = true;
            $email = str_replace($time,'',$val1Decrypted);
            $data['email'] = $email;
            $user = $this->userModel->findByMail($data);

            if($user != null){

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if($user != null){
                        $data['Password'] = $_POST['Password'];
                        if($this->userModel->updatePassword($data)){
                            $data['passwordReset'] = true;
                        }else{
                            $data['passwordReset'] = false;
                        }
                    }else{
                        //$message = 'Invalid Email';
                        $isAuthorized = false;
                    }
                }else{
                    $data['Full_Name'] = $user->First_Name." ".$user->Last_Name;
                }
            }else{
                $isAuthorized = false;
            }

        }else{
            $isAuthorized = false;
        }
        $data['isAuthorized'] = $isAuthorized;
        $data['val1']=$val1;
        $data['val2']=$val2;
        return $this->view('user/reset-password',$data);
    }

    public function profile($userId = ''){

        $canEdit = false;

        if($userId == ''){
            $userId = $_SESSION['user_id'];
            $canEdit = true;
        }
        $user = $this->userModel->find(['user_id'=>$userId]);
        /*var_dump($user);
        die();*/
        if(count($user) > 0) {
            $user = $user[0];
            /*        if($userId != '' && $userId != null){
                        $user =$this->userModel->find(['user_id'=>$userId]);
                        $user = $user[0];
                    }else{
                        $canEdit = true;
                        $user = $_SESSION['user'];
                    }*/
            if ($user == null) {
                return redirect('user/login');
            }

            $data = [];
            if ($user->user_Type == 'teacher') {
                $universities = $this->universityModel->all();
                $data['universities'] = $universities;

            } else if ($user->user_Type == 'unistudent') {
                $universities = $this->universityModel->all();
                $majors = $this->majorModel->findByUniversity(['university_id' => $user->university_id]);
                $data['universities'] = $universities;
                $data['majors'] = $majors;
            }

            $data['user'] = $user;
            $data['canEdit'] = $canEdit;
        }

        return $this->view('user/profile',$data);
    }

    public function saveProfile(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_SESSION['user'];
            $requestParams = ['Bio','hobbies','clubs','ask_me'];

            switch($user->user_Type){
                case 'prospective':
                    $requestParams[] = 'grade';
                    $requestParams[] = 'school_name';
                    break;
                case 'teacher':
                    $requestParams[] = 'university_id';
                    break;
                case 'unistudent':
                    $requestParams[] = 'university_id';
                    $requestParams[] = 'major_id';
                    $requestParams[] = 'standing';
                    break;
            }
            foreach ($requestParams as $param){
                $data[$param] = isset($_POST[$param])?$_POST[$param]:$user->$param;
            }
            $data['requestParams'] = $requestParams;
            $data['user_id'] = $user->User_ID;
            $data['user_type'] = $user->user_Type;
            $this->userModel->update($data);
            return redirect('user/profile');
        }
     }

    private function validateSaveUserRequest($data)
    {
        $nbrErrors = 0;
        $required = ['First_Name','Last_Name','Password','Email'];
        for($i=0;$i<count($required);$i++){
            if($data[$required[$i]] == ''){
                $data[$required[$i].'_err'] = str_replace('_',' ',$required[$i]).' cannot be empty';
                $nbrErrors++;
            }
        }

        $user = $this->userModel->findByMail(['email'=>$data['Email']]);
        if($user != null && $user->User_ID > 0){
            $data['Email_err'] = 'Email already exists';
            $nbrErrors++;
        }

        if(strlen($data['Password']) < 8){
            $data['Password_err'] = 'Password must be at least 8 characters';
            $nbrErrors++;
        }
        if($data['Password'] != $data['Confirm_Password']){
            $data['Confirm_Password_err']= 'Passwords don\'t match';
            $nbrErrors++;
        }
        return $nbrErrors;
    }
}