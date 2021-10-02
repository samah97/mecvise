<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all()
    {
        $this->db->query('SELECT * FROM user');
        return $this->db->resultset();
    }

    public function find($data){
        $query = 'SELECT a.*,b.universities_ids,b.universities_names, c.`Acronym` AS university_name
                    FROM USER a 
                    LEFT OUTER JOIN (SELECT user_id,GROUP_CONCAT(university_id) AS universities_ids,GROUP_CONCAT(b.`Acronym`)  AS universities_names FROM user_university a LEFT JOIN university b ON a.`university_id` = b.`Uni_ID` GROUP BY user_id) b ON a.User_ID=b.user_id
                    LEFT OUTER JOIN university c ON a.`university_id` = c.`Uni_ID` 
                    WHERE a.user_id = :userId';
        /*die($query);*/
        $this->db->query($query);
        $this->db->bind(':userId',$data['user_id']);
        return $this->db->resultset();
    }

    public function insert($data){
        $insertColumns = ['First_Name','Last_Name','Email','Password','DOB','Gender','user_Type',"phone_number","linked_in_account",'country_id','province_id','city_id'];
        //$insertColumns = ['First_Name','Last_Name','Email','Password','DOB','Gender','user_Type',"Phonenbr"];
        //$insertValues = [':firstName',':lastName',':email',':password',':dob',':gender',':user_type',"phone_number"];
        $insertValues = [':firstName',':lastName',':email',':password',':dob',':gender',':user_type',":phone_number",":linked_in_account",':country_id',':province_id',':city_id'];
        //$hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);

        $data['Password'] = password_hash($data['Password'], PASSWORD_BCRYPT);
        switch($data['user_Type']){
            case 'prospective':
                $insertColumns = array_merge($insertColumns,['grade','school_name']);
                $insertValues= array_merge($insertValues,[':grade',':school_name']);
                    break;
            case 'teacher':
                $insertColumns = array_merge($insertColumns,['organization','department','position']);
                $insertValues= array_merge($insertValues,[':organization',':department',':position']);
                break;
            case 'unistudent':
                $insertColumns = array_merge($insertColumns,['university_id','major_id','standing','personal_email','Gpa','MaritalStatus','branch_id']);
                $insertValues= array_merge($insertValues,[':university_id',':major_id',':standing',':personal_email',':gpa',':marital_status',':branch_id']);
        }

        $query = "INSERT INTO `user`(".implode(',',$insertColumns).") VALUES (".implode(',',$insertValues).")";

        echo $query;
        echo "</br></br></br>";
        echo "-------------DATA------------------";
        echo "</br></br></br>";
        print_r($data);
        //die();
        $this->db->query($query);
/*        echo "</br></br></br>";
        echo "COUNT COLUMNS = ".count($insertColumns);
        echo "</br></br></br>";
        echo "COUNT VALUES = ".count($insertValues);
        echo "</br></br></br>";*/
        for($i=0;$i<count($insertColumns);$i++){
            //echo "</br></br></br>";

            //echo "Binding ".$insertValues[$i]." TO ".$data[$insertColumns[$i]];
            $this->db->bind($insertValues[$i],$data[$insertColumns[$i]]);
        }
        //echo "</br></br></br>";
        //echo "<h1 style='color:green'>ALL IS FINE</h1>";
        //die();
        //echo "</br></br></br>";

        if($this->db->execute()){
            echo "<h1 style='color:green'>ALL IS FINE</h1>";
            die();
            if($data['user_Type'] == 'teacher'){
                $userId = (int)$this->db->lastInsertId();
                $query = "INSERT INTO user_university(user_id, university_id) VALUES (:user_id,:university_id)";//(".implode(',',$insertValues).")";                
                for($i=0;$i<count($data['university_id']);$i++){
                    $this->db->query($query);
                    $this->db->bind(':user_id',$userId);
                    $this->db->bind(':university_id',$data['university_id'][$i]);
                    $this->db->execute();
                }
            }
            return true;
        }else{
            echo "<h1 style='color:red'>FAILLLL</h1>";
            die();
            return false;
        }
    }

    public function attemptLogin($data){
        $user = $this->findByMail($data);
        if($user != null){
            if(! password_verify($data['password'],$user->Password)){
                return null;
            }
        }
        return $user;
    }
    public function findByMail($data){
        $query = 'SELECT a.*,b.universities_ids,b.universities_names, c.`Acronym` AS university_name
                    FROM `user` a 
                    LEFT OUTER JOIN (SELECT user_id,GROUP_CONCAT(university_id) AS universities_ids,GROUP_CONCAT(b.`Acronym`)  AS universities_names FROM user_university a LEFT JOIN university b ON a.`university_id` = b.`Uni_ID` GROUP BY user_id) b ON a.User_ID=b.user_id
                    LEFT OUTER JOIN university c ON a.`university_id` = c.`Uni_ID`
                    where Email = :email';

        $this->db->query($query);
        $this->db->bind(':email',$data['email']);
        $result = $this->db->resultset();

        if($result && count($result) > 0){
            return $result[0];
        }
        return null;
    }

    public function updatePassword($data){
        $password = password_hash($data['Password'],PASSWORD_BCRYPT);
        $this->db->query('UPDATE user SET Password = :password');
        $this->db->bind(':password',$password);
        return $this->db->execute();
    }

    public function update($data){
        $updateColumns = ['Bio','hobbies','clubs','ask_me'];
        $updateValues = [':bio',':hobbies',':clubs',':ask_me'];

        switch($data['user_type']){
            case 'prospective':
                $updateColumns = array_merge($updateColumns,['grade','school_name']);
                $updateValues= array_merge($updateValues,[':grade',':school_name']);
                break;
            case 'teacher':
                break;
            case 'unistudent':
                $updateColumns = array_merge($updateColumns,['university_id','major_id','standing']);
                $updateValues= array_merge($updateValues,[':university_id',':major_id',':standing']);
        }

        //$query = "UPDATE user SET(".implode(',',$updateColumns).") VALUES (".implode(',',$insertValues).")";
        $query = "UPDATE user SET ";
        for ($i=0;$i<count($updateColumns);$i++){
            $query .= $updateColumns[$i].'='.$updateValues[$i].', ';
        }
        $query = rtrim($query, ", ");
        $query.=' WHERE User_ID=:userId';

        $this->db->query($query);
        //var_dump($data);die();
        for ($i=0;$i<count($updateValues);$i++){
            $this->db->bind($updateValues[$i],$data[$data['requestParams'][$i]]);
        }
        $this->db->bind('userId',$data['user_id']);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function allExceptId($data){

        $query = 'SELECT a.*,b.universities_ids,b.universities_names, c.`Acronym` AS university_name,d.Major_Name as major_name
                    FROM USER a 
                    LEFT OUTER JOIN (SELECT user_id,GROUP_CONCAT(university_id) AS universities_ids,GROUP_CONCAT(b.`Acronym`)  AS universities_names FROM user_university a LEFT JOIN university b ON a.`university_id` = b.`Uni_ID` GROUP BY user_id) b ON a.User_ID=b.user_id
                    LEFT OUTER JOIN university c ON a.`university_id` = c.`Uni_ID`
                    LEFT OUTER JOIN major d ON a.`major_id` = d.`Major_id`
                    WHERE a.user_id != :userId ';

        //$query = 'SELECT * FROM user WHERE user_id != :userId ';
        if($data['universityId'] > 0){
            $query.= ' AND (university_id = :universityId OR (user_type=\'teacher\' AND a.User_ID IN (select user_id FROM user_university where university_id = :universityId ))) ';
        }
        if($data['majorId'] > 0){
            $query.= ' AND a.major_id = :majorId';
        }
        if($data['standing'] != null){
            $query.= ' AND standing = :standing';
        }
       // die($query);
        $this->db->query($query);
        $this->db->bind(':userId',$data['user_id']);
        if($data['universityId'] > 0){
            $this->db->bind(':universityId',$data['universityId']);
        }
        if($data['majorId'] > 0){
            $this->db->bind(':majorId',$data['majorId']);
        }
        if($data['standing'] != null){
            $this->db->bind(':standing',$data['standing']);
        }
        return $this->db->resultset();
    }
}
?>