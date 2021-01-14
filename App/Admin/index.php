<?php

require '../PHP/Admin.php';
require '../config.php';

if(!DashBoard :: isLoggedIn()) {
    include 'login.php';
} else {
    include 'main.php';
}