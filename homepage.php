<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?> 

	<!-- Slider -->
	<style>.header { position: relative; }</style>
	<div style="clear:both;"></div>
	<div class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/videobg.jpg" />
					<div class="w-container">
						<div class="slidertext bottom left">
							<h1>Rush Phi Chi Theta Winter 2014</h1>
							<h3><span style="color:#fff000;">Professional Business and Economics Fraternity</span></h3><br />
							<a class="btn btn-large popup-youtube" href="http://www.youtube.com/watch?v=ruBHnr5mRcM">Play Video</a> <a href="http://umphichitheta.com/rush/" class="btn btn-large">Learn More About Rushing</a>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/fallcidermill.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom left">
							<h3>Fall 2013 - Cider Mill</h3>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/parkpainting.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom left">
							<h3>Veterans Memorial Park Painting</h3>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/fall2013.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom right">
							<h3>Phi Chi Theta Fall 2013</h3>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/bg2.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom left">
							<h3>Winter Pledge Class 2013</h3>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/bg3.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom right">
							<h3>Class of 2013</h3>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="shadow"></div>
	</div>

	<!-- Content -->
	<div class="w-container">
		<div class="content content-home">
			<div class="calltoaction">
				<div class="pull-left">
					Interested in rushing Winter 2014?  Add your email address to the contact list!
				</div>
				<div class="pull-right">
					<div class="inputandbutton">
					<form class="addemail" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/form-addemail.php">
						<input class="email" type="text" name="email" placeholder="example@umich.edu" />
						<button type="submit" class="btn">Add Email</a>
					</form>
					</div>
					<div class="postresponse"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="content-body">
				<?php while ( have_posts() ) : the_post(); ?>  
					<?php the_content('Read More'); ?> 
				<?php endwhile; ?> 
			</div>
			<div class="clearboth"></div>
		</div>
		<div class="sponsors">
			<h3>Proudly Sponsored By:</h3>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/lib/img/sponsors.png" />
		</div>
	</div>

	<script type="text/javascript">
		// magnific popup init
		$(document).ready(function() {
			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});
		});

		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "fade",
				animationSpeed: 1000,
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
			if($(this).width() >= '1600') {
				$('.shadow').fadeIn();
			};
			if($(this).width() < '600') {
				var margin = -(600 - $(this).width()) / 2;
				$('.slides img').css('margin-left', margin);
			};

			// Adding these attributes allows correct positioning inside the slider
			var sliderCorrection = $('.slider').height();
			$('.slider .w-container').css('height', sliderCorrection);
			$('.slider .w-container').css('margin-top', -sliderCorrection);

			if($('.horz-center').length > 0) {
				// adjust horz centered elements back left
				$('.horz-center').css('margin-left', -($('.horz-center').width() / 2) + 'px');
			}
			if($('.vert-center').length > 0) {
				// adjust vert centered elements back down
				$('.vert-center').css('margin-bottom', -($('.vert-center').height() / 2) + 'px');
			}
		});

		$(window).bind("resize", resizeChanges);
		function resizeChanges(e) {
			var wWidth = $(window).width();
			
			// Listen to browser width and add the shadow around the slider
			// if the user is looking at it on a big ass screen
			if(wWidth >= '1600') {
				$('.shadow').fadeIn();
			} else {
				$('.shadow').fadeOut();
			};

			// Center the slider image
			// if the browser is less than 600px wide, the image is being cutoff
			if(wWidth < '600') {
				var margin = -(600 - wWidth) / 2;
				$('.slides img').css('margin-left', margin);
			} else {
				$('.slides img').css('margin-left', 0);
			};

			// Correct these attributes to correct text positioning inside the slider
			var sliderCorrection = $('.slider').height();
			$('.slider .w-container').css('height', sliderCorrection);
			$('.slider .w-container').css('margin-top', -sliderCorrection);
		};

		// Ajax submit for rush interest w/ animation
		$('.addemail').submit(function(ev) {
			ev.preventDefault();
			$.ajax({
					url: '<?php bloginfo('stylesheet_directory'); ?>/form-addemail.php',
					method: 'POST',
					dataType: 'text',
					data: $('.addemail').serialize(),
					success: function(message) {
						$('.postresponse').css('color', 'green');
						$('.postresponse').text(message);
						$('.inputandbutton').fadeOut(300);
						$('.postresponse').delay(300).fadeIn();
						if(message != "Successfully added email. Thanks!") {
							// error message -> show message, then fade out and re-display input box 
							$('.postresponse').css('color', 'red');
							$('.postresponse').delay(1000).fadeOut(300);
							$('.inputandbutton').delay(1800).fadeIn(300);
						}
					}
			});
		});
	</script>

<?php get_footer(); ?>