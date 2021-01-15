<?php

class DashBoard {
    public static function isLoggedIn(): bool {
        return isset($_SESSION['logged']);
    }

    public static function logout(): void {
        session_destroy();

        header('Location:' . INCLUDE_PATH_ADMIN);
        die;
    }
}

class Admin {
    public static function getPosition(int $positionId): string {
        $positions = [
            '0' => 'Normal',
            '1' => 'Sub Administrator',
            '2' => 'Administrator'
        ];

        return $positions[$positionId];
    }
}