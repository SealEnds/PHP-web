<?php

require_once 'baseModel.php';

Class publication extends baseModel{
    private $id;
    private $category_id;
    private $users_id;
    private $title;
    private $content;
    private $img;
    private $publication_date;
    private $views;
    private $visibility; 

    public function __construct(){
        parent::__construct();
    }

    public function getId(){return $this->id;}
    public function setId($id){ $this->id = $id; }
    
    public function getCategoryId(){return $this->category_id;}
    public function setCategoryId($category_id){ $this->category_id = $category_id; }

    public function getUsersId(){return $this->users_id;}
    public function setUsersId($users_id){ $this->users_id = $users_id; }

    public function getTitle(){return $this->title;}
    public function setTitle($title){ $this->title = $title; }

    public function getContent(){return $this->content;}
    public function setContent($content){ $this->content = $content; }

    public function getImg(){return $this->img;}
    public function setImg($img){ $this->img .= $img; }

    public function getPublicationDate(){return $this->publication_date;}
    public function setPublicationDate($publication_date){ $this->publication_date = $publication_date; }

    public function getViews(){return $this->views;}
    public function setViews($views){ $this->views = $views; }

    public function getVisibility(){return $this->visibility;}
    public function setVisibility($visibility){ $this->visibility = $visibility; }

    public function incrementViews(){
        $this->views++;
    }

    public function save(){
        $sql = "INSERT INTO publications VALUES({$this->getId()}, {$this->getCategoryId()}, {$this->getUsersId()}, '{$this->getTitle()}', '{$this->getContent()}', '{$this->getImg()}', CURDATE(), 0, '{$this->getVisibility()}' );";
        $save = $this->db->query($sql);
        $save ? $result = true : $result = false;
        return $result; 
    }

    public static function getAll(){
        $db = Database::connect();
        $sql = "SELECT * FROM publications ORDER BY id DESC";
        $getAll = $db->query($sql);
        return $getAll;
    }

    // public static function getPublicationCategory($id){
    //     $db = Database::connect();
    //     $sql = "SELECT category_name FROM categories WHERE id={$id};";
    //     $categoryName = $db->query($sql);
    //     return $categoryName;
    // }

    // public static function getPublicationUser($id){
    //     $db = Database::connect();
    //     $sql = "SELECT username FROM users WHERE id={$id};";
    //     $userName = $db->query($sql);
    //     return $userName;
    // }
    // sustituidas por la de abajo
    public static function getPublicationInfo($id, $table, $search, $search2 = null){
        $db = Database::connect();
        $sql = "SELECT $search $search2 FROM $table WHERE id={$id};";
        $result = $db->query($sql);
        return $result;
    }

    // public static function showAll(){
    //     $publication = new Publication();
    //     $publications = $publication -> getAll();
    //     return $publications;
    // }
    // La conexión se tiene que volver a realizar por ser estático. En user y category se hizo creando un objeto con la conexión

    public function getAllByCategory(){
        $sql = "SELECT pub.*, cat.category_name FROM publications pub INNER JOIN categories cat ON cat.id = pub.category_id WHERE pub.category_id = {$this->getCategoryId()} ORDER BY id DESC";
        $getAll = $this->db->query($sql);
        return $getAll;
    }
    
    public function getAllByUser(){
        $sql = "SELECT pub.* FROM publications pub INNER JOIN users u ON u.id = pub.users_id  WHERE pub.users_id = {$this->getUsersId()} ORDER BY id DESC";
        $getAll = $this->db->query($sql);
        return $getAll;
    }

    public function detail(){
        $sql = "SELECT * FROM publications WHERE id={$this->getId()}";
        $detail = $this->db->query($sql);
        return $detail->fetch_object();
    }

    public function getLastId(){
        $sql = "SELECT id FROM publications ORDER BY id DESC LIMIT 1";
        $get = $this->db->query($sql);
        /*var_dump($get); die();*/
        return $get->fetch_object();
    }

}