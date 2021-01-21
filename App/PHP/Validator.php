<?php

abstract class ImageValidator {
    public function isImageValid(array $img): bool {
        // Convert Bytes to Kilobytes.
        $size = intval($img['size'] / 1024);

        return (
            $img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' ||
            $img['type'] == 'image/png' || $img['type'] == 'image/jfif' && 
            $size < 300
        );
    }
}