<?php # Imports

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

?>

<?php # Default

	date_default_timezone_set('America/Sao_Paulo');

?>

<?php # Constants
	
	session_start();

	// Path constants
	const INCLUDE_PATH = "http://localhost:7000/GitHub/Comercial-Site-With-PHP/App/";
	const INCLUDE_PATH_ADMIN = INCLUDE_PATH . "Admin/";
	const BASE_DIR_DASHBOARD = __DIR__ . "/Admin";

	// Database constants
	const HOST = 'localhost';
	const DB = 'tb_phpwebproject';
	const USER = 'root';
	const PASSWORD = '';

	// Base Info constants
	const COMPANY_NAME = 'Company Name';

	// Positions
	const POSITIONS = [
		'0' => 'Normal',
        '1' => 'Sub Administrator',
        '2' => 'Administrator',
	];

	const POSITIONS_INT = [0, 1, 2,];

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