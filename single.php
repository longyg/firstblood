<?php get_header(); ?>

<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
<section id="sp-main-body">
	<div class="container">
		<div class="row">
			<div id="sp-component" class="col-sm-12 col-md-12">
				<div class="sp-column ">
					<div id="system-message-container">
					</div>
					<div id="akeeba-renderjoomla">
						<div class="item-details">
							<h2 itemprop="name" class="hidden"><?php the_title(); ?></h2>
							<div class="row">
								<div class="col-sm-8">
									<div class="item-details-inner">
										<div class="item-banner">

											<div class="item-thumbnail">
												<a class="item-full-image" target="_blank" href="<?php echo get_demo_link(get_the_ID()); ?>">
													<?php post_thumbnail_image(get_the_ID()); ?>
												</a>
												<a target="_blank" class="btn btn-success btn-preview btn-lg" href="<?php echo get_demo_link(get_the_ID()); ?>">在线演示</a>
											</div>

											<div class="item-demo-share clearfix">
												<div class="pull-left">
													<a class="btn btn-md addtofavories" target="_blank" href="#" data-id="1525886" data-favorites="0"><i class="fa fa-heart-o"></i> 喜欢</a>
												</div>
												<div class="pull-right">
													<script>
													    function social_share(url, winWidth, winHeight) {
													        var winTop = (screen.height / 2) - (winHeight / 2);
													        var winLeft = (screen.width / 2) - (winWidth / 2);
													        window.open(url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
													    }
													</script>
													<div class="social-share">
														<a class="share-facebook" href="javascript:social_share('http://www.facebook.com/sharer.php?p[url]=https://shapebootstrap.net/item/1525886-apnew-multipurpose-landing-page-template', 640, 350)"><i class="fa fa-facebook fa-fw"></i></a>
														<a class="share-twitter" href="javascript:social_share('https://twitter.com/home?status=https://shapebootstrap.net/item/1525886-apnew-multipurpose-landing-page-template', 640, 350)"><i class="fa fa-twitter fa-fw"></i></a>
														<a class="share-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=https://shapebootstrap.net/item/1525886-apnew-multipurpose-landing-page-template&amp;media=https://shapebootstrap.net/media/com_product/products/thumb/1525886/thumbnail.png&amp;description=Apnew  ndash; Multipurpose Landing Page Template is a responsive, clean and modern designed HTML5 template for landing pages.Main features:100%..."><i class="fa fa-pinterest fa-fw"></i></a>
													</div>
												</div>
											</div>

										</div>

										<meta itemprop="url" content="https://shapebootstrap.net/item/1525886-apnew-multipurpose-landing-page-template"/>
										<div class="item-content">
											<div class="item-toolbar">
												<ul class="clearfix">
													<li class="active"><a id="action-item-details" data-product_id="1525886" href="/item/1525886-apnew-multipurpose-landing-page-template">详细介绍</a></li>
													<li><a id="action-item-comments" data-product_id="1525886" href="/item/1525886-apnew-multipurpose-landing-page-template/comments">评论 <span class="badge">0</span></a></li>
												</ul>
											</div>
											<div class="item-content-inner">
												<div class="preloader">
													<div></div>
												</div>
												<div class="item-overview" itemprop="description">
													<?php the_content(); ?>
												</div>
											</div>
										</div>

										<div id="more-items">
											<h3><a href="/profile/devitems"><?php the_author(); ?></a> 的其它作品</h3>
											<div class="row">
												<?php
													if(is_single()) {
													    $query = new WP_Query(
													        array(
													            'author' => $post->post_author,
													            'posts_per_page' => 2,
													            'post__not_in' => array($post->ID),
													        )
													    );
													    $posts = $query->posts;
													?>
												<?php foreach($posts as $k => $p) : ?>

												<div class="col-sm-6">
													<div class="product-template">
														<figure>
															<?php post_thumbnail_image($p->ID); ?>
															<figcaption>
																<div class="vertical-middle">
																	<div>
																		<div class="links">
																			<div>
																				<a class="btn btn-success btn-md" target="_blank" href="<?php echo get_demo_link($p->ID); ?>">在线演示</a>
																			</div>
																			<div>
																				<a class="link-item-details btn btn-primary btn-md" href="<?php echo get_permalink($p->ID); ?>">查看详情</a>
																			</div>
																		</div>
																	</div>
																</div>
															</figcaption>
														</figure>
														<div class="item-header">
															<h3><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h3>
															<span class="item-meta">
				                          <?php
				                            $categories = get_the_category($p->ID);
				                            if ( !empty( $categories ) ) {
				                              foreach ($categories as $category ) {
				                                $catid = $category->cat_ID;
				                          ?>
				                          <a class="label label-default category" href="<?php echo get_category_link($catid); ?>">
				                            <?php  echo $category->name;
				                              }
				                            }
				                            ?>
				                          </a>
				                      </span>
				                      <span class="item-seller">By <a href="https://shapebootstrap.net/profile/themeturn"><?php the_author(); ?></a></span>
														</div>

														<div class="product-meta clearfix">
															<form class="cart" method="post">
																<input type="hidden" name="product_cart" value="1525857"/>
																<a class="item-add-to-cart" href="#">
																	<span class="product-purchased" data-toggle="tooltip" data-placement="top" title="Click to add to cart"><i class="sb-icon-cart"></i> 2 Sales</span>
																</a>
															</form>
															<form class="purchase" action="/cart" method="get">
																<input type="hidden" name="item_id" value="1525857"/>
																<button type="submit" class="product-purchase">
																	<span><span class="product-price"><span>$</span><span>14</span></span></span>
																</button>
															</form>
														</div>

													</div>
												</div>

												<?php endforeach; ?>
												<?php
												}
												?>

											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div id="product-sidebar">
										<div class="item-actions">
											<div class="item-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
												<strong>如果您喜欢：</strong><span itemprop="price"></span>
												<meta itemprop="priceCurrency" content="USD"/>
												<link itemprop="availability" href="http://schema.org/InStock"/>
											</div>
											<a class="btn btn-success btn-md btn-block" target="_blank" href="<?php echo get_demo_link(get_the_ID()); ?>">在线演示</a>
											<form class="purchase" action="/cart" method="get">
												<input type="hidden" name="item_id" value="1525886"/>
												<?php
													$download_file = get_post_meta(get_the_ID(), 'download', true);
													$download_url = home_url() . '/resources' . '/' . $download_file;
												 ?>
												 <a class="btn btn-warning btn-md btn-block" href="<?php echo $download_url; ?>">免费下载</a>
											</form>
											<form class="cart" action="" method="post">
												<input type="hidden" name="product_cart" value="1525886"/>
												<button type="submit" class="item-add-to-cart btn btn-primary btn-md btn-block">添加收藏</button>
											</form>
											<div class="item-info clearfix">
												<ul>
													<li><span><i class="sb-icon-cart sb-color-success"></i><span class="hidden-sm"> 下载次数</span></span>0</li>
													<li class="item-favorites"><span><i class="sb-icon-heart"></i><span class="hidden-sm"> 收藏次数</span></span><span class="favorites-count">0</span></li>
												</ul>
											</div>
											<div class="item-seller">
												<div class="media">
													<div class="pull-left">
														<div class="avatar">
															<a href="<?php echo get_author_link(); ?>" title="作者：<?php the_author(); ?>">
																<?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
															</a>
														</div>
													</div>
													<div class="media-body">
														<h4 class="media-heading"><?php the_author_link(); ?></h4>
														<p><small>注册时间: <?php echo get_the_author_meta( 'user_registered'); ?></small></p>
														<div class="clearfix">
															<a class="btn btn-warning btn-sm" href="<?php echo get_author_link(); ?>"
																data-toggle="tooltip" data-placement="top" data-html="true"
																title="查看作者 <strong><?php the_author(); ?></strong> 的信息">查看</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="box">
											<h3 class="box-title clearfix">Item Information</h3>
											<ul class="unstyled">
												<li><strong>Released</strong>: 13 July 2016</li>
												<li><strong>Version</strong>: 1.0</li>
												<li><strong>Category</strong>: <a href="/items/html-templates/landing-pages">Landing Pages</a></li>
												<li><strong>Layout</strong>: Responsive</li>
												<li><strong>Retina Ready</strong>: Yes</li>
												<li><strong>Browser</strong>: IE10, IE11, Firefox, Safari, Opera, Chrome, Edge</li>
												<li><strong>Bootstrap</strong>: Bootstrap 3.x</li>
												<li><strong>Tags</strong>:
													<a class="product-tag" href="/items/tag/agency">agency</a>,
													<a class="product-tag" href="/items/tag/app"> app</a>,
													<a class="product-tag" href="/items/tag/bootstrap"> bootstrap</a>,
													<a class="product-tag" href="/items/tag/business"> business</a>,
													<a class="product-tag" href="/items/tag/hosting"> hosting</a>,
													<a class="product-tag" href="/items/tag/landing-page"> landing page</a>,
													<a class="product-tag" href="/items/tag/multipurpose"> multipurpose</a>,
													<a class="product-tag" href="/items/tag/one-page"> one page</a>,
													<a class="product-tag" href="/items/tag/portfolio"> portfolio</a>,
													<a class="product-tag" href="/items/tag/psd-included"> psd included</a>,
													<a class="product-tag" href="/items/tag/rtl"> rtl</a>,
													<a class="product-tag" href="/items/tag/software"> software</a>,
													<a class="product-tag" href="/items/tag/technology"> technology</a>
												</li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
