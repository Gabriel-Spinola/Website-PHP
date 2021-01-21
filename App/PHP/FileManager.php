<?php

interface UploadFileI {
    public function uploadFile(array $file): mixed;
}

interface DeleteFileI {
    public function deleteFile(array $file): void;
}

interface FileToolsI extends UploadFileI, DeleteFileI {
    public function uploadFile(array $file): mixed;
    public function deleteFile(array $file): void;
}

class FilesManager implements FileToolsI {
    public function uploadFile(array $file): mixed {
        // $fileFormat[0] = fileName, $fileFormat[1] = file format.
        $fileFormat = explode('.', $file['name']);

        // Create a unique if for the file (solving overwriting problems)
        $imageId = uniqid() . '.' . $fileFormat[count($fileFormat) - 1];

        if (move_uploaded_file($file['tmp_name'], BASE_DIR_DASHBOARD . '/Uploads/' . $imageId)) {
            return $file['name'];
        } else {
            return false;
        }
    }

    public function deleteFile(mixed $file): void {
        @unlink(BASE_DIR_DASHBOARD . '/Uploads/' . $file);
    }
}