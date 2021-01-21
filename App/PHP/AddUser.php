<?php

require 'Validator.php';

class AddUserValidator {
    public function __construct(
        private DBConnectionI $DBConnection,
    ) { }

    public function userExists(string $user): bool {
        $query = $this -> DBConnection -> connect() -> prepare(
           "SELECT `id` FROM `tb_admin.users`
            WHERE user = ?;"
        );

        $query -> execute([$user]);

        return $query -> rowCount() == 1;
    }
}

// error, no need to extends, just create a instance.
class AddUser extends ImageValidator {
    public function __construct(
        private DBConnectionI $DBConnection,
    ) { }

    public function addUser(): bool {
        return false;
    }
}
