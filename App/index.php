<?php 

	include 'config.php';

?>

<!DOCTYPE html>
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="keywords">
	<meta name="description" content="Descrição do meu website">

	<title>Comercial Site With PHP</title>

	<link rel="stylesheet" href="Assets/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH ?>favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>CSS/style.css">

	<meta charset="utf-8">

</head>

<body>

	<base base="<?php echo INCLUDE_PATH ?>">

	<?php

		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		switch($url) {
			case 'depoimentos':
				echo '<target target="depoimentos">';
			break;

			case 'servicos':
				echo '<target target="servicos">';
			break;
		}

	?>

	<header>

		<div class="center">

			<div class="logo left">

				<a href="<?php echo INCLUDE_PATH ?>">Logomarca</a>

			</div><!--logo-->

			<nav class="desktop right">

				<ul>

					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a id="realtime" href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>

				</ul>

			</nav><!--desktop right-->

			<nav class="mobile right">

			 	<div class="botao-menu-mobile">

			 		<i class="fa fa-bars" aria-hidden="true"></i>

			 	</div><!--botao-menu-mobile-->

				<ul>

					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>

				</ul>

			</nav><!--mobile right-->

			<div class="clear"></div><!--clear-->

		</div><!--center-->

	</header>

	<main class="container-principal">

		<?php
			
			if(file_exists('pages/' . $url . '.php')) {
				include 'pages/' . $url . '.php';
			} else {
				if($url != 'depoimentos' && $url != 'servicos') {
					$pagina404 = true;

					include 'pages/404.php';
				} else {
					include 'pages/home.php';
				}
			}

		?>

	</main><!--container-principal-->

	<footer <?php if( (isset($pagina404)) and ($pagina404) ) echo 'class="fixed"' ?> >

		<div class="center">

			<p>Todos os direitos reservados</p>

		</div><!--center-->

	</footer><!--?fixed or null?-->

	<script src="<?php echo INCLUDE_PATH ?>Assets/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/map.js"></script>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
	<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
	
	<?php if( ($url == 'home') or ($url == '') or ($url == 'depoimentos') or ($url == 'servicos') ): ?>

		<script src="<?php echo INCLUDE_PATH ?>js/slider.js"></script>
		
	<?php endif ?>

	<script src="<?php echo INCLUDE_PATH ?>js/exemplo.js"></script>

</body>

</html>