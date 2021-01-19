<?php

interface FileToolsI {
    public function uploadFile(array $file): mixed;
    public function deleteFile(array $file): void;
}

class FilesManager implements FileToolsI {
    public function uploadFile(array $file): mixed {
        if (move_uploaded_file(
            $file['tmp_name'],
            BASE_DIR_DASHBOARD . '/Uploads/' . $file['name']
        )) {
            return $file['name'];
        } else {
            return false;
        }
    }

    public function deleteFile(mixed $file): void {
        @unlink(BASE_DIR_DASHBOARD . '/Uploads/' . $file);
    }
}