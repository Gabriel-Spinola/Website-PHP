<?php

require '../PHP/Admin.php';
require '../config.php';

if(!LoginManager :: isLoggedIn()) {
    include 'login.php';
} else {
    include 'main.php';
}