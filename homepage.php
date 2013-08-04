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
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/videobg.jpg" />
					<div class="w-container">
						<div class="slidertext vert-center horz-center">
							<h1><span style="color:#fff000;">Rush Phi Chi Theta</span> Fall 2013</h1>
							<span class="subtitle">Business and Economics Fraternity</span><br /><br />
							<a class="btn popup-youtube" href="http://www.youtube.com/watch?v=6JjWTAEwAcw">Play Video</a> <a href="rushwelcome.html" class="btn">Learn More About Rushing</a>
						</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/bg1.jpg" />
					<div class="w-container">
						<div class="slidertext background bottom right">
							<h1>Phi Chi Theta Fall 2012</div>
					</div>
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/bg2.jpg" />
				</li>
				<li>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/bg3.jpg" />
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
					Interested in rushing Fall 2013?  Add your email address to the the contact list!
				</div>
				<div class="pull-right">
					<div class="inputandbutton">
					<input type="text" placeholder="example@umich.edu" />
					<a href="#" class="btn">Add Email</a></div>
					<div class="postresponse">Successfully added email. Thanks!</div>
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
			<h2>Proudly Sponsored By:</h2>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors.png" />
		</div>
	</div>

	<script type="text/javascript">
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
				animationSpeed: 1300,
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

		$('.inputandbutton a').click(function(ev) {
			ev.preventDefault();
			$(this).parent().fadeOut(300);
			$('.postresponse').delay(300).fadeIn();
		});
	</script>

<?php get_footer(); ?>