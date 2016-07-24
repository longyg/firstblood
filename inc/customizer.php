<?php

function fb_custom_header_and_background() {
  $color_scheme = fb_get_color_scheme();  //todo
  $default_background_color = trim($color_scheme[0], '#');
  $default_text_color = trim($color_scheme[3], '#');

  add_theme_support( 'custom-header', apply_filters( 'fb_custom_header_args', array(
    'default_text_color'     => $default_text_color,
    'width'                  => 1200,
    'height'                 => 280,
    'flex-height'            => true,
    'wp-head-callback'       => 'fb_header_style'
  ) ) );
}
add_action( 'after_setup_theme', 'fb_custom_header_and_background' );

if ( ! function_exists( 'fb_header_style' ) ) :

function fb_header_style() {
  if ( display_header_text() ) {
    return;
  }

  ?>
  <style type="text/css" id="fb_header_css">
    .site-branding {
      margin: 0 auto 0 0;
    }
    .site-branding .site-title, .site-description {
      clip: rect(1px, 1px, 1px, 1px);
      position: absolute;
    }
  </style>

  <?php
}
endif;

/**
  * The order of colors in a colors array:
  * 1. Main Background Color.
  * 2. Page Background Color.
  * 3. Link Color.
  * 4. Main Text Color.
  * 5. Secondary Text Color.
  */
function fb_get_color_schemes() {
  return apply_filters( 'fb_color_schemes', array(
    'default'  => array(
      'label'  => __( 'Default', 'fb' ),
      'colors' => array(
        '#1a1a1a',
				'#ffffff',
				'#007acc',
				'#1a1a1a',
				'#686868'
      )
    ),

    'dark'     => array(
      'label'  => __( 'Dark', 'fb' ),
      'colors' => array(
        '#262626',
				'#1a1a1a',
				'#9adffd',
				'#e5e5e5',
				'#c1c1c1'
      )
    ),

    'gray'     => array(
      'label'  => __( 'Gary', 'fb' ),
      'colors' => array(
        '#616a73',
				'#4d545c',
				'#c7c7c7',
				'#f2f2f2',
				'#f2f2f2'
      )
    ),

    'red'      => array(
      'label'  => __( 'Red', 'fb' ),
      'colors' => array(
        '#ffffff',
				'#ff675f',
				'#640c1f',
				'#402b30',
				'#402b30'
      )
    ),

    'yellow'   => array(
      'label'  => __( 'Yellow', 'fb' ),
      'colors' => array(
        '#3b3721',
				'#ffef8e',
				'#774e24',
				'#3b3721',
				'#5b4d3e'
      )
    )
  ) );
}

if ( ! function_exists( 'fb_get_color_scheme') ) :
function fb_get_color_scheme() {
  $color_scheme_option = get_theme_mod( 'color_name', 'default');
  $color_schemes = fb_get_color_schemes();

  if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
    return $color_schemes[ $color_scheme_option ][ 'colors' ];
  }

  return $color_schemes[ 'default' ][ 'colors' ];
}
endif;
?>
