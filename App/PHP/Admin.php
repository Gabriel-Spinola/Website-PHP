<?php

class DashBoard {
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