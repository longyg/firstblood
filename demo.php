<?php
/**
* @package WordPress
* Template Name: demo
*/
if( isset($wp_query->query_vars['pid']) ) {
  $pid = urldecode($wp_query->query_vars['pid']);
  $post = get_post($pid);
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no_js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body class="loading">

  <div id="akeeba-renderjoomla">
    <div class="header" id="header">
      <div class="container">
        <div class="row">
          <div class="col-xs-5 col-sm-3 col-md-3">
            <a id="logo" href="<?php echo home_url(); ?>">
              <img class="sp-default-logo" alt="<?php echo get_bloginfo();?>" src="Unistore%20-%20Bootstrap%20Responsive%20E-Commerce%20Template%20Live%20Demo%20_%20ShapeBootstrap_files/logo2x.png">
            </a>
          </div>
          <div class="col-xs-5 col-sm-5 col-md-4">
            <div class="" id="theme-selector">
              <span class="theme-name"><?php echo $post->post_title; ?></span>
              <span class="pull-right"><i class="sp-angle-up"></i><i class="sp-angle-down"></i></span>
            </div>
          </div>
          <div class="col-xs-2 col-sm-4 col-md-4">
            <div id="product-tools" class="clearfix">
              <div>
                <a id="remove-frame" href="#"><span><i class="fa fa-times"></i></span></a>
              </div>
              <div class="product-links hidden-xs">
                <a class="btn btn-success btn-purchase" href="<?php echo get_download_src_link($pid); ?>">立即下载</a>
              </div>
              <div id="responsive" class="hidden-sm hidden-xs">
                <a id="desktop" href="#" class="active"><i class="fa fa-desktop"></i></a>
                <a id="tablet-landscape" href="#"><i class="fa fa-tablet"></i></a>
                <a id="tablet-portrait" href="#"><i class="fa fa-tablet"></i></a>
                <a id="phone-landscape" href="#"><i class="fa fa-mobile"></i></a>
                <a id="phone-portrait" href="#"><i class="fa fa-mobile"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="templates-wrapper" style="display: none;">
      <div class="container">
        <div class="templates-demo">
          <div class="clearfix" style="margin-bottom: 20px;">
            <a href="<?php echo get_the_author_meta( 'user_url', $post->post_author ); ?>"><strong><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></strong></a> 的作品
          </div>
          <?php preview_demo_posts($pid); ?>
        </div>
      </div>
    </div>
    <div style="height: auto; width: auto;" id="demoframe">
      <iframe name="demoframe" src="<?php echo get_demo_src_link($pid); ?>" frameborder="0"></iframe>
    </div>
  </div>

  <div class="preloader"><div></div></div>
</body>
</html>
