<!--the font awesome just doesn't work ):-->

<section class="banner-container">

	<div style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form.jpg')" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form2.jpg')" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH ?>images/bg-form3.jpg')" class="banner-single"></div><!--banner-single-->
	<div class="overlay"></div>

	<div class="center">

		<form method="post">

			<h2>What's your best E-mail</h2>

			<input type="email" name="email" required>
			<input type="submit" name="action" value="Submit">

		</form>

		<div class="mail-bug">
		<?php
		
			if(isset($_POST['action'])) {
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
			}

		?>
		</div>

	</div><!--center-->

	<div class="bullets">
		
	</div><!--bullets-->

</section><!--banner-container-->

<section class="author-description">

	<div class="center">

		<article class="w50 left">

			<h2>Name Surname.</h2>
			
			<p class="author-article">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore 	et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui cum sequi voluptatum placeat, dicta laboriosam, architecto esse dignissimos nesciunt odit nam harum, aliquam blanditiis possimus quis atque ullam magnam dolor.</p>

		</article><!--w50 left-->

		<div class="w50 left">

			<img class="right" src="<?php echo INCLUDE_PATH ?>images/foto.jpg">

		</div><!--w50 left-->

		<div class="clear"></div><!--clear-->

	</div><!--center-->

</section><!--author-description-->

<section class="specialties">

	<div class="center">

		<h2 class="title">Specialties</h2>

		<article class="w33 left specialtie-box">
			
			<h3><i class="fab fa-css3-alt"></i></h3>
			<h4>CSS3</h4>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

		</article><!--specialtie-box-->

		<article class="w33 left specialtie-box">

			<h3><i class="fab fa-html5"></i></h3>
			<h4>HTML 5</h4>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

		</article><!--specialtie-box-->

		<article class="w33 left specialtie-box">

			<h3><i class="fab fa-js-square"></i></h3>
			<h4>Javascript</h4>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

		</article><!--specialtie-box-->

		<div class="clear"></div><!--clear-->

	</div><!--center-->

</section><!--specialties-->

<section class="extras">

	<div class="center">

		<div id="testimonials" class="w50 left testimonials-container">

			<h2 class="title">testimonials from our customers</h2>
			
			<article class="testimonial-single">

				<p class="testimonials-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

				<p class="author-name">Lorem ipsum</p>

			</article><!--testimonial-single-->

			<article class="testimonial-single">

				<p class="testimonials-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

				<p class="author-name">Lorem ipsum</p>

			</article><!--testimonial-single-->

			<article class="testimonial-single">

				<p class="testimonials-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

				<p class="author-name">Lorem ipsum</p>

			</article><!--testimonial-single-->

		</div><!--w50 left depoimentos-container-->

		<div id="services" class="w50 left services-container">

			<h2 class="title">Services</h2>

			<div class="services">

				<ul>

					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>

				</ul>

			</div><!--services-->

		</div><!--w50 left services-container-->

		<div class="clear"></div><!--clear-->

	</div><!--center-->

</section><!--extras-->