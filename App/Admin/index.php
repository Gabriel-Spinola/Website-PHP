<?php

require '../config.php';

if(!Admin :: isLoggedIn()) {
    include 'login.php';
} else {
    include 'main.php';
}