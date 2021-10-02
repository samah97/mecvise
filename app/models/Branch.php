<?php

class Branch
{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findByUniversity($id){
        $this->db->query('SELECT * FROM branch WHERE university_id = :universityId');
        $this->db->bind(':universityId',$id);
        return $this->db->resultset();
    }
}