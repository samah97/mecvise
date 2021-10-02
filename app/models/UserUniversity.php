<?php
class UserUniversity {
    private $db;

    const TABLE_NAME = 'user_university';

    public function __construct(){
        $this->db = new Database;
    }

    public function all($data)
    {
        $query = 'SELECT a.*,b.University_Name 
                  FROM '.self::TABLE_NAME.' a
                  LEFT JOIN '.University::TABLE_NAME.' b ON a.university_id=b.Uni_ID';
        if(array_key_exists('user_id',$data)) {
            $query .= ' WHERE user_id = :user_id ';
        }
        $this->db->query($query);
        if(array_key_exists('user_id',$data)) {
            $this->db->bind(':user_id',$data['user_id']);
        }
        return $this->db->resultset();
    }
}