<?php 

    $MySql = new MySqlDataBase;
    $LoginManager = new LoginManager($MySql);

    if (isset($_COOKIE['remember'])) {
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];

        $LoginManager -> rememberMe($user, $password);

        header('Location: ' . INCLUDE_PATH_ADMIN);
        die;
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
    
    <main id="main-container">

        <section class="login-box">

            <h2>Login</h2> 

            <form method="post">
    
                <input type="text" name="user" placeholder="user..." required>
                <input type="password" name="password" placeholder="password..." required>

                <div class="form-group-login left">

                    <input type="submit" name="submit">

                </div><!--from-group-login-->

                <div class="form-group-login right">

                    <label>Remember me</label>
                    <input type="checkbox" name="remember">

                </div><!--from-group-login-->

                <div class="clear"></div>

                <br>

                <?php if (isset($_POST['submit'])): ?>

                    <?php

                        $user = $_POST['user'];
                        $password = $_POST['password'];

                        $query = $MySql -> connect() -> prepare(
                            "SELECT * FROM `tb_admin.users`
                            WHERE user = ? AND `password` = ?;"
                        ); 
                        $query -> execute([
                            $user, $password
                        ]);

                    ?>

                    <!-- ? logged : failed -->
                    <?php if($query -> rowCount() == 1):

                        $info = $query -> fetch();

                        LoginManager :: initSession($info, $user, $password);

                        if (isset($_POST['remember'])) {
                            setcookie('remember', true, time() + (pow(60, 2) * 24) * 7, '/');
                            setcookie('user', $user, time() + (pow(60, 2) * 24) * 7, '/');
                            setcookie('password', $password, time() + (pow(60, 2) * 24) * 7, '/');
                        }

                        header('Location: ' . INCLUDE_PATH_ADMIN);
                        die; 

                    ?>
                    <?php else: ?>
                        
                        <alert class="error">Incorrect username or password. <i class="fa fa-times"></i></alert>

                    <?php endif ?>

                <?php endif ?><!--?Login?-->

            </form>

        </section><!-- login-box -->

    </main><!--#main-container#-->

    <script src="" async defer></script>

</body>

</html>