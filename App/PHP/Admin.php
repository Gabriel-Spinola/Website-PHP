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

    static function detailResponse(bool $response, string $SucMessage, string $ErrMessage) {
        if ($response)
            self :: response(
                response: 'success',
                message: $SucMessage
            );
        else
            self :: response(
                response: 'error',
                message: $ErrMessage
            );
    }
}

class Admin {
    # Get data from database
    public static function getPosition(int $positionId): string {
        return POSITIONS[$positionId];
    }

    public static function checkPermission() {
        $url = @$_GET['url'];

        switch ($url) {
            case 'addTestimonials':
                return $_SESSION['position'] >= POSITIONS_INT[0];
            break;

            case 'addServices':
                return $_SESSION['position'] >= POSITIONS_INT[0];
            break;

            case 'addSlides':
                return $_SESSION['position'] >= POSITIONS_INT[0];
            break;

            case 'listTestimonials':
                return $_SESSION['position'] >= POSITIONS_INT[1];
            break;
            
            case 'listServices':
                return $_SESSION['position'] >= POSITIONS_INT[1];
            break;

            case 'listSlides':
                return $_SESSION['position'] >= POSITIONS_INT[1];
            break;

            case 'editUser':
                return $_SESSION['position'] >= POSITIONS_INT[0];
            break;

            case 'addUser':
                return $_SESSION['position'] >= POSITIONS_INT[2];
            break;

            case 'edit':
                return $_SESSION['position'] >= POSITIONS_INT[2];
            break;

            default: return true;
        }
    }
} 