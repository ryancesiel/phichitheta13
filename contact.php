<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>

	<!-- Section Category -->
	<div class="sub-header">
		<div class="w-container">
			<div class="category">Contact</div>
		</div>
		<div class="breadcrumbs">
			<div class="w-container">
			Home > Contact
			</div>
		</div>
	</div>

	<!-- Content -->
	<div class="w-container">
		<div class="content">
			<div class="content-header">Contact</div>
			<div class="content-body">	
				<?php while ( have_posts() ) : the_post(); ?>  
					<?php the_content('Read More'); ?> 
				<?php endwhile; ?> 
				<form class="form-horizontal" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/form-contact.php">
					<div class="control-group">
						<div class="controls">
							<span class="contact-message"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="name">Name</label>
						<div class="controls">
							<input type="text" class="input-xxlarge" id="name" name="name" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<input type="text" class="input-xxlarge" id="email" name="email" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="subject">Subject</label>
						<div class="controls">
							<input type="text" class="input-xxlarge" id="subject" name="subject" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="message">Message</label>
						<div class="controls">
							<textarea rows="5" class="input-xxlarge" id="message" name="message"></textarea>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn">Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="clearboth"></div>
	</div>

	<script type="text/javascript">
	$('.form-horizontal').submit(function(ev) {
			ev.preventDefault();
			$.ajax({
					url: '<?php bloginfo('stylesheet_directory'); ?>/form-contact.php',
					method: 'POST',
					data: $('.form-horizontal').serialize(),
					success: function() {
						$('.contact-message').css('color', 'green');
						$('.contact-message').text('Your message was successfully sent.');
						$('.contact-message').fadeIn(300);
					},
					error: function() {
						$('.contact-message').css('color', 'red');
						$('.contact-message').text('Your message did not send successfully.');
						$('.contact-message').fadeIn(300);
					}
			});
		});
	</script>

<?php get_footer(); ?>