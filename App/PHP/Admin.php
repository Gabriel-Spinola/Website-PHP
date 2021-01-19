<?php

class LoginManager {
    # check if is logged in
    public static function isLoggedIn(): bool {
        return isset($_SESSION['logged']);
    }

    # logout and sessions destroy
    public static function logout(): void {
        session_destroy();

        header('Location:' . INCLUDE_PATH_ADMIN);
        die;
    }

    public static function initSession(
        array $info, string $user,
        string $password
    ): void {
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['position'] = $info['position'];
        $_SESSION['name'] = $info['name'];
        $_SESSION['img'] = $info['img'];
    }
}

class DashBoard {
    # load pages
    public static function loadPage(): void {
        if ((isset($_GET['url']))) {
            // Create an array for each slash/page
            $url = explode('/', $_GET['url']);

            // Include current page.
            if (file_exists('Pages/' . $url[0] . '.php')) {
                include 'Pages/' . $url[0] . '.php';
            } else {
                // Page Doesn't exist.
                header('Location:' . INCLUDE_PATH_ADMIN);
                die;
            }
        } else {
            include '../Admin/Pages/home.php';
        }
    }  
}

class Admin {
    # Get data from database
    public static function getPosition(int $positionId): string {
        $positions = [
            '0' => 'Normal',
            '1' => 'Sub Administrator',
            '2' => 'Administrator' 
        ];

        return $positions[$positionId];
    }
}

?>

<?php 

    class EditUser {
        public static function response($response, $message): void { ?>

            <?php if ($response == 'success'): ?>
                
                <div class="alert-box">

                    <div class="success">
                        <i class="fa fa-check" aria-hidden="true"></i> 
                        <?php print $message ?>
                    </div>

                </div><!--alert-box-->

            <?php elseif ($response == 'error'): ?>

                <div class="alert-box">

                    <div class="error">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <?php print $message ?>
                    </div>

                </div><!--alert-box-->

            <?php else: 
                
                throw new Exception('Incorrect Response')
                
            ?>
            
            <?php endif ?>

        <?php }
    } 

?>