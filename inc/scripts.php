<?php
/**
 * Enqueue scripts and styles.
 */
function bellaworks_scripts() {
  wp_enqueue_style( 'bellaworks-style', get_stylesheet_uri() );

  wp_deregister_script('jquery');
  //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', false, '1.10.2', false);
  wp_enqueue_script('jquery');


  wp_enqueue_script( 
      'bellaworks-vendor', 
      get_template_directory_uri() . '/assets/js/vendor.js', 
      array(), '20120206', 
      true 
    );
  wp_enqueue_script( 
      'bellaworks-colorbox', 
      get_template_directory_uri() . '/assets/js/colorbox.js', 
      array(), '20120207', 
      true 
    );
  // wp_enqueue_script( 
  //    'bellaworks-resy', 
  //    get_template_directory_uri() . '/assets/js/custom/resy.js', 
  //    array(), '20120206', 
  //    false 
  //  );

  wp_enqueue_script( 
      'bellaworks-custom', 
      get_template_directory_uri() . '/assets/js/custom.js', 
      array(), '20120206', 
      true 
    );


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'bellaworks_scripts' );