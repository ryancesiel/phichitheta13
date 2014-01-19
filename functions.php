<?php

if(function_exists('register_nav_menus')){
	register_nav_menus(array('Primary' => 'Main Navigation Menu'));
}

// after login, redirect to page they were on
if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
	add_filter('login_redirect', 'my_login_redirect', 10, 3);
	function my_login_redirect() {
		$location = $_SERVER['HTTP_REFERER'];
		wp_safe_redirect($location);
		exit();
	}
}

function isSubPage() {
	global $post;
	if (is_page() && $post->post_parent) {
		$parentID = $post->post_parent;
		return $parentID;
	} else {
		return false;
	};
};

add_action( 'show_user_profile', 'extra_profile_field' );
add_action( 'edit_user_profile', 'extra_profile_field' );

function extra_profile_field( $user ) { ?>

	<h3>Interviewed Members</h3>

	<table class="form-table">

		<tr>
			<th><label for="called_members">Called Members</label></th>

			<td>
				<input type="text" name="called_members" id="called_members" value="<?php echo esc_attr( get_the_author_meta( 'called_members', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">IDs of PCT members called.</span>
			</td>
		</tr>

		<tr>
			<th><label for="interviewed_members">Interviewed Members</label></th>

			<td>
				<input type="text" name="interviewed_members" id="interviewed_members" value="<?php echo esc_attr( get_the_author_meta( 'interviewed_members', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">IDs of PCT members interviewed.</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );

function save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'called_members', $_POST['called_members'] );
	update_usermeta( $user_id, 'interviewed_members', $_POST['interviewed_members'] );
}

// Remove WP default styling for gallery
add_filter( 'use_default_gallery_style', '__return_false' );

// ex - check_user_role('pledge');
function check_user_role( $role, $user_id = null ) {
 
    if ( is_numeric( $user_id ) )
	$user = get_userdata( $user_id );
    else
        $user = wp_get_current_user();
 
    if ( empty( $user ) )
	return false;
 
    return in_array( $role, (array) $user->roles );
}


// Misc style shortcodes
// Larger font paragraph
function big_paragraph( $atts, $content = null ) {
	return '<p class="big">' . do_shortcode($content) . '</p>';
}
add_shortcode('big_paragraph', 'big_paragraph');


// Slide down shortcodes
function showhide( $atts, $content = null ) {
	return '<ul class="showhide">' . do_shortcode($content) . '</ul>';
}
add_shortcode('showhide', 'showhide');

function showhide_title( $atts, $content = null ) {
	return '<li><h3><span>+</span>' . do_shortcode($content) . '</h3>';
}
add_shortcode('showhide_title', 'showhide_title');

function showhide_content( $atts, $content = null ) {
	return '<div class="showhide_content">' . do_shortcode($content) . '</div></li>';
}
add_shortcode('showhide_content', 'showhide_content');

// Large Title Numbered List
function large_numberedlist( $atts, $content = null ) {
	return '<ol class="special">' . do_shortcode($content) . '</ol>';
}
add_shortcode('large_numberedlist', 'large_numberedlist');

function large_numberedlist_item( $atts, $content = null ) {
	return '<li>' . do_shortcode($content) . '</li>';
}
add_shortcode('large_numberedlist_item', 'large_numberedlist_item');

// Column shortcodes from mysitemyway.com
function one_third( $atts, $content = null ) {
	return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'one_third');

function one_third_last( $atts, $content = null ) {
	return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'one_third_last');

function two_third( $atts, $content = null ) {
	return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'two_third');

function two_third_last( $atts, $content = null ) {
	return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'two_third_last');

function one_half( $atts, $content = null ) {
	return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'one_half');

function one_half_last( $atts, $content = null ) {
	return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'one_half_last');

function one_fourth( $atts, $content = null ) {
	return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'one_fourth');

function one_fourth_last( $atts, $content = null ) {
	return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last');

function three_fourth( $atts, $content = null ) {
	return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'three_fourth');

function three_fourth_last( $atts, $content = null ) {
	return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'three_fourth_last');

function one_fifth( $atts, $content = null ) {
	return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'one_fifth');

function one_fifth_last( $atts, $content = null ) {
	return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'one_fifth_last');

function two_fifth( $atts, $content = null ) {
	return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'two_fifth');

function two_fifth_last( $atts, $content = null ) {
	return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'two_fifth_last');

function three_fifth( $atts, $content = null ) {
	return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'three_fifth');

function three_fifth_last( $atts, $content = null ) {
	return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'three_fifth_last');

function four_fifth( $atts, $content = null ) {
	return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'four_fifth');

function four_fifth_last( $atts, $content = null ) {
	return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'four_fifth_last');

function one_sixth( $atts, $content = null ) {
	return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'one_sixth');

function one_sixth_last( $atts, $content = null ) {
	return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'one_sixth_last');

function five_sixth( $atts, $content = null ) {
	return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'five_sixth');

function five_sixth_last( $atts, $content = null ) {
	return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'five_sixth_last');

# Removes the auto paragraphing from Wordpress
function formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'formatter', 99);
add_filter('widget_text', 'formatter', 99);
?>