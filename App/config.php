<?php # Imports

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

?>

<?php #constants
	
	session_start();

	// Path constants
	const INCLUDE_PATH = "http://localhost:7000/GitHub/Comercial-Site-With-PHP/App/";
	const INCLUDE_PATH_ADMIN = INCLUDE_PATH . "Admin/";

	// Database constants
	const HOST = 'localhost';
	const DB = 'tb_phpwebproject';
	const USER = 'root';
	const PASSWORD = '';

	// Base Info constants
	const COMPANY_NAME = 'Company Name';

?>

<?php # Autoload

	$autoload = function ($class): void {
		if ($class == 'Email') {
			require 'PHP/phpMailer/vendor/autoload.php';
		}

		include 'PHP/' . $class . '.php';
	};

	spl_autoload_register($autoload);

?>