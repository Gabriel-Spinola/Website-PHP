<?php

require 'MySqlDataBase.php';

class Website {
    private $dateTime;

    public function __construct(
        private DBConnectionInterface $DBConnection
    ) {
        $this -> dateTime = date('Y-m-d H:i:s');
    }

    private function addUser() {
        // Generate a random token
        $_SESSION['online'] = uniqid();
        
        // Set token
        $token = $_SESSION['online'];

        // Get Ip
        $ip = $_SERVER['REMOTE_ADDR'];

        // Insert user info
        $query = $this -> DBConnection -> connect() -> prepare(
           "INSERT INTO `tb_admin.users_online` 
            VALUES (null, ?, ?, ?);"
        );

        $query -> execute([
            $ip, $this -> dateTime,
            $token
        ]);
    }

    public function updateOnlineUsers(): void {
        if (isset($_SESSION['online'])) {
            // Set token
            $token = $_SESSION['online']; 

            $check = $this -> DBConnection -> connect() -> prepare(
               "SELECT id FROM `tb_admin.users_online`
                WHERE token = ?;"
            );

            $check -> execute([
                $_SESSION['online']
            ]);

            // Check that the user is active or not
            if ($check -> rowCount() == 1) {
                // Update action date/time
                $query = $this -> DBConnection -> connect() -> prepare(
                   "UPDATE `tb_admin.users_online`
                    SET last_action = ? WHERE token = ?;"
                );
    
                $query -> execute([
                    $this -> dateTime, $token
                ]);
            } else {
                $this -> addUser();
            }
        } else {
            $this -> addUser();
        }
    }

    public function getOnlineUsersList() {
        $this -> deleteInactiveUsers();

        $query = $this -> DBConnection -> connect() -> prepare(
            "SELECT * FROM `tb_admin.users_online`;"
        );

        $query -> execute();

        return $query -> fetchAll();
    }

    private function deleteInactiveUsers() {
        $dateTime = $this -> dateTime;

        // For each 30 minutes past if a users is inactive his register is deleted
        $query = $this -> DBConnection -> connect() -> exec(
           "DELETE FROM `tb_admin.users_online`
            WHERE last_action < '$dateTime' - INTERVAL 30 MINUTE;"
        );
    }
}