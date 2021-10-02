<?php

class Country
{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all()
    {
        $this->db->query('SELECT * FROM country');
        return $this->db->resultset();
    }
}