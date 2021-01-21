<?php

require 'Validator.php';
require 'FileManager.php';

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
        private UploadFileI $FileManager,
    ) { }

    public function addUser(
        string $user, string $name,
        string $password, mixed $position, mixed $image
    ): bool {
        $query = $this -> DBConnection -> connect() -> prepare(
           "INSERT INTO `tb_admin.users`
            VALUES (null, ?, ?, ?, ?, ?);"
        );

        return $query -> execute([
            $user, $password,
            $image['name'], $name, $position
        ]);
    }

    public function uploadUserImage(mixed $image): string {
        return $this -> FileManager -> uploadFile($image);
    }
}
