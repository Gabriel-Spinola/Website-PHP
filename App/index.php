<?php 

	include 'config.php';

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="keywords">
	<meta name="description" content="Your site description">

	<title>Comercial Site With PHP</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH ?>favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>CSS/style.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>Assets/Styles/css/all.css">

</head>

<body>

	<div class="mail-bug">
	<?php

	if(isset($_POST['action']) && $_POST['identifier'] == 'form_home') {
		// required atribute for old browsers
		if($_POST['email'] != '') {
			$email = $_POST['email'];

			// validate e-mail
			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
				// Instantiate Email class
				$mail = new Email(
					host: 'smtp.gmail.com',
					username: 'sampleemail7000@gmail.com',
					password: 'Sample.123',
					name: 'Gabriel'
				);

				// Add Address
				$mail -> AddAddress(email: $email, name: 'X');

				// Format the email
				$mail -> FormatEmail(info: [
					'subject' => 'Your email has been registered',
					'body' => 'Thanks for the preference' . ' <hr> ' . $email
				]);

				// Send
				if($mail -> SendEmail()) {
					echo "<script>alert('Your email has been sent')</script>";
				} else {
					echo "<script>alert('Enter a Valid Email')</script>";
				}
			} else {
				echo "<script>alert('Enter a Valid Email')</script>";
			}
		} else {
			echo "<script>alert('Enter a Valid Email')</script>";
		}
	} else if(isset($_POST['action']) && $_POST['identifier'] == 'form_contact') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = 'New Site Message';
		$body = '';

		// format info
		foreach($_POST as $key => $row) {
			$body .= ucfirst($key) . ': ' . $row . '<hr>';
		}

		$mail = new Email(
			host: 'smtp.gmail.com',
			username: 'sampleemail7000@gmail.com',
			password: 'Sample.123',
			name: 'Gabriel'
		);

		$mail -> AddAddress(email: $email, name: $name);

		$mail -> FormatEmail(info: [
			'subject' => $subject,
			'body' => $body
		]);

		if($mail -> SendEmail()) {
			echo "<script>alert('Your email has been sent')</script>";
		} else {
			echo "<script>alert('Enter a Valid Email')</script>";
		}
	}

	?>
	</div>

	<base base="<?php echo INCLUDE_PATH ?>">

	<?php

		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		switch($url) {
			case 'testimonials':
				echo '<target target="testimonials">';
			break;

			case 'services':
				echo '<target target="services">';
			break;
		}

		function onHomeGroup(string $url): bool {
			return (
				$url == '' || $url == 'home' ||
				$url == 'testimonials' || $url == 'services'
			);
		}

	?>

	<header>

		<div class="center">

			<div class="logo left">

				<a href="<?php echo INCLUDE_PATH ?>">Logo</a>

			</div><!--logo-->

			<nav class="desktop right">

				<ul>

					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>testimonials">Testimonials</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>services">Services</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contact">Contact</a></li>

				</ul>

			</nav><!--desktop right-->

			<nav class="mobile right">

			 	<div class="menu-mobile-button">

			 		<i class="fa fa-bars" aria-hidden="true"></i>

			 	</div><!--menu-mobile-button-->

				<ul>

					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>testimonials">Testimonials</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>services">Services</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contact">Contact</a></li>

				</ul>

			</nav><!--mobile right-->

			<div class="clear"></div><!--clear-->

		</div><!--center-->

	</header>

	<main class="main-container">

		<?php

			$page404 = false;
			
			if(file_exists('pages/' . $url . '.php')) {
				include 'pages/' . $url . '.php';
			} else {
				if(onHomeGroup($url)) {
					include 'pages/home.php';
				} else {
					$page404 = true;

					include 'pages/404.php';
				}
			}

		?>

	</main><!--main-container-->

	<footer <?php echo isset($page404) && $page404 ? 'class="fixed"' : ($url == 'contact' ? 'class="down-footer"' : ''); ?>>

		<div class="center">

			<p>All rights reserved &copy;</p>

		</div><!--center-->

	</footer><!--?fixed or null?-->

	<!-- Imports------------->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
	<script src="<?php echo INCLUDE_PATH ?>js/slider.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/specialtiesAnimation.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/forms.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/map.js"></script>

</body>

</html>