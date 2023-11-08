
<?php

require_once 'baseModel.php';

class User extends baseModel{

    private $id;
    private $name;
    private $surname;
    private $user_type;
    private $email;
    private $user_password;
    private $location;
    private $profile_image;
    private $hiring_info;
    private $registration_date;

    public function __construct(){
        parent::__construct();
    }

    public static function showAll(){
        $user = new User();
        $users = $user -> getAll();
        return $users;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $this->db->real_escape_string($id);}

    public function getName(){ return $this->name;}
    public function setName($name){$this->name = $this->db->real_escape_string($name);}

    public function getSurname() {return $this->surname;}
    public function setSurname($surname){ $this->surname = $this->db->real_escape_string($surname); }

    public function getUserType(){return $this->user_type;}
    public function setUserType($user_type){ $this->user_type =  $this->db->real_escape_string($user_type); }

    public function getEmail(){ return $this->email;}
    public function setEmail($email) {$this->email =  $this->db->real_escape_string($email); }

    public function getPassword(){ return $this->user_password;}
    public function setPassword($user_password) {$this->user_password = password_hash($this->db->real_escape_string($user_password), PASSWORD_BCRYPT, ['cost' => 4]); }

    public function getLocation() {return $this->location;}
    public function setLocation($location){ $this->location = $this->db->real_escape_string($location);}

    public function getProfileImage(){return $this->profile_image;}
    public function setProfileImage($profile_image){ $this->profile_image = $this->db->real_escape_string($profile_image);}

    public function getHiringInfo(){return $this->hiring_info;}
    public function setHiringInfo($hiring_info){$this->hiring_info = $this->db->real_escape_string($hiring_info);}
    
    public function getRegistrationDate(){return $this->registration_date;}
    public function setRegistrationDate($registration_date){$this->registration_date = $this->db->real_escape_string($registration_date);}

    public function save(){
        $sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', NULL, '{$this->getUserType()}', '{$this->getEmail()}', '{$this->getPassword()}', NULL, NULL, NULL, CURDATE() ); ";  
        $save = $this->db->query($sql); 
        var_dump($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login($email, $password){
        $result = false;
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $user = $login -> fetch_object(); //fetch object para sacar el objeto que devuelve la base de datos
            // verificar la contraseña
            $verify = password_verify($password, $user->user_password); // función de PHP (contraseña introducida, contraseña encriptada)
            if($verify){
                $result = $user;
            }
        }
        return $result;
    }

    public function getAll(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $getAll = $this->db->query($sql);
        return $getAll;
    }

    public function getOne(){
        $sql = "SELECT * FROM users WHERE id={$this->id}";
        $getOne = $this->db->query($sql);
        return $getOne;
    }

    public function update(){
        $sql = "UPDATE users SET username = '{$this->getName()}', userslocation = '{$this->getLocation()}', hiring_info = '{$this->getHiringInfo()}', profile_image = '{$this->getProfileImage()}' WHERE id={$this->getId()} ;";
        $update = $this->db->query($sql);
        $result = false;
        if($update){
            $result = true;
        }
        return $result;
    }

}


