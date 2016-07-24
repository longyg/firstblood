<?php

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/customizer.php';

if ( ! function_exists( 'include_scripts_styles' ) ) :
function include_scripts_styles() {
  wp_register_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );
  wp_register_script( 'main', get_template_directory_uri() . '/js/main.js' );
  wp_register_script( 'preview', get_template_directory_uri() . '/js/preview.js' );

  wp_register_style( 'bootstrap-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css' );
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
  wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
  wp_register_style( 'template', get_template_directory_uri() . '/template.css' );
  wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
  wp_register_style( 'preview', get_template_directory_uri() . '/css/preview.css' );

  //wp_register_style( 'bootstrap-theme', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css' );
  //wp_register_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css' );
  //wp_register_script( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js' );

  if (!is_page('demo')) {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'main' );

    wp_enqueue_style( 'bootstrap-theme' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'template' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'style' );
  } else {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'preview' );

    wp_enqueue_style( 'bootstrap-theme' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'preview' );
    wp_enqueue_style( 'style' );
  }

}
endif;
add_action( 'wp_enqueue_scripts', 'include_scripts_styles' );
show_admin_bar(false);

if ( ! function_exists('fb_setup') ) :
 /**
  * Sets up theme defaults and registers support for various WordPress features.
  * This function is hooked into the after_setup_theme hook, which runs before the init hook.
  * The init hook is too late for some features, such as indicating support for post thumbnails.
  */
  function fb_setup() {

    add_theme_support( 'custom-logo', array(
      'height' => 240,
      'width'  => 240,
      'flex-height' => true
    ) );

    add_theme_support( 'post-thumbnails' );
	  set_post_thumbnail_size( 1200, 9999 );

    // This theme uses wp_nav_menu() in two locations
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'firstblood' ),
      'social'  => __( 'Social Links Menu', 'firstblood' )
    ) );
  }
endif;
add_action( 'after_setup_theme', 'fb_setup' );

// add custom field automatically when publish post
/*
function add_custom_field_automatically($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        add_post_meta($post_ID, 'demo', 'demo', true);
        add_post_meta($post_ID, 'download', 'download', true);
    }
}
add_action('publish_post', 'add_custom_field_automatically');
**/

if ( function_exists('register_sidebar') ) {
    register_sidebar();
}

function add_query_vars($aVars) {
  $aVars[] = 'pid';
  return $aVars;
}
add_filter('query_vars', 'add_query_vars');

function add_rewrite_rules($aRules) {
  $aNewRules = array('live-demo/([^/]+).html/?$' => 'index.php?pagename=demo&pid=$matches[1]');
  $aRules = $aNewRules + $aRules;
  return $aRules;
}

add_filter('rewrite_rules_array', 'add_rewrite_rules');

if (!function_exists('deel_paging')):
    function deel_paging() {
        $p = 4;
        if (is_singular()) return;
        global $wp_query, $paged;
        $max_page = $wp_query->max_num_pages;
        if ($max_page == 1) return;

        echo '
        <div class="pagination-wrapper">
          <ul class="pagination">';

        if (empty($paged)) $paged = 1;

        echo '<li class="prev-page">';
        previous_posts_link('<i class="fa fa-angle-left"></i>');
        echo '</li>';
        if ($paged > $p + 1) p_link(1, '<li>第一页</li>');
        if ($paged > $p + 2) echo "<li><span>&middot;&middot;&middot;</span></li>";
        for ($i = $paged - $p; $i <= $paged + $p; $i++) {
            if ($i > 0 && $i <= $max_page) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link($i);
        }
        if ($paged < $max_page - $p - 1) echo "<li><span> ... </span></li>";
        //if ( $paged < $max_page - $p ) p_link( $max_page, '&raquo;' );
        echo '<li class="next-page">';
        next_posts_link('<i class="fa fa-angle-right"></i>');
        echo '</li>';
        // echo '<li><span>共 '.$max_page.' 页</span></li>';
        echo '</ul></div>';
    }
    function p_link($i, $title = '') {
        if ($title == '') $title = "第 {$i} 页";
        echo "<li><a href='", esc_html(get_pagenum_link($i)) , "'>{$i}</a></li>";
    }
endif;

/*
* Main menu, only support one child level
*/
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<div class=\"sp-dropdown sp-dropdown-main sp-menu-right\" style=\"width: 240px;\"><div class=\"sp-dropdown-inner\"><ul class=\"sp-dropdown-items\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
  		$indent = str_repeat("\t", $depth);
  		$output .= "$indent</ul></div></div>\n";
  	}

  	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

  		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
  		$classes[] = 'sp-menu-item';

  		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

  		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
  		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

  		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
  		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

  		$output .= $indent . '<li' . $class_names .'>';

  		$atts = array();
  		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
  		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
  		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
  		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

  		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

  		$attributes = '';
  		foreach ( $atts as $attr => $value ) {
  			if ( ! empty( $value ) ) {
  				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
  				$attributes .= ' ' . $attr . '="' . $value . '"';
  			}
  		}

  		$title = apply_filters( 'the_title', $item->title, $item->ID );

  		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

  		$item_output = $args->before;
  		$item_output .= '<a'. $attributes .'>';
  		$item_output .= $args->link_before . $title . $args->link_after;
  		$item_output .= '</a>';
  		$item_output .= $args->after;

  		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  	}

  	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
  		$output .= "</li>\n";
  	}
}

function get_category_root_id($cat) {
  $this_category = get_category($cat); // 取得当前分类
  while($this_category->category_parent) // 若当前分类有上级分类时，循环
  {
  $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
  }
  return $this_category->term_id; // 返回根分类的id号
}

function get_demo_link($post_id) {
  return home_url() . '/live-demo/' . $post_id . '.html';
}

function get_demo_src_link($post_id) {
  $customized_demo_link  = get_post_meta($post_id, 'demo', true);
  if ($customized_demo_link != '') {
    return $customized_demo_link;
  } else {
    return home_url() . '/item/' . get_post($post_id)->post_name;
  }
}

function get_download_src_link($post_id) {
  $customized_dl_link  = get_post_meta($post_id, 'download', true);
  if ($customized_dl_link == '') {
    $postname = get_post($post_id)->post_name;
    return home_url() . '/item/' . $postname . '/' . $postname . '.zip';
  } else {
    return $customized_dl_link;
  }
}

function post_thumbnail_image($post_id) {
  $post_title = get_post($post_id)->post_title;
  $img_url = get_stylesheet_directory_uri() . '/images/default.png';
  if (has_post_thumbnail($post_id)) {
    $img_id = get_post_thumbnail_id($post_id);
    $img_urls = wp_get_attachment_image_src($img_id, "Full");
    $img_url = $img_urls[0];
  }
  echo '<img class="img-responsive" src="' . $img_url . '" data-src="' . $img_url . '" alt="' . $post_title . '">';
}
