<?php
class Post {
    private $db;

    const TABLE_NAME = 'posts';

    public function __construct(){
        $this->db = new Database;
    }

    public function all($data)
    {
        $query = 'SELECT * FROM '.self::TABLE_NAME;
        if(array_key_exists('tag',$data)){
            $query.= ' WHERE tags LIKE \'%'.$data['tag'].'%\' ';
        }

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function find($data){
        $this->db->query('SELECT * FROM '.self::TABLE_NAME.' WHERE Post_ID = :postId');
        $this->db->bind(':postId',$data['postId']);
        return $this->db->single();
    }

    public function insert($data)
    {
        $this->db->query('INSERT INTO '.self::TABLE_NAME.'(title,body,user_id,tags) VALUES (:title,:body,:userId,:tags)');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':userId',$data['userId']);
        $this->db->bind(':tags',$data['tags']);
        return $this->db->execute();
    }

    public function update($data)
    {
        $this->db->query('UPDATE '.self::TABLE_NAME.' SET title = :title,body=:body,tags=:tags WHERE Post_ID = :postId');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':postId',$data['postId']);
        $this->db->bind(':tags',$data['tags']);
        return $this->db->execute();
    }


}