<?php

class Admin {
    public static function isLoggedIn(): bool {
        return isset($_SESSION['login']);
    }
}