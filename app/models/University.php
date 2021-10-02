<?php
class University{
    private $db;

    const TABLE_NAME = 'university';

    public function __construct(){
        $this->db = new Database;
    }

    public function all()
    {
        $this->db->query('SELECT * FROM '.self::TABLE_NAME);
        return $this->db->resultset();
    }

    public function selectTop($limit){
        $this->db->query('SELECT * FROM '.self::TABLE_NAME.' LIMIT '.$limit);
        return $this->db->resultset();
    }
    
} 