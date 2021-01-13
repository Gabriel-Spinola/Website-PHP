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

	<div class="success">

		<p>The form was successfully sent (:</p>

	</div>

	<div class="error">

		<p>The form could not be sent ):</p>

	</div>

	<div class="overlay-loading">
	
		<img src="<?php echo INCLUDE_PATH ?>images/ajax-loader (2).gif">
	
	</div><!--overlay-loading-->

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