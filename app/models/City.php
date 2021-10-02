<?php

class City
{

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findByProvince($id){
        $this->db->query('SELECT * FROM city WHERE province_id = '.$id);
        return $this->db->resultset();
    }


}