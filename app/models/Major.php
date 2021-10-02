<?php
class Major{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all()
    {
        $this->db->query('SELECT * FROM major');
        return $this->db->resultset();
    }

    public function findByUniversity($data){
        $query = 'SELECT a.* FROM major a 
        JOIN faculty b ON a.fac_id=b.Faculty_ID 
        JOIN university c ON b.Uni_id = c.Uni_ID 
        WHERE c.Uni_id = :university_id';
        
        $this->db->query($query);
        $this->db->bind(':university_id',$data['university_id']);
        return $this->db->resultset();
    }
    
} 