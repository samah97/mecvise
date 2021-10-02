<?php

class PostController extends Controller{

    public function __construct(){
        if(!isset($_SESSION['user_id'])){
            return redirect('user/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->majorModel = $this->model('Major');
        $this->universityModel = $this->model('University');
    }

    public function index(){
        $filter= [];
        if(isset($_GET['tag']) && $_GET['tag'] != '' && array_key_exists($_GET['tag'],CommonValues::TAGS)){
            $filter['tag'] = $_GET['tag'];
        }
        $posts = $this->postModel->all($filter);
        $topUniversities = $this->universityModel->selectTop(3);
        $data['posts'] = $posts;


        $this->view('post/index',[
            'posts'=>$posts,
            'topUniversities'=>$topUniversities,
            'addGoogleAds'=>true
        ]);
    }

    public function create($postId=null){
        $isEdit = false;
        $isView = false;
        if($postId != null){
            $data['postId'] = $postId;
            $post = $this->postModel->find($data);
            if($post->user_id == $_SESSION['user_id']){
                $isEdit = true;
            }else{
                $isView = true;
            }
            $data['post'] = $post;
        }
        $data['isEdit']= $isEdit;
        $data['isView']= $isView;

        return $this->view('post/create',$data);
    }

    public function save(){
        $postId = isset($_POST['postId'])?$_POST['postId']:0;

        $data = [
            'title'=> $_POST['title'],
            'body'=> $_POST['body'],
            'userId' =>$_SESSION['user_id'],
            'tags'=>implode(',',$_POST['tags'])
        ];
        if($postId > 0 ){
            $data['postId'] = $postId;
            $result = $this->postModel->update($data);
        }else{
            $result= $this->postModel->insert($data);
        }
/*        if($result){
            return $this->view('post/index');
        }else{
            $data['message'] = 'There was an error creating post';
            return $this->view('post/create',$data);
        }*/
        redirect('post');
    }

    public function meetPeople(){
        $data['universityId'] = 0;
        $data['majorId'] = 0;
        $data['standing'] = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['universityId'] = isset($_POST['universityId'])?$_POST['universityId']:0;
            $data['majorId'] = isset($_POST['majorId'])?$_POST['majorId']:0;
            $data['standing'] = isset($_POST['standing']) && $_POST['standing']!=''?$_POST['standing']:null;
        }

        $data['user_id']=$_SESSION['user_id'];
        $users = $this->userModel->allExceptId($data);
/*        var_dump($users);
        die();*/
        $majors = $this->majorModel->all();
        $universities = $this->universityModel->all();

        //$data['users']=$users;
        $data += [
            'users'=>$users,
            'majors'=>$majors,
            'universities'=>$universities
        ];


        return $this->view('post/meet-people',$data);
    }
}