<?php

    if(isset($_GET['logout'])) {
        LoginManager :: logout();
    }

    function selectedItem(string $item) {
        $url = explode('/', @$_GET['url'])[0];

        if($url == $item) {
            print 'class="menu-active"';
        }
    }

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DashBoard</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_ADMIN ?>CSS/dashboard.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>Assets/Styles/css/all.css">

</head>

<body>

<aside class="menu">

    <div class="user-box">

        <?php if($_SESSION['img'] == ''): ?>

            <div class="user-pic-icon">

                <i class="fa fa-user"></i>

            </div><!--user-pic-->

        <?php else: ?>

            <div class="user-pic">

                <img src="<?php echo INCLUDE_PATH_ADMIN ?>Uploads/<?php echo $_SESSION['img'] ?>">

            </div><!--user-pic-->

        <?php endif ?><!--?user-pic?-->

        <div class="user-name">

            <p><?php print $_SESSION['name'] ?></p>
            <p><?php print Admin :: getPosition($_SESSION['position']); ?></p>

        </div><!--user-name-->

    </div><!--user-box-->
 
    <div class="menu-items">

        <h2>Main Page Management</h2>
        <a <?php echo selectedItem('addTestimonials') ?> href="">Add Testimonials</a>
        <a <?php echo selectedItem('addServices') ?> href="">Add Services</a>
        <a <?php echo selectedItem('addSlides') ?> href="">Add Slides</a>
        <a <?php echo selectedItem('listTestimonials') ?> href="">List Testimonials</a>
        <a <?php echo selectedItem('listServices') ?> href="">List Services</a>
        <a <?php echo selectedItem('listSlides') ?> href="">List Slides</a>

        <h2>DashBoard Management</h2>
        <a <?php echo selectedItem('editUser') ?> href="<?php echo INCLUDE_PATH_ADMIN ?>editUser">Edit User</a>
        <a <?php
            echo selectedItem('addUser');
        ?> href="<?php echo INCLUDE_PATH_ADMIN ?>addUser">Add User</a>

        <h2>General Config</h2>
        <a <?php echo selectedItem('edit') ?> href="">Edit</a>
        
    </div><!--menu-items-->

</aside><!--menu-->

<header class="header-container">

    <div class="center">

        <ul class="navbar">

            <li class="menu-btn"><i class="fa fa-bars"></i></li>
            <li class="logout-btn"><a href="<?php echo INCLUDE_PATH_ADMIN ?>?logout">Logout <i class="fas fa-door-closed"></i></a></li>
            <li class="home-btn"><a href="<?php echo INCLUDE_PATH_ADMIN ?>">Home <i class="fa fa-home" aria-hidden="true"></i></a></li>

        </ul>

    </div><!--center-->

    <div class="clear"></div>

</header><!--#header-container#-->

<main class="main-container">

    <?php

        if (Admin :: checkPermission()) DashBoard :: loadPage(); 
        else DashBoard :: response('error', 'You are not allowed to access this page');

    ?>

</main><!--#main-container#-->

<script src="<?php echo INCLUDE_PATH ?>Assets/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_ADMIN ?>Scripts/main.js" async defer></script>
    
</body>

</html>