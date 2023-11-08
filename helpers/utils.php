<?php
/* clase con métodos estáticos que se van a reutilizar para llamar más facilmente */
class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function checkSession($session){
        $message = '';
        $error = '';
        $result = ['message' => $message, 'error' => $error];
        if(isset($_SESSION[$session]) && $_SESSION[$session] == 'completed' ){
            $result['message'] = 'The '.$session.' was successfully completed';
            $result['error'] = false;
        }elseif(isset($_SESSION[$session]) && $_SESSION[$session] == 'failed'){
            $result['message'] = 'The '.$session.' failed, introuce the data correctly';
            $result['error'] = true;
        }    
        Utils::deleteSession($session);
        return $result;
    }
    
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

}