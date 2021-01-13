<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	session_start();

	$autoload = function ($class): void {
		if ($class == 'Email') {
			require 'PHP/phpMailer/vendor/autoload.php';
		}

		include 'PHP/' . $class . '.php';
	};

	spl_autoload_register($autoload);

	const INCLUDE_PATH = "http://localhost:7000/GitHub/Comercial-Site-With-PHP/App/";
	const INCLUDE_PATH_ADMIN = INCLUDE_PATH . "Admin/";

?>