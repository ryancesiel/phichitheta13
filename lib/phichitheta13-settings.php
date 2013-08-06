<?php
// Page settings sections and fields
require_once('phichitheta13-options.php');

define('PHICHITHETA13_SHORTNAME', 'phichitheta13');
define('PHICHITHETA13_PAGE_BASENAME', 'phichitheta13-settings');

add_action( 'admin_menu', 'phichitheta13_add_menu' );
add_action( 'admin_init', 'phichitheta13_register_settings' );

// Add page link under "Appearance"
function phichitheta13_add_menu() {
	$phichitheta13_settings_page = add_theme_page(__('Phi Chi Theta Theme Options'), __('Phi Chi Theta Theme Options','phichitheta13_textdomain'), 'manage_options', PHICHITHETA13_PAGE_BASENAME, 'phichitheta13_settings_page_fn');            
}

function phichitheta13_get_settings() {  
      
    $output = array();  
      
    // put together the output array   
    $output['phichitheta13_option_name']       = 'phichitheta13_options';  
    $output['phichitheta13_page_title']        = __( 'Phi Chi Theta Theme Settings Page','phichitheta13_textdomain');  
    $output['phichitheta13_page_sections']     = phichitheta13_options_page_sections();  
    $output['phichitheta13_page_fields']       = phichitheta13_options_page_fields();  
    $output['phichitheta13_contextual_help']   = '';  
      
	return $output;  
}  

/** 
 * Helper function for registering our form field settings 
 * 
 * src: http://alisothegeek.com/2011/01/wordpress-settings-api-tutorial-1/ 
 * @param (array) $args The array of arguments to be used in creating the field 
 * @return function call 
 */  
function phichitheta13_create_settings_field( $args = array() ) {  
    // default array to overwrite when calling the function  
    $defaults = array(  
        'id'      => 'default_field',                    // the ID of the setting in our options array, and the ID of the HTML form element  
        'title'   => 'Default Field',                    // the label for the HTML form element  
        'desc'    => 'This is a default description.',  // the description displayed under the HTML form element  
        'std'     => '',                                 // the default value for this setting  
        'type'    => 'text',                             // the HTML form element to use  
        'section' => 'main_section',                     // the section this setting belongs to — must match the array key of a section in phichitheta13_options_page_sections()  
        'choices' => array(),                            // (optional): the values in radio buttons or a drop-down menu  
        'class'   => ''                                  // the HTML form element class. Also used for validation purposes!  
    );  
      
    // "extract" to be able to use the array keys as variables in our function output below  
    extract( wp_parse_args( $args, $defaults ) );  
      
    // additional arguments for use in form field output in the function phichitheta13_form_field_fn!  
    $field_args = array(  
        'type'      => $type,  
        'id'        => $id,  
        'desc'      => $desc,  
        'std'       => $std,  
        'choices'   => $choices,  
        'label_for' => $id,  
        'class'     => $class  
    );  
  
    add_settings_field( $id, $title, 'phichitheta_form_field_fn', __FILE__, $section, $field_args );  
  
}

function phichitheta13_register_settings(){  
	// get the settings sections array  
	$settings_output    = phichitheta13_get_settings();  
	$phichitheta13_option_name = $settings_output['phichitheta13_option_name'];  
	  
	//setting  
	//register_setting( $option_group, $option_name, $sanitize_callback );  
	register_setting($phichitheta13_option_name, $phichitheta13_option_name, 'phichitheta13_validate_options' );

	//sections  
	// add_settings_section( $id, $title, $callback, $page );  
	if(!empty($settings_output['phichitheta13_page_sections'])){  
		// call the "add_settings_section" for each!  
		foreach ( $settings_output['phichitheta13_page_sections'] as $id => $title ) {  
			add_settings_section( $id, $title, 'phichitheta13_section_fn', __FILE__);  
		}  
	}

	//fields  
    if(!empty($settings_output['phichitheta13_page_fields'])){  
        // call the "add_settings_field" for each!  
        foreach ($settings_output['phichitheta13_page_fields'] as $option) {  
            phichitheta13_create_settings_field($option);  
        }  
    }  
}

function  phichitheta13_section_fn($desc) {  
    echo "<p>" . __('Settings for this section','phichitheta13_textdomain') . "</p>";  
}

/* 
 * Form Fields HTML 
 * All form field types share the same function!! 
 * @return echoes output 
 */  
function phichitheta13_form_field_fn($args = array()) {  
      
    extract( $args );  
      
    // get the settings sections array  
    $settings_output    = phichitheta13_get_settings();  
      
    $phichitheta13_option_name = $settings_output['phichitheta13_option_name'];  
    $options            = get_option($phichitheta13_option_name);  
      
    // pass the standard value if the option is not yet set in the database  
    if ( !isset( $options[$id] ) && 'type' != 'checkbox' ) {  
        $options[$id] = $std;  
    }  
      
    // additional field class. output only if the class is defined in the create_setting arguments  
    $field_class = ($class != '') ? ' ' . $class : '';  
      
      
    // switch html display based on the setting type.  
    switch ( $type ) {  
        case 'text':  
            $options[$id] = stripslashes($options[$id]);  
            $options[$id] = esc_attr( $options[$id]);  
            echo "<input class='regular-text$field_class' type='text' id='$id' name='" . $phichitheta13_option_name . "[$id]' value='$options[$id]' />";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
        break;  
          
        case "multi-text":  
            foreach($choices as $item) {  
                $item = explode("|",$item); // cat_name|cat_slug  
                $item[0] = esc_html__($item[0], 'phichitheta13_textdomain');  
                if (!empty($options[$id])) {  
                    foreach ($options[$id] as $option_key => $option_val){  
                        if ($item[1] == $option_key) {  
                            $value = $option_val;  
                        }  
                    }  
                } else {  
                    $value = '';  
                }  
                echo "<span>$item[0]:</span> <input class='$field_class' type='text' id='$id|$item[1]' name='" . $phichitheta13_option_name . "[$id|$item[1]]' value='$value' /><br/>";  
            }  
            echo ($desc != '') ? "<span class='description'>$desc</span>" : "";  
        break;  
          
        case 'textarea':  
            $options[$id] = stripslashes($options[$id]);  
            $options[$id] = esc_html( $options[$id]);  
            echo "<textarea class='textarea$field_class' type='text' id='$id' name='" . $phichitheta13_option_name . "[$id]' rows='5' cols='30'>$options[$id]</textarea>";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";           
        break;  
          
        case 'select':  
            echo "<select id='$id' class='select$field_class' name='" . $phichitheta13_option_name . "[$id]'>";  
                foreach($choices as $item) {  
                    $value  = esc_attr($item, 'phichitheta13_textdomain');  
                    $item   = esc_html($item, 'phichitheta13_textdomain');  
                      
                    $selected = ($options[$id]==$value) ? 'selected="selected"' : '';  
                    echo "<option value='$value' $selected>$item</option>";  
                }  
            echo "</select>";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";   
        break;  
          
        case 'select2':  
            echo "<select id='$id' class='select$field_class' name='" . $phichitheta13_option_name . "[$id]'>";  
            foreach($choices as $item) {  
                  
                $item = explode("|",$item);  
                $item[0] = esc_html($item[0], 'phichitheta13_textdomain');  
                  
                $selected = ($options[$id]==$item[1]) ? 'selected="selected"' : '';  
                echo "<option value='$item[1]' $selected>$item[0]</option>";  
            }  
            echo "</select>";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
        break;  
          
        case 'checkbox':  
            echo "<input class='checkbox$field_class' type='checkbox' id='$id' name='" . $phichitheta13_option_name . "[$id]' value='1' " . checked( $options[$id], 1, false ) . " />";  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
        break;  
          
        case "multi-checkbox":  
            foreach($choices as $item) {  
                  
                $item = explode("|",$item);  
                $item[0] = esc_html($item[0], 'phichitheta13_textdomain');  
                  
                $checked = '';  
                  
                if ( isset($options[$id][$item[1]]) ) {  
                    if ( $options[$id][$item[1]] == 'true') {  
                        $checked = 'checked="checked"';  
                    }  
                }  
                  
                echo "<input class='checkbox$field_class' type='checkbox' id='$id|$item[1]' name='" . $phichitheta13_option_name . "[$id|$item[1]]' value='1' $checked /> $item[0] <br/>";  
            }  
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
        break;  
    }  
}

// Admin Setting Page -> Simply returns the HTML for the settings page
function phichitheta13_settings_page_fn() {
	$settings_output = phichitheta13_get_settings();  
?>  
	<div class="wrap">  
		<div class="icon32" id="icon-options-general"></div>  
		<h2><?php echo $settings_output['phichitheta13_page_title']; ?></h2>  
		  
		<form action="options.php" method="post">  
			<p class="submit">  
				<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes','phichitheta13_textdomain'); ?>" />  
			</p>  
			  
		</form>  
	</div><!-- wrap -->  
<?php 
} 

function phichitheta13_validate_options($input) {  
	$valid_input = array();    
	return $valid_input; // return validated input  
} 
?>