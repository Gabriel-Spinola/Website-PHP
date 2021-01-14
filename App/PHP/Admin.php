<?php

class Admin {
    public static function isLoggedIn(): bool {
        return isset($_SESSION['logged']);
    }

    public static function logout(): void {
        session_destroy();

        header('Location:' . INCLUDE_PATH_ADMIN);
        die();
    }
}