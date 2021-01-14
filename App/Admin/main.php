<?php

    if(isset($_GET['logout'])) {
        Admin :: logout();
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

<aside>



</aside>

<header id="header-container">

    <div class="center">

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