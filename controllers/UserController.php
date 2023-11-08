<?php
require_once 'models/user.php';
require_once 'models/publication.php';

class userController{

    public function index(){
        echo "Controlador Usuarios, Acción Index";
    }

    public function register(){
        $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
        require_once 'views/user/register.php';
    }

    public function save(){
        if(isset($_POST)){
            //var_dump($_POST);
            /* Validar formulario*/
            $email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : false;
            $username = explode('@', $email)[0];
            $password = isset($_POST['password']) && !empty($_POST['email']) ? $_POST['password'] : false;
            /* Crear objeto */
            if($email && $username && $password){
                $user = new User();
                $user -> setName($username);
                $user -> setSurname(NULL);
                $user -> setUserType('user');
                $user -> setEmail($email);
                $user -> setPassword($password);
                $user -> setLocation(NULL);
                $user -> setProfileImage(NULL);
                $user -> setHiringInfo(NULL);
                
                header("Location: ".base_url.'user/register');
                $save = $user -> save();
                if($save){
                    $_SESSION['register'] = 'completed';
                }else{
                    $_SESSION['register'] = 'failed';
                } 
            }else{
                $_SESSION['register'] = 'failed';
                header("Location: ".base_url.'user/register');
            }
        }else{
            $_SESSION['register'] = 'failed';
            header("Location: ".base_url.'user/register');
        }
    }

    public function login(){
        $_SESSION['url'] = $_SERVER['HTTP_REFERER']; // comprobar cuál era la url anterior
        require_once 'views/user/login.php';
    }
    public function logged(){
        if(isset($_POST)){
            // Validar formulario
            $email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) && !empty($_POST['password']) ? $_POST['password'] : false;
            // Identificar al usuario
            // Consulta a la base de datos
            
            $user = new User();
            /* O hacer setEmail y setPassword pero habría que poner el password_hash en getPassword */
            
            $identity = $user->login($email, $password);
            
            // Crear sesión
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
            
                if($identity->user_type == 'admin'){
                    $_SESSION['admin'] = true;
                }
                $redirect = $_SESSION['url'] ? $_SESSION['url'] : base_url.'user/index';
                header("Location: ".$redirect);
                if(isset($_SESSION['url'])) unset($_SESSION['url']);
            }elseif($identity == false){
                $_SESSION['login'] = 'failed';
                header("Location: ".base_url.'user/login');
            }
        }
        
    }

    public function logout(){
        if($_SESSION['identity']){
            if($_SESSION['identity']->user_type == 'admin'){
                Utils::deleteSession('admin');
            }
            Utils::deleteSession('identity');
            header("Location:".base_url."publication/recent.php");
        }
    }
   
    public function moderation(){
        Utils::isAdmin();
        $users = User::showAll();

        require_once 'views/user/moderation.php';
    }

    public function account(){
        if($_SESSION['identity']){

            $id = $_SESSION['identity']->id;

            $user = new User;
            $user -> setId($id);
            $account = $user -> getOne();

            // conseguir publicaciones por usuario
            $publication = new Publication();
            $publication -> setUsersId($id);
            $users_publications = $publication -> getAllByUser();

            require_once 'views/user/account.php';
        } else {
            header("Location: ".base_url);
        }
    }

    public function update(){
       
        if(isset($_POST) && isset($_SESSION['identity'])){
            
            $id = $_SESSION['identity']->id;
            $new_username = isset($_POST['new-username']) && !empty($_POST['new-username']) ? $_POST['new-username'] : false ;
            $location = isset($_POST['location']) && !empty($_POST['location']) ? $_POST['location'] : false ;
            $hiring_info = isset($_POST['hiring-info']) && !empty($_POST['hiring-info']) ? $_POST['hiring-info'] : false ;
           
            if($new_username || $location || $hiring_info){
                $user = new User; 
                $user -> setId($id);
                $user -> setName($new_username);
                $user -> setLocation($location);
                $user -> setHiringInfo($hiring_info);

                $profile_image = $_FILES['profile-img'];
                $filename = $profile_image['name'];
                $mimetype = $profile_image['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                    if(!is_dir('uploads/profile')) mkdir('uploads/profile', 0777, true);
                    $user -> setProfileImage($filename);
                    move_uploaded_file($profile_image['tmp_name'], 'uploads/profile/'.$filename);
                   
                }
                
                $updated_user = $user -> update();

                header("Location: ".base_url."user/account");
            }else{
                header("Location: ".base_url."user/account");
            }
        }
    }

    public function showPublic(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $user = new User;
            $user -> setId($id);
            $account = $user -> getOne();

            // conseguir publicaciones por usuario
            $publication = new Publication();
            $publication -> setUsersId($id);
            $users_publications = $publication -> getAllByUser();

            var_dump("hola que pasa, funciona"); die();

            require_once 'views/category/show.php';
        } else {
            header("Location: ".base_url);
        }
        
    }

} 