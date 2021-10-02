<?php

class Province
{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function all()
    {
        $this->db->query('SELECT * FROM province');
        return $this->db->resultset();
    }


    public function findByCountry($id){
        $this->db->query('SELECT * FROM province WHERE country_id = :country_id');
        $this->db->bind(':country_id',$id);
        return $this->db->resultset();
    }

}