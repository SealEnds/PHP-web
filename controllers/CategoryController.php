
<?php

require_once 'models/category.php';
require_once 'models/publication.php';

class categoryController{

    public function index(){
        Utils::isAdmin();
        $categories = Category::showCategories();

        require_once 'views/category/index.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $category_name = isset($_POST['category-name']) && !empty($_POST['category-name']) ? $_POST['category-name'] : false;
            $category_description = isset($_POST['category-description']) && !empty($_POST['category-description']) ? $_POST['category-description'] : false;
            
            if($category_name){
                $category = new Category();
                $category->setCategoryName($category_name);
                $category->setCategoryDescription($category_description);
                
                $save = $category -> save();

                if($save){
                    $_SESSION['create-category'] = 'completed';
                }else{
                    $_SESSION['create-category'] = 'failed';
                }
            }else{   
                $_SESSION['create-category'] = 'failed';
            }
        }
        header("Location:".base_url."category/index");
    }

    public function edit(){
        var_dump($_GET);
    }

    public function delete(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $category = new Category();
            $category -> setId($id);
            $delete = $category -> delete();
            if($delete){
                $_SESSION['delete-category'] = 'completed';
            }else{
                $_SESSION['delete-category'] = 'failed';
            }
        }else{
            $_SESSION['delete-category'] = 'failed';
        }
        header("Location:".base_url."category/index");
    }

    public function show(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Obtener categoría
            $category = new Category();
            $category->setId($id);
            $category = $category->getOne();

            // Obtener productos de la categoría 
            $publication = new Publication();
            $publication->setCategoryId($id);
            $publications = $publication->getAllByCategory();

        }
        require_once 'views/category/show.php';
    }
}

