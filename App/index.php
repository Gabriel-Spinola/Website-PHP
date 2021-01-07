<?php 

	include 'config.php';

?>

<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>Assets/styles/fontawesome.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="keywords">
	<meta name="description" content="Your site description">

	<title>Comercial Site With PHP</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH ?>favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>CSS/style.css">

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

	<main class="principal-container">

		<?php
			
			if(file_exists('pages/' . $url . '.php')) {
				include 'pages/' . $url . '.php';
			} else {
				if($url != 'testimonials' && $url != 'services') {
					$pagina404 = true;

					include 'pages/404.php';
				} else {
					include 'pages/home.php';
				}
			}

		?>

	</main><!--principal-container-->

	<footer <?php 
		if( (isset($pagina404)) and ($pagina404) ) echo 'class="fixed"';
		elseif($url == 'contact') echo 'class="down-footer"'; 
	?> >

		<div class="center">

			<p>Todos os direitos reservados &copy;</p>

		</div><!--center-->

	</footer><!--?fixed or null?-->


	<!-- Imports------------->
	

	<script src="<?php echo INCLUDE_PATH ?>Assets/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
	
	<?php if( ($url == 'home') or ($url == '') or ($url == 'testimonials') or ($url == 'services') ): ?>

		<script src="<?php echo INCLUDE_PATH ?>js/slider.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/specialtiesAnimation.js"></script>
	
	<?php else: ?>

		<script src="<?php echo INCLUDE_PATH ?>js/map.js"></script>
		<script src="<?php echo INCLUDE_PATH ?>js/dynamicLoad.js"></script>
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>

	<?php endif ?>

</body>

</html>