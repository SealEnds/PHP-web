
<?php

require_once 'models/comment.php';

class commentController{

    public function save(){
        if(isset($_POST['comment-content']) && isset($_SESSION['identity'])){
            
            $users_id = $_SESSION['identity'] -> id;
            $pub_id = $_SESSION['seeing-pub'];

            $comment_content = isset($_POST['comment-content']) && !empty($_POST['comment-content']) ? $_POST['comment-content'] : false;
        
            if($comment_content){
                $comment = new Comment(); 
                $comment -> setPublicationId($pub_id);
                $comment -> setUsersId($users_id);
                $comment -> setContent($comment_content);
                $save = $comment -> save();
                if($save){
                    $_SESSION['publish-comment'] = 'completed';
                }else{
                    $_SESSION['publish-comment'] = 'failed';
                } 
            }else {
                $_SESSION['publish-comment'] = 'failed';
                
            }
            header("Location: ".base_url.'publication/detail&id='.$pub_id);
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $comment_id = $_GET['id'];
            $session_users_id = $_SESSION['identity'] -> id;
            $pub_id = $_SESSION['seeing-pub'];
            
            // obtener id usuario del comentario con id = $comment_id
                $comment = new Comment(); 
                $comment -> setId($comment_id);
                $users_id = $comment -> getOne() -> users_id;

            // comparar session_users_id con users_id

                if($users_id == $session_users_id){
                    $delete = $comment -> delete();
                }
                
                if($delete){
                    $_SESSION['delete-comment'] = 'completed';
                }else{
                    $_SESSION['delete-comment'] = 'failed';
                } 
            
            header("Location: ".base_url.'publication/detail&id='.$pub_id);
        }
    }
    
}