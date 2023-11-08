
<?php

require_once 'baseModel.php';

class Category extends baseModel{
    private $id;
    private $category_name;
    private $category_description;

    public function __construct(){
        parent::__construct(); 
    }

    public static function showCategories(){
        $category = new Category();
        $categories = $category -> getAll();
        return $categories;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id; }
    
    public function getCategoryName(){ return $this->category_name; }
    public function setCategoryName($category_name){ $this->category_name = $this->db->real_escape_string($category_name); }

    public function getCategoryDescription() { return $this->category_description;}
    public function setCategoryDescription($category_description){ $this->category_description = $this->db->real_escape_string($category_description); }

    public function save(){
        $sql = "INSERT INTO categories VALUES(NULL, '{$this->getCategoryName()}', '{$this->getCategoryDescription()}');";
        $save = $this->db->query($sql);
        $result = false;
        var_dump($save);
        var_dump($result);
        if($save){
            $result = true;
        }
        return $result;
    }

    public function update(){

    }

    public function delete(){
        $sql = "DELETE FROM categories WHERE id={$this->getId()};"; 
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

    public function getAll(){
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $getAll = $this->db->query($sql);
        return $getAll;
    } 

    public function getOne(){
        $sql = "SELECT * FROM categories WHERE id={$this->getId()}";
        $getOne = $this->db->query($sql);
        return $getOne->fetch_object();
    } 

}