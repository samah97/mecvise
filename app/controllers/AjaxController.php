<?php
class AjaxController extends Controller{

    public function __construct(){
        $this->majorModel = $this->model('Major');
        $this->provinceModel = $this->model('Province');
        $this->cityModel = $this->model('City');
        $this->branchModel = $this->model('Branch');
    }

    public function majors(){
        $data['university_id']=$_POST['university_id'];
        $majors = $this->majorModel->findByUniversity($data);
        echo json_encode($majors);
    }

    public function provinces(){
        $id = $_POST['country_id'];
        $provinces = $this->provinceModel->findByCountry($id);
        echo  json_encode($provinces);
    }

    public function cities(){
        $id = $_POST['province_id'];
        $cities = $this->cityModel->findByProvince($id);
        echo  json_encode($cities);
    }

    public function branches(){
        $id = $_POST['university_id'];
        $branches = $this->branchModel->findByUniversity($id);
        echo  json_encode($branches);
    }

   
}