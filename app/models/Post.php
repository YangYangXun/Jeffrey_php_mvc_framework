<?php
class Post
{

    /* 
     * This model for biginner test!
     */
    
    
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts(){
      $this->db->query("SELECT * FROM posts");

      return $this->db->resultSet();
      
    }
}
