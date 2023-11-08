<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/style.css" />
    <link id="display-menu-style" rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/hidemenu.css" />
    <script type="text/javascript" src="<?=base_url?>javascript/main.js"></script>
</head>
<body>

<header>
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
            <nav id="menu-admin">
                <ul>
                    <p>Admin Menu</p>
                    <li><a href="<?=base_url?>user/moderation">Users List</a></li>
                    <li><a href="<?=base_url?>category/index">Categories List</a></li>
                    <li><a href="<?=base_url?>publication/moderation">Publications List</a></li>
                    <li>Comments Moderation</li>
                    <li>Messages</li>
                </ul>
            </nav>    
        <?php endif; ?>
        
        <?php if(!isset($_SESSION['admin-edit-page'])): ?>
        <!---- Header Normal --------------------------------------------------------------------------------------------------------->
        <div id="header-menu-1">
            <h1><a href="<?=base_url?>publication/index">ArtStation</a></h1>
            <form id="search-menu-1" action="<?=base_url?>publication/search" method="POST" >
                <input type="search" name="search" placeholder="Search" >
                <input type="submit" value="L" />
            </form> 
            <nav id="menu-1">
                <ul>
                    <li class="li-1"><a href="#">Shop</a></li>
                    <?php if(!isset($_SESSION['identity'])): ?>
                    <li class="li-1" id="login-button"><a href="<?=base_url?>user/login">Sign up</a></li>
                    <li class="sign-in li-1" id="register-button"><a href="<?=base_url?>user/register">Register</a></li>
                    <?php else: ?>
                    <li class="li-1" id="account-button"><a href="<?=base_url?>user/account">My Account</a></li>
                    <li class="sign-in li-1" id="logout-button"><a href="<?=base_url?>user/logout">log Out</a></li>
                    <?php endif; ?>
                    <li id="drop-down-menu-1">                        
                        <input type="button" value="Menu" />
                        <ul id= "drop-down-1" > <!-- ¡¡¡Cambiar el hover por click!!! -->
                            <li><a href="#">About ArtStation</a></li>
                            <li><a href="#">About Company</a></li>
                            <li class="border-drop-down-1"><a href="#">Help</a></li>
                            <li class="border-drop-down-1"><a href="#">Newsletter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li class="border-drop-down-1"><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
        <!--<div style="clear:both"></div>-->
        <ul id="menu-2">
            <li><a href="#">About</a></li>
            <li><a href="#">Subcriptions</a></li>
            <li><a href="#">Learning</a></li>
            <li><a href="#">Marketplace</a></li>
            <li><a href="#">Prints</a></li>
            <li><a href="#">Studios</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Challenges</a></li>
            <li><a href="#">Magazines</a></li>
        </ul>
        <div class="clearfix"></div>   
</header>

    <div id="scroll-div">
        <div id="slider-button-left">
            <input type="button" value="&lt;" id="move-left" />
        </div>
        <div id="div-menu-3">
            <ul id="menu-3" style="margin-left: 0px;"> 
                <?php $categories = Category::showCategories(); ?>
                <?php while($cat = $categories -> fetch_object()): ?>
                    <li><a href="<?=base_url?>category/show&id=<?=$cat->id?>"><?=$cat->category_name?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="slider-button-right">
            <input type="button" value="&gt;" id="move-right" />
        </div> 
    </div>
    <div class="clearfix"></div>
    <?php else: ?>
    <!---- Header Editar Admin --------------------------------------------------------------------------------------------------------->
    <?php endif; ?>