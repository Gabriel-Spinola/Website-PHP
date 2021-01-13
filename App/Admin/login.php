<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Control Panel</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH_ADMIN ?>CSS/panel.css">

    </head>

    <body>
        
        <main id="main-container">

            <section class="login-box">

                <h2>Login!</h2> 

                <form method="post">
        
                    <input type="text" name="user" placeholder="user..." required>
                    <input type="password" name="password" placeholder="password..." required>
                    <input type="submit" name="submit">

                </form>

            </section><!-- login-box -->

        </main><!--#main-container#-->

        <script src="" async defer></script>

    </body>
</html>