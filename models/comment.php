<?php

require_once 'baseModel.php';

class Comment extends baseModel{
    private $id;
    private $users_id;
    private $publication_id;
    private $content;
    private $comment_date;

    public function __construct(){
        parent::__construct(); 
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id; }

    public function getUsersId(){ return $this->users_id; }
    public function setUsersId($users_id){ $this->users_id = $this->db->real_escape_string($users_id); }
    
    public function getPublicationId(){ return $this->publication_id; }
    public function setPublicationId($publication_id){ $this->publication_id = $this->db->real_escape_string($publication_id); }

    public function getContent() { return $this->content; }
    public function setContent($content){ $this->content = $this->db->real_escape_string($content); }

    public function getCommentDate() { return $this->comment_date; }
    public function setCommentDate($comment_date){ $this->comment_date = $this->db->real_escape_string($comment_date); }

    public function save(){
        $sql = "INSERT INTO comments VALUES(NULL, '{$this->getUsersId()}', '{$this->getPublicationId()}', '{$this->getContent()}', CURDATE() );";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function update(){

    }

    public function delete(){
        $sql = "DELETE FROM comments WHERE id={$this->getId()};"; 
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

    public function getAllByPublication($id){
        $sql = "SELECT c.*, u.username, u.surname FROM comments c INNER JOIN publications pub ON pub.id = c.publication_id INNER JOIN users u ON u.id = c.users_id WHERE c.publication_id = $id";
        $getAll = $this->db->query($sql);
        return $getAll;
    } 

    public function getOne(){
        $sql = "SELECT users_id FROM comments WHERE id = {$this->id}";
        $getOne = $this->db->query($sql);
        return $getOne->fetch_object();
    }

}