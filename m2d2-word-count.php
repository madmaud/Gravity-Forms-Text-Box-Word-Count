<?php
/*
Plugin Name:  Word Counter
Plugin URI:   https://madmaud.com 
Description:  Controls word count for form submission textarea. Add 'm2d2-check-word-count' class to textarea class field. 800 word limit currently hard coded.
Version:      1.0
Author:       Jewel Clark 
Author URI:   https://madmaud.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

*/
function m2d2_word_count_js_init()
{
    wp_enqueue_script('m2d2-word-count', plugins_url('/js/m2d2-word-count.js', __FILE__), array('jquery'), 1.0);
}
add_action('wp_enqueue_scripts', 'm2d2_word_count_js_init');

// Added custom validation for maximum word count
//Targets a specific form and field ID (2 is the form and 17 is the field ID in that form). Change this to match your own form.
add_filter("gform_field_validation_2_17", "validate_word_count", 10, 4);

function validate_word_count($result, $value, $form, $field)
{
    if (str_word_count($value) > 800) //Maximum number of words
    {
        $result["is_valid"] = false;
        $result["message"] = "Please enter no more than 800 words.";
    }
    return $result;
}
