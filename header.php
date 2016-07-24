<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no_js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="body-innerwrapper">

    <header id="sp-header">
  		<div class="container">
  			<div style="position: relative;" class="row">
  				<div id="sp-logo" class="col-xs-8 col-sm-4 col-md-3">
  					<div class="sp-column ">
  						<a class="logo" href="<?php echo home_url();?>">
  							<h1>
  								<img class="sp-default-logo" src="Premium%20Bootstrap%20Templates%20&amp;%20Themes%20_%20ShapeBootstrap_files/logo.png" alt="<?php echo get_bloginfo();?>">
  								<img class="sp-retina-logo" src="Premium%20Bootstrap%20Templates%20&amp;%20Themes%20_%20ShapeBootstrap_files/logo2x.png" alt="<?php echo get_bloginfo();?>" height="20" width="200">
  							</h1>
  						</a>
  					</div>
  				</div>
  				<div style="position: static;" id="sp-menu" class="col-xs-4 col-sm-8 col-md-9">
  					<div class="sp-column ">
  						<ul class="menu-account">
  							<li class="shopping-cart"><a class="btn-cart" href="https://shapebootstrap.net/cart"><i class="sb-icon-cart"></i> <small class="my-cart">0</small></a></li>
  							<li class="account-register"><a class="btn btn-primary btn-md btn-registration hidden-sm hidden-xs" href="https://shapebootstrap.net/create-an-account"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
  							<li class="account-login"><a class="btn btn-success btn-md btn-login hidden-sm hidden-xs" href="https://shapebootstrap.net/login?return=aHR0cHM6Ly9zaGFwZWJvb3RzdHJhcC5uZXQvaXRlbXM="><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
  						</ul>

  						<div class="sp-megamenu-wrapper">
  							<a id="offcanvas-toggler" class="visible-xs" href="#"><i class="fa fa-bars"></i></a>

                <?php
                wp_nav_menu( array(
                  'menu'   => 'primary',
                  'container' => false,
                  'menu_class' => 'sp-megamenu-parent menu-fade hidden-xs',
                  'walker' => new WPDocs_Walker_Nav_Menu()
                ) );
                 ?>
  						</div>

  					</div>
  				</div>
  			</div>
  		</div>
  	</header>

    <section id="sp-page-title">
      <div class="row">
        <div id="sp-title" class="col-sm-12 col-md-12">
          <div class="sp-column ">
            <?php if (!is_home()) : ?>
            <div class="sp-page-title">
              <div class="container">
                <div class="row">
                  <div class="col-sm-8">
                      <ol class="breadcrumb">
                        <li><a href="<?php echo home_url();?>" class="pathway">首页</a></li>
                        <?php
                          $category = get_the_category();
                          $cat_title = $category[0]->cat_name;
                          $cat_id = $category[0]->cat_ID;
                          $cat_url = get_category_link( $cat_id );
                         ?>
                        <li class="active"><a href="<?php echo $cat_url; ?>" class="pathway"><?php echo $cat_title; ?></a></li>
                      </ol>
                      <?php if (!is_singular()) : ?>
                        <h2><?php echo $cat_title; ?></h2>
                      <?php else : ?>
                        <h2><?php echo get_the_title(); ?></h2>
                      <?php endif; ?>
                  </div>
                  <div class="col-sm-4">
                    <form class="form-product-search" action="/items" method="get">
                      <input class="input-product-search" name="search" placeholder="Search Themes" type="text"><i class="sb-icon-search"></i>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
