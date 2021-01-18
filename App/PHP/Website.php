<?php

require 'MySqlDataBase.php';

class Website {
    public function __construct(
        private DBConnectionInterface $DBConnection
    ) { }

    public function updateOnlineUsers(): void {
        $dateTime = date('Y-m-d H:i:s');

        if (isset($_SESSION['online'])) {
            // Set token
            $token = $_SESSION['online']; 
            
            $query = $this -> DBConnection -> connect() -> prepare(
               "UPDATE `tb_admin.users_online`
                SET last_action = ? WHERE token = ?;"
            );

            $query -> execute([
                $dateTime, $token
            ]);
        } else {
            // Generate a random token
            $_SESSION['online'] = uniqid();
            
            // Set token
            $token = $_SESSION['online'];

            // Get Ip
            $ip = $_SERVER['REMOTE_ADDR'];

            $query = $this -> DBConnection -> connect() -> prepare(
               "INSERT INTO `tb_admin.users_online` 
                VALUES (null, ?, ?, ?);"
            );
 
            $query -> execute([
                $ip, $dateTime,
                $token
            ]);
        }
    }
}