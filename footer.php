<section id="sp-social-networks">
  <div class="container">
    <div class="row">
      <div id="sp-social" class="col-sm-12 col-md-12">
        <div class="sp-column ">
          <div class="row social-icons">
            <div class="col-sm-6 col-md-3">
              <a class="social-icon" target="_blank" href="https://www.facebook.com/shapebootstrap">
                <i class="fa fa-facebook"></i><span> 9627</span> <small>Likes</small>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <a class="social-icon" target="_blank" href="https://twitter.com/shapebootstrap">
                <i class="fa fa-twitter"></i><span> 2366</span> <small>Followers</small>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <a class="social-icon" target="_blank" href="https://www.pinterest.com/shapebootstrap/">
                <i class="fa fa-pinterest"></i> <span> 31</span> <small>Followers</small>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="social-icon">
                <i class="fa fa-envelope"></i> <span> 178464</span> <small>Subscribers</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="sp-bottom">
  <div class="container">
    <div class="row">
      <div id="sp-bottom1" class="col-sm-6 col-md-2">
        <div class="sp-column ">
          <div class="sp-module _menu">
            <h3 class="sp-module-title">Knowledgebase</h3>
            <div class="sp-module-content">
              <ul class="nav menu">
                <li class="item-114"><a href="https://shapebootstrap.net/copyright">Copyright</a></li>
                <li class="item-116"><a href="https://shapebootstrap.net/buyers-faq">Buyers Faq</a></li>
                <li class="item-117"><a href="https://shapebootstrap.net/sellers-faq">Sellers Faq</a></li>
                <li class="item-115"><a href="https://shapebootstrap.net/submission-guidelines">Submission Guidelines</a></li>
                <li class="item-148"><a href="https://shapebootstrap.net/payout-terms">Seller Payout Terms</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="sp-bottom2" class="col-sm-6 col-md-2">
        <div class="sp-column ">
          <div class="sp-module _menu">
            <h3 class="sp-module-title">Support</h3>
            <div class="sp-module-content">
              <ul class="nav menu">
                <li class="item-119"><a href="https://shapebootstrap.net/forum">Community Forum</a></li>
                <li class="item-128"><a href="https://shapebootstrap.net/licenses">Licenses</a></li>
                <li class="item-112"><a href="https://shapebootstrap.net/terms-conditions">Terms &amp; Conditions</a></li>
                <li class="item-113"><a href="https://shapebootstrap.net/privacy-policy">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="sp-bottom3" class="col-sm-6 col-md-3">
        <div class="sp-column ">
          <div class="sp-module ">
            <h3 class="sp-module-title">Connect</h3>
            <div class="sp-module-content">
              <ul class="nav menu">
                <li class="item-157"><a href="https://shapebootstrap.net/about">About</a></li>
                <li class="item-154"><a href="https://shapebootstrap.net/start-selling">Start Selling</a></li>
                <li class="item-153"><a href="https://shapebootstrap.net/kb">Knowledgebase</a></li>
                <li class="item-118"><a href="https://shapebootstrap.net/blog">Blog</a></li>
                <li class="item-131"><a href="https://shapebootstrap.net/affiliates">Affiliates</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="sp-bottom4" class="col-sm-5 col-md-5">
        <div class="sp-column ">
          <div class="sp-module ">
            <h3 class="sp-module-title">Newsletter</h3>
            <div class="sp-module-content">
              <div class="sendy subscribe" id="sendy-95">
                <div class="intro">
                  Want more Bootstrap themes &amp; templates? Subscribe to our mailing list to receive an update when new items arrive!
                </div>
                <form id="sendy-subscribe-95">
                  <div class="form-group">
                    <div class="input-group">
                      <input name="email" class="form-control" placeholder="Email Address" type="email">
                      <div class="input-group-addon">
                        <button type="submit" name="Sign up" class="btn btn-success btn-block">Subscribe</button>
                      </div>
                    </div>
                  </div>
                  <input name="mid" value="95" type="hidden">
                </form>
              </div>

              <script>
                  jQuery('form[id="sendy-subscribe-95"]').submit(function (form)
                  {
                      var formId = '#' + form.target.id;
                      var email = jQuery(formId + ' input[name=email]').val();
                      var url = 'email=' + email + '&c01194e6b18b71f9acd52ba26d113563=1&mid=95';
                      jQuery("#sendy-95").fadeOut('500');
                      jQuery.ajax({
                          url: 'https://shapebootstrap.net/modules/mod_sendy/ajax/subscribe.php',
                          data: url,
                          type: "POST",
                          dataType: 'text json',
                          success: function (ret)
                          {
                              if (ret.success == true)
                              {
                                  jQuery("#sendy-95").html(ret.html).fadeIn('1000');
                              }
                              else
                              {
                                  jQuery("#sendy-95").html("There was an error processing your subscription.").fadeIn('1000');
                              }
                          }
                      });
                      return false; // Don't actually submit the form
                  });
              </script>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer id="sp-footer">
  <div class="container">
    <div class="row">
      <div id="sp-footer1" class="col-sm-6 col-md-6">
        <div class="sp-column ">
          <span class="sp-copyright"> © 2016 ShapeBootstrap. Some Rights Reserved. A <a target="_blank" href="http://www.joomshaper.com/">JoomShaper</a> Family.</span>
        </div>
      </div>
      <div id="sp-footer2" class="col-sm-6 col-md-6">
        <div class="sp-column ">
          <div class="sp-module ">
            <div class="sp-module-content">
              <div class="custom">
                <div class="text-right">
                  <img class="img-responsive" style="display: inline-block;" src="Premium%20Bootstrap%20Templates%20&amp;%20Themes%20_%20ShapeBootstrap_files/payment-methods.png" alt="Payment Methods">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="offcanvas-menu">
  <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
  <div class="offcanvas-inner">
    <div class="sp-module ">
      <h3 class="sp-module-title">ShapeBootstrap</h3>
      <div class="sp-module-content">
        <ul class="nav menu">
          <li class="item-101"><a href="https://shapebootstrap.net/">Home</a></li>
          <li class="item-105 current active deeper parent">
            <a href="https://shapebootstrap.net/items">All Items</a>
            <span class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-105" aria-expanded="false" aria-controls="collapse-menu-105"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
            <ul class="collapse" id="collapse-menu-105">
              <li class="item-155 deeper parent">
                <a href="https://shapebootstrap.net/items/html-templates">HTML</a>
                <span class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-155" aria-expanded="false" aria-controls="collapse-menu-155"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                <ul class="collapse" id="collapse-menu-155">
                  <li class="item-159"><a href="https://shapebootstrap.net/items/html-templates/admin-templates">Admin Templates</a></li>
                  <li class="item-163"><a href="https://shapebootstrap.net/items/html-templates/blog-magazine-news">Blog / Magazine / News</a></li>
                  <li class="item-162"><a href="https://shapebootstrap.net/items/html-templates/creative">Creative</a></li>
                  <li class="item-158"><a href="https://shapebootstrap.net/items/html-templates/corporate-business">Corporate Business</a></li>
                  <li class="item-161"><a href="https://shapebootstrap.net/items/html-templates/coming-soon">Coming Soon</a></li>
                  <li class="item-165"><a href="https://shapebootstrap.net/items/html-templates/ecommerce">eCommerce</a></li>
                  <li class="item-166"><a href="https://shapebootstrap.net/items/html-templates/entertainment">Entertainment</a></li>
                  <li class="item-160"><a href="https://shapebootstrap.net/items/html-templates/landing-pages">Landing Pages</a></li>
                  <li class="item-164"><a href="https://shapebootstrap.net/items/html-templates/wedding">Wedding</a></li>
                  <li class="item-156"><a href="https://shapebootstrap.net/items/html-templates/miscellaneous">Miscellaneous</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="item-111"><a href="https://shapebootstrap.net/popular">Popular</a></li>
          <li class="item-106"><a href="https://shapebootstrap.net/free-templates">Free Templates</a></li>
          <li class="item-125 deeper parent">
            <a href="#">Help</a>
            <span class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-125" role="button" aria-expanded="false" aria-controls="collapse-menu-125"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
            <ul class="collapse" id="collapse-menu-125">
              <li class="item-169"><a href="https://shapebootstrap.net/kb">Knowledgebase</a></li>
              <li class="item-126"><a href="https://shapebootstrap.net/forum">Community Forum</a></li>
              <li class="item-170"><a href="https://shapebootstrap.net/about">About Us</a></li>
              <li class="item-123"><a href="https://shapebootstrap.net/help/contact">Contact Us</a></li>
              <li class="item-129"><a href="https://shapebootstrap.net/licenses">Licenses</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="offcanvas-overlay"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>
