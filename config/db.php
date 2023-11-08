<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'admin', '6721', 'station');
        /* error */
        if ($db -> connect_error) {
            echo "Failed to connect to MySQL: " . $db -> connect_error;
            exit();
        }
        // consulta para que los resultados sean utf8
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}