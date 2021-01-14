<?php

    if(isset($_GET['logout'])) {
        DashBoard :: logout();
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
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_ADMIN ?>CSS/panel.css">
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

        <?php endif ?>

        <div class="user-name">

            <p><?php print $_SESSION['name'] ?></p>
            <p><?php print Admin :: getPosition($_SESSION['position']); ?></p>

        </div><!--user-name-->

    </div><!--user-box-->

</aside><!--menu-->

<header id="header-container">

    <div class="center">

        <div class="menu-btn">

            <i class="fa fa-bars"></i>

        </div><!--menu-btn-->

        <div class="logout">

            <a href="<?php echo INCLUDE_PATH_ADMIN ?>?logout">Logout <i class="fas fa-door-closed"></i></a>
    
        </div><!--logout-->

    </div><!--center-->

    <div class="clear"></div>

</header><!--#header-container#-->

<main id="main-container">



</main><!--#main-container#-->

<script src="" async defer></script>
    
</body>

</html>