<?php

class baseModel{
    public $db;
    public function __construct(){
        $this->db = Database::Connect();
    }

    public function searchInDatabase($search, $pub, $cat, $us){
        // $sql = "SELECT * FROM $tabla LIKE '%$search%'";
        $pub == true ? $sql1 = "SELECT * FROM publications WHERE publications.title LIKE '%$search%' OR publications.content LIKE '%$search%'" : $sql1 = "false"; 
        $cat == true ? $sql2 = "SELECT * FROM categories WHERE categories.category_name LIKE '%$search%'" : $sql2 = "false";
        $us == true ? $sql3 = "SELECT * FROM users WHERE users.username LIKE '%$search%' OR users.surname LIKE '%$search%'" : $sql3 = "false";
        $sql_array = array(
            "pub" => $sql1,
            "cat" => $sql2,
            "us" => $sql3
        );

        $result_array = array();
        foreach($sql_array as $ind_search){
            if($ind_search != "false"){
                $result = $this->db->query($ind_search);
                $table = trim(explode("WHERE", explode("FROM", $ind_search)[1])[0]);
                $result_array[$table] = $result;
            }
        }
        return $result_array;
    }

}