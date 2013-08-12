	<div class="push"></div> <!-- needed for "sticky" footer @ bottom -->
</div>

<div class="footer">
	<div class="w-container">
	Copyright Phi Chi Theta, Zeta Beta Chapter at the University of Michigan 2013. All rights reserved.
</div>

<?php wp_footer(); ?> 

<script type="text/javascript">
	// Show loading until page loads
	$(window).load(function() {
		$('body').removeClass('loading');
		if($('#wpadminbar')[0]) {
			// check if an admin is logged in and adjust the header, sub header and sub nav
			$('.sub-header').css('top', '96');
			$('.sub-nav').css('top', '215');
		}
	});

	// Navigation Animation
	$('.nav > li > ul').hide().removeClass('submenu');
	$('.nav > li').hover(
		function () {
			$('ul', this).stop().slideDown(100);
		},
		function () {
			$('ul', this).stop().slideUp(100);
		}
	);

	// jQuery pagination for media page
	var pageSize = Math.ceil($('.gallery-item').length / 12);
	for(var i = 1; i <= pageSize; i++) {
		$('ul.pages').append('<li><a href="#">' + i + '</a></li>');
	}
	function showPage(page) {
		$('.gallery-item').hide();
		$('.gallery-item').each(function(n) {
			if (Math.floor(n / 12) == page - 1)
				$(this).fadeIn('normal');
		});
	}
	showPage(1);
	$('.pages a').first().addClass('current');
	$('.pages a').click(function() {
		$('.pages a').removeClass('current');
		$(this).addClass('current');
		showPage(parseInt($(this).text()));
	});

	//
	$(document).ready(function() {
		$('.gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile mfp-fade',
				gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) { return item.el.attr('title'); }
			}
		});
	});

	// Mobile Navigation
	$(function () {
		$('.menu-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
			modal: true
		});
		$(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
	});

	// Accordion Functionality
	$('.showhide li h3').click(function () {
		$('+ .showhide_content', this).slideToggle(200);

		var $this = $(this).find('span');
		$this.text($this.text() == '+' ? '-' : '+');
	});
</script>
</body>
</html>