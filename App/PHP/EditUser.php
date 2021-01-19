<?php

require 'MySqlDataBase.php';
require 'FileManager.php';

class EditUser {
    public function __construct(
        private DBConnectionI $DBConnection,
        private FileToolsI $FileManager
    ) { }

    public function updateUserInfo(string $name, string $password, mixed $img): bool {
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

    public function isImageValid(array $img): bool {
        // Convert Bytes to Kilobytes.
        $size = intval($img['size'] / 1024);

        return (
            $img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' ||
            $img['type'] == 'image/png' && $size < 300
        );
    }

    public function uploadUserImage(mixed $image): string {
        return $this -> FileManager -> uploadFile($image);
    }

    public function DeleteUserImage(mixed $image): void {
        $this -> FileManager -> deleteFile($image);
    }
}