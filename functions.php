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
  wp_register_style( 'sppagebuilder', get_template_directory_uri() . '/css/sppagebuilder.css' );

  //wp_register_style( 'bootstrap-theme', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css' );
  //wp_register_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css' );
  //wp_register_script( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap' );

  wp_enqueue_style( 'bootstrap-theme' );
  wp_enqueue_style( 'bootstrap' );
  wp_enqueue_style( 'font-awesome' );


  if (is_home()) {
    wp_enqueue_style( 'sppagebuilder' );
  }
  if (is_page('demo')) {
    wp_enqueue_script( 'preview' );
    wp_enqueue_style( 'preview' );
  } else {
    wp_enqueue_script( 'main' );
    wp_enqueue_style( 'template' );
  }

  wp_enqueue_style( 'style' );
}
endif;
add_action( 'wp_enqueue_scripts', 'include_scripts_styles' );
show_admin_bar(false);

function my_body_classes($classes) {
  if (is_home()) {
    $classes[] = 'site com-sppagebuilder view-page no-layout no-task en-gb ltr sticky-header layout-fluid';
  } else {
    $classes[] = 'site com-product view-products no-layout no-task en-gb ltr sticky-header layout-fluid';
  }
  return $classes;
}
add_filter('body_class','my_body_classes');

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

// 显示文章的缩略图
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

// 在演示页面显示当前演示案例的作者的所有案例
function preview_demo_posts($post_id) {
  echo '<div class="demo-list">';
  $query = new WP_Query( array(
    'author' => $post->post_author
  ));
  $posts = $query->posts;
  $size = sizeof($posts);

  $active_page = 1;
  if ($size > 0) {
    for ($n = 1; $n <= $size; $n++) {
      $post = $posts[$n - 1];
      if ($post_id == $post->ID) {
        $active_page = ceil($n / 4);
        break;
      }
    }
  }

  if ($size > 0) {
    $page = ceil($size / 4);
    for ($i = 0; $i < $page; $i++) {
      echo '<div class="row';
      if ($i == ($active_page - 1)) {
         echo ' active';
      }
      echo '">';
        for ($j = 0; $j < 4; $j++) {
          $index = $i * 4 + $j;
          if ($index < $size) {
            $p = $posts[$index];
            $pid = $p->ID;
            $demo_link = get_demo_link($pid);
            $demo_src_link = get_demo_src_link($pid);
            $download_src_link = get_download_src_link($pid);
            echo '<div class="col-xs-6 col-sm-3">';
            echo '<div class="template-item';
            if ($pid == $post_id) {
              echo ' active';
            }
            echo '" data-slug="' . $demo_link . '">';
            echo '<a class="demo-link" href="' . $demo_link . '" data-demosrc="' . $demo_src_link . '" data-dlsrc="' . $download_src_link . '">';
            echo '<h3 class="template-title">' . $p->post_title . '</h3>';
            echo '</a>';
            echo '<div class="template">';
            echo '<a class="demo-link" href="' . $demo_link . '>" data-demosrc="' . $demo_src_link . '" data-dlsrc="' . $download_src_link . '">';
            post_thumbnail_image($pid);
            echo '</a></div></div></div>';
          }
        }
      echo '</div>';
    }
  }
  echo '</div>';

  if ($size > 0) {
    echo '<div class="controls"><ul><li class="control-nav prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>';
    $page = ceil($size / 4);
    for ($i = 1; $i <= $page; $i++) {
      echo '<li class="hidden-xs';
      if ($i == $active_page) {
        echo ' active';
      }
      echo '" data-index="' . $i . '"><a href="#">' . $i . '</a></li>';
    }
    echo '<li class="control-nav next"><a href="#"><i class="fa fa-angle-right"></i></a></li>';
    echo '</ul></div>';
  }
}

// 页面面包屑分类导航
// 目前不支持多级分类
// 如果文章有多个分类，默认只使用第一个分类进行导航，建议每篇文章归档到唯一分类中
function breadcrumb_and_page_title() {
  echo '<ol class="breadcrumb">';
  echo '<li><a href="' . home_url() .'" class="pathway">首页</a></li>';
  if (is_category()) {
    global $wp_query;
    $cat_id = get_query_var('cat');
    $category = get_category($cat_id);
    $cat_title = $category->cat_name;
    $cat_url = get_category_link($cat_id);
    echo '<li class="active"><a href="' . $cat_url . '" class="pathway">' . $cat_title . '</a></li>';
    echo '</ol>';
    echo '<h2>' . $cat_title . '</h2>';
  } else if (is_singular()) {
    $category = get_the_category();
    $cat_title = $category[0]->cat_name;
    $cat_id = $category[0]->cat_ID;
    $cat_url = get_category_link( $cat_id );
    echo '<li class="active"><a href="' . $cat_url . '" class="pathway">' . $cat_title . '</a></li>';
    echo '</ol>';
    echo '<h2>' . get_the_title() . '</h2>';
  } else {
    echo '<li class="active"><a href="' . home_url() . '/all-items" class="pathway">所有案例</a></li>';
    echo '</ol>';
    echo '<h2>所有特效案例</h2>';
  }
}

function my_search_form() {
  $search_url = get_bloginfo('url') . '/all-items';
  echo '<form class="form-product-search" action="' . $search_url . '" method="get">';
  echo '<input class="input-product-search" name="s" placeholder="搜索特效案例..." type="text" value="' . get_search_query() .'"><i class="sb-icon-search"></i>';
  echo '</form>';
}
