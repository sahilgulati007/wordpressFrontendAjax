<?php
function wpdocs_theme_name_scripts()
{
    //implementing bootstrap cdn
    wp_enqueue_style('customStyle', get_template_directory_uri() . '/assets/css/customStyle.css');
    wp_enqueue_style('bootstrap.min', '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css');
   // definfing custom javascript file to use to define object for ajax url
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.4.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'customJs', get_template_directory_uri() . '/assets/js/customJs.js');

    //definfing object and variable

    wp_localize_script( 'customJs', 'frontend_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        )
    );
}
//ajax function call
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
function add_register(){
    echo json_encode("hello");
    wp_die();
}
add_action( 'wp_ajax_nopriv_add_register', 'add_register' );
add_action( 'wp_ajax_add_register', 'add_register' );