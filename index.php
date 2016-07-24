<?php get_header(); ?>

<section id="sp-main-body">
  <div class="container">
    <div class="row">
      <div id="sp-component" class="col-sm-12 col-md-12">
        <div class="sp-column ">
          <div id="system-message-container">
          </div>
          <div id="akeeba-renderjoomla">

            <div class="products-filter clearfix">
              <div class="container">
                <ul id="products-sort">
                  <li class="active"><a data-sort="newest" href="https://shapebootstrap.net/items?sort=newest">Latest</a></li>
                  <li><a data-sort="popular" href="https://shapebootstrap.net/items?sort=popular">Popular</a></li>
                  <li><a data-sort="ratings" href="https://shapebootstrap.net/items?sort=ratings">Top Rated</a></li>
                  <li class="has-child">
                    <a>More +</a>
                    <ul class="dropdown-child">
                      <li><a data-sort="price_low" href="https://shapebootstrap.net/items?sort=price_low">Price Low</a></li>
                      <li><a data-sort="price_high" href="https://shapebootstrap.net/items?sort=price_high">Price High</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="category-filter">
                  Category:
                  <select>
                    <option selected="selected" value="/items">Show All</option>
                    <option value="/items/html-templates/corporate-business" data-catid="16">Corporate &amp; Business</option>
                    <option value="/items/html-templates/admin-templates" data-catid="11">Admin Templates</option>
                    <option value="/items/html-templates/landing-pages" data-catid="10">Landing Pages</option>
                    <option value="/items/html-templates/coming-soon" data-catid="9">Coming Soon</option>
                    <option value="/items/html-templates/creative" data-catid="24">Creative</option>
                    <option value="/items/html-templates/blog-magazine-news" data-catid="29">Blog / Magazine / News</option>
                    <option value="/items/html-templates/wedding" data-catid="25">Wedding</option>
                    <option value="/items/html-templates/ecommerce" data-catid="33">eCommerce</option>
                    <option value="/items/html-templates/miscellaneous" data-catid="26">Miscellaneous</option>
                    <option value="/items/html-templates/entertainment" data-catid="27">Entertainment</option>
                  </select>
                </div>
              </div>
            </div>

            <div id="items-list" data-catid="">
              <div class="preloader">
                <div></div>
              </div>
              <div class="row">

                <?php if (have_posts()) :
                  while (have_posts()) :
                    the_post();
                    ?>

                <div class="col-sm-6 col-md-4">
                  <div class="product-template">
                    <figure>
                      <?php post_thumbnail_image(get_the_ID()); ?>
                      <figcaption>
                        <div class="vertical-middle">
                          <div>
                            <div class="links">
                              <div>
                                <a class="btn btn-success btn-md" target="_blank" href="<?php echo get_demo_link(get_the_ID()); ?>">在线演示</a>
                              </div>
                              <div>
                                <a class="link-item-details btn btn-primary btn-md" href="<?php the_permalink(); ?>">查看详情</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </figcaption>
                    </figure>
                    <div class="item-header">
                      <h3 itemprop="name">
                        <a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
                      </h3>
                      <span class="item-meta">
                          <?php
                            $categories = get_the_category();
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
                        <input name="product_cart" value="1525893" type="hidden">
                        <a class="item-add-to-cart" href="#">
                          <span data-original-title="Click to add to cart" class="product-purchased" data-toggle="tooltip" data-placement="top" title="">
                            <i class="sb-icon-cart"></i> Be the first to buy!
                          </span>
                        </a>
                      </form>
                      <form class="purchase" action="/cart" method="get">
                        <input name="item_id" value="1525893" type="hidden">
                        <button type="submit" class="product-purchase">
                          <span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                            <span class="product-price">
                              <span itemprop="priceCurrency" content="USD">$</span>
                              <span itemprop="price" content="10">10</span>
                            </span>
                            <span class="hidden"><link itemprop="availability" href="http://schema.org/InStock">In stock</span>
                          </span>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>

                <?php
                  endwhile;
                  endif;
                ?>
              </div>
            </div>

            <?php
            deel_paging();
             ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
