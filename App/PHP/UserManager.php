<?php

require 'MySqlDataBase.php';

class UserManager {
    public function __construct(
        private DBConnectionInterface $DBConnection
    ) { }

    public function updateUserInfo(string $name, string $password, string $img): bool {
        $query = $this -> DBConnection -> connect() -> prepare(
           "UPDATE `tb_admin.users`
            SET `name` = ?, `password` = ?, img = ?
            WHERE user = ?;"
        );

        if ($query -> execute([
            $name, $password,
            $img, $_SESSION['user'] 
        ])) {
            return true;
        } else {
            return false;
        }
    }
}