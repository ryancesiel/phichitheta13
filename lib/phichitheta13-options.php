<?php

# Define settings sections
function phichitheta13_options_page_sections() {  
	$sections = array();  
	// $sections[$id]       = __($title, 'phichitheta13_textdomain');  
	$sections['txt_section']    = __('Text Form Fields', 'phichitheta13_textdomain');  
	$sections['txtarea_section']    = __('Textarea Form Fields', 'phichitheta13_textdomain');  
	$sections['select_section']     = __('Select Form Fields', 'phichitheta13_textdomain');  
	$sections['checkbox_section']   = __('Checkbox Form Fields', 'phichitheta13_textdomain');  
	  
	return $sections;
}

function phichitheta13_options_page_fields() {  
    // Text Form Fields section  
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_txt_input",  
        "title"   => __( 'Text Input - Some HTML OK!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A regular text input field. Some inline HTML (<a>, <b>, <em>, <i>, <strong>) is allowed.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => __('Some default value','phichitheta13_textdomain')  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_nohtml_txt_input",  
        "title"   => __( 'No HTML!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A text input field where no html input is allowed.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => __('Some default value','phichitheta13_textdomain'),  
        "class"   => "nohtml"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_numeric_txt_input",  
        "title"   => __( 'Numeric Input', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A text input field where only numeric input is allowed.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => "123",  
        "class"   => "numeric"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_multinumeric_txt_input",  
        "title"   => __( 'Multinumeric Input', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A text input field where only multible numeric input (i.e. comma separated numeric values) is allowed.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => "123,234,345",  
        "class"   => "multinumeric"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_url_txt_input",  
        "title"   => __( 'URL Input', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A text input field which can be used for urls.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => "http://wp.tutsplus.com",  
        "class"   => "url"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_email_txt_input",  
        "title"   => __( 'Email Input', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A text input field which can be used for email input.', 'phichitheta13_textdomain' ),  
        "type"    => "text",  
        "std"     => "email@email.com",  
        "class"   => "email"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_multi_txt_input",  
        "title"   => __( 'Multi-Text Inputs', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A group of text input fields', 'phichitheta13_textdomain' ),  
        "type"    => "multi-text",  
        "choices" => array( __('Text input 1','phichitheta13_textdomain') . "|txt_input1", __('Text input 2','phichitheta13_textdomain') . "|txt_input2", __('Text input 3','phichitheta13_textdomain') . "|txt_input3", __('Text input 4','phichitheta13_textdomain') . "|txt_input4"),  
        "std"     => ""  
    );  
      
    // Textarea Form Fields section  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_txtarea_input",  
        "title"   => __( 'Textarea - HTML OK!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text. HTML tags allowed!', 'phichitheta13_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','phichitheta13_textdomain')  
    );  
  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_nohtml_txtarea_input",  
        "title"   => __( 'No HTML!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text. No HTML!', 'phichitheta13_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','phichitheta13_textdomain'),  
        "class"   => "nohtml"  
    );  
      
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_allowlinebreaks_txtarea_input",  
        "title"   => __( 'No HTML! Line breaks OK!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'No HTML! Line breaks allowed!', 'phichitheta13_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','phichitheta13_textdomain'),  
        "class"   => "allowlinebreaks"  
    );  
  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_inlinehtml_txtarea_input",  
        "title"   => __( 'Some Inline HTML ONLY!', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text.  
            Only some inline HTML  
            (<a>, <b>, <em>, <strong>, <abbr>, <acronym>, <blockquote>, <cite>, <code>, <del>, <q>, <strike>)   
            is allowed!', 'phichitheta13_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','phichitheta13_textdomain'),  
        "class"   => "inlinehtml"  
    );    
      
    // Select Form Fields section  
    $options[] = array(  
        "section" => "select_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_select_input",  
        "title"   => __( 'Select (type one)', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A regular select form field', 'phichitheta13_textdomain' ),  
        "type"    => "select",  
        "std"    => "3",  
        "choices" => array( "1", "2", "3")  
    );  
      
    $options[] = array(  
        "section" => "select_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_select2_input",  
        "title"   => __( 'Select (type two)', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'A select field with a label for the option and a corresponding value.', 'phichitheta13_textdomain' ),  
        "type"    => "select2",  
        "std"    => "",  
        "choices" => array( __('Option 1','phichitheta13_textdomain') . "|opt1", __('Option 2','phichitheta13_textdomain') . "|opt2", __('Option 3','phichitheta13_textdomain') . "|opt3", __('Option 4','phichitheta13_textdomain') . "|opt4")  
    );  
      
    // Checkbox Form Fields section  
    $options[] = array(  
        "section" => "checkbox_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_checkbox_input",  
        "title"   => __( 'Checkbox', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'Some Description', 'phichitheta13_textdomain' ),  
        "type"    => "checkbox",  
        "std"     => 1 // 0 for off  
    );  
      
    $options[] = array(  
        "section" => "checkbox_section",  
        "id"      => PHICHITHETA13_SHORTNAME . "_multicheckbox_inputs",  
        "title"   => __( 'Multi-Checkbox', 'phichitheta13_textdomain' ),  
        "desc"    => __( 'Some Description', 'phichitheta13_textdomain' ),  
        "type"    => "multi-checkbox",  
        "std"     => '',  
        "choices" => array( __('Checkbox 1','phichitheta13_textdomain') . "|chckbx1", __('Checkbox 2','phichitheta13_textdomain') . "|chckbx2", __('Checkbox 3','phichitheta13_textdomain') . "|chckbx3", __('Checkbox 4','phichitheta13_textdomain') . "|chckbx4")    
    );  
      
    return $options;      
}

?>