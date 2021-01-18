<?php

require 'MySqlDataBase.php';

class Website {
    public function __construct(
        private DBConnectionInterface $DBConnection
    ) { }

    public function updateOnlineUsers(): void {
        // if (isset($_SESSION['online'])) {
            // $token = $_SESSION['online']; 
            
            $date = date('Y-m-d H:i:s');

            $query = $this -> DBConnection -> connect() -> prepare(
                "SELECT * FROM `tb_admin.users`;"
            );

            $query -> execute();

            $data = $query -> fetchAll();

            foreach ($data as $key => $row) {
                echo $row['user'];
            }
        // }
    }
}