<?php

require_once 'models/publication.php';
require_once 'models/user.php';
require_once 'models/comment.php';

class publicationController{

    public function index(){
        
        $publication = new Publication();
        $recent_publications = $publication -> getAll();
        // renderizar vista
        require_once 'views/publication/recent.php';
    }

    public function save(){
        if(isset($_POST) && isset($_SESSION['identity'])){
            
            $users_id = $_SESSION['identity'] -> id;

            $category = isset($_POST['category']) && !empty($_POST['category']) ? $_POST['category'] : false;
            $title = isset($_POST['title']) && !empty($_POST['title']) ? $_POST['title'] : false;
            $content = isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : false;
            $visibility = isset($_POST['visibility']) && !empty($_POST['visibility']) ? $_POST['visibility'] : false;
        
            if($category && $title && $visibility){
                $publication = new Publication(); 
                $publication -> setCategoryId($category);
                $publication -> setUsersId($users_id);
                $publication -> setTitle($title);
                $publication -> setContent($content);
                $publication -> setVisibility($visibility);

                $next_id = strval(intval(($publication -> getLastId())->id) + 1);
                $publication->setId($next_id);

                // $create_dir = $publication -> getLastId();
                // $id = $create_dir -> id;
                // Imagen
                if(isset($_FILES['pub-images']) && !empty(array_filter($_FILES['pub-images'])) ){ 
                    $images_array = array();

                    foreach($_FILES['pub-images']['tmp_name'] as $index => $pub_file){
                        $filename = $_FILES['pub-images']['name'][$index];
                        $filename_tmp = $_FILES['pub-images']['tmp_name'][$index];
                        $mimetype = $_FILES['pub-images']['type'][$index];
                        if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        if(!is_dir('uploads/publications/'.$next_id)){
                            mkdir('uploads/publications/'.$next_id, 0777, true);
                        }
                        move_uploaded_file($filename_tmp, 'uploads/publications/'.$next_id.'/'.$filename);
                        }
                        // $publication->setImg($filename);

                        $images_array[$index] = [
                            "filename" => $filename,
                            "mimetype" => $mimetype
                        ];
                        
                        
                    }
                }
                $images_array_encoded = json_encode($images_array);
                // var_dump($images_array_encoded); die();
                $publication -> setImg($images_array_encoded);
                // var_dump($publication -> getImg()); die();

                $save = $publication -> save();
                if($save){
                    $_SESSION['publish'] = 'completed';
                }else{
                    $_SESSION['publish'] = 'failed';
                } 
            }else {
                $_SESSION['publish'] = 'failed';
                
            }
            header("Location: ".base_url.'user/account');
            $publication = new Publication();
        }
    }

    public function moderation(){
        Utils::isAdmin();

        $categoriesToConsult = array();
        $usersToConsult = [];
        // parrafada que se puede evitar con dos INNER JOIN
        $publications = Publication::getAll();
        while($pub = $publications -> fetch_object()){
            foreach ($pub as $key => $value) {
                if($key == 'category_id'){
                    $categoryName = Publication::getPublicationInfo($value, 'categories', 'category_name');   
                    $categoriesToConsult[$value] = $categoryName->fetch_object();
                }else if($key == 'users_id'){
                    $query = Publication::getPublicationInfo($value, 'users', 'username', ', email');  
                    while($result = $query -> fetch_object()){
                        $username = $result->username;
                        $email = $result->email;
                    }
                    
                    $usersToConsult[$value] = $username.' '.$email;
                }
            }
        }
        $publications = Publication::getAll();
        // var_dump($categoriesToConsult, $usersToConsult);
        // var_dump($categoriesToConsult['25']->category_name);
        // var_dump($categoriesToConsult[1]->category_name);
        // die();

        // Todo esto se podría realizar con una consulta sql con INNER JOIN

        require_once 'views/publication/moderation.php';
    }

    public function detail(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $publication = new Publication();
            $publication->setId($id);

            /* get comments by publication */
            $comment = new Comment();
            $comments = $comment -> getAllByPublication($id);
            
            $pub = $publication->detail();

            require_once 'views/publication/detail.php';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $publication = new Publication();
            $publication->setId($id);
            
            $pub = $publication->detail();

            require_once 'views/publication/detail.php';
        }
    }

    public function search(){

        if(isset($_POST['search'])){
            $search = $_POST['search'];
            var_dump($search);
            $publication = new Publication();
            $search_results = $publication -> searchInDatabase($search, true, true, true);
            
        }

        require_once 'views/publication/publications.php';
    }

}