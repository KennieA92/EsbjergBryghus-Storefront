<?php get_header() ?>
<section id="carousel-section">
    <div id="event-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner d-flex">
            <?php
            $args = array('post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => 'new_product', 'orderby' => 'rand');
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                global $product; ?>
                <div style="background: <?php echo the_field("beer_color") ?>" class="carousel-item <?php if ($loop->current_post == 0) echo 'active'; ?> d-flex justify-content-center align-items-center">
                    <a href="<?php echo get_permalink() ?>" class="d-block col-12 col-md-6 ">
                        <img src="<?php echo get_field("event_image")["url"] ?>" class="d-block col-12 slide-image" alt="...">
                    </a>
                    <!-- <div class="carousel-caption">
                        <h5><?php the_title() ?></h5>
                        <p><?php echo $product->get_price_html(); ?></p>
                    </div> -->
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#event-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#event-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section id="banner-section">
    <?php $bannerLoop = new WP_Query(array("post_type" => "banner", "posts_per_page" => 1, "order" => 'ASC')) ?>
    <?php while ($bannerLoop->have_posts()) : $bannerLoop->the_post() ?>
        <a href="<?php the_field("banner_link") ?>">
            <div class="banner-container col-12 position-sticky" style="background: <?php echo the_field("banner_color") ?>">
                <p class="m-0"><?php the_field("banner_text") ?></p>
            </div>
        </a>
    <?php endwhile ?>
</section>
<section id="site-info-section">
    <div class="site-info-container my-2 d-flex col-12 flex-wrap justify-content-center align-items-center flex-md-nowrap">
        <?php $siteInfoContainerLoop = new WP_Query(array("post_type" => "site_info_container", "posts_per_page" => -1, "order" => 'ASC')) ?>
        <?php while ($siteInfoContainerLoop->have_posts()) : $siteInfoContainerLoop->the_post() ?>
            <a href="<?php the_field("page_link") ?>" class="flex-md-fill col-12 site-info-item d-flex justify-content-center align-items-center ">
                <div class="site-info-img " style="background: url(<?php echo get_field("page_image")["url"] ?>)">

                </div>
                <h1><?php the_field("page_info") ?></h1>
            </a>
        <?php endwhile ?>
    </div>
</section>
<section id="subscription-section">
    <div id="mc_embed_signup" class="d-flex col-12 p-2 justify-content-center">
        <form action="https://gmail.us14.list-manage.com/subscribe/post?u=e6613a5cf963b9588e538fb6f&amp;id=cafafab6dc&amp;f_id=0003ebe0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="
          validate
          d-flex
          col-10
          p-3
          justify-content-center
          align-items-center
          flex-column
        " target="_blank" novalidate>
            <h1 class="col-12 pt-3">Subscribe for News!</h1>
            <div class="d-flex col-11 align-items-start">
                <img class="subscription-logo col-1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logoroed.png" alt="Esbjerg Bryghus Logo" />
                <div class="
              brand-name
              d-flex
              flex-column
              align-self-center             
              justify-content-center
            ">
                    <p class="mb-0">Esbjerg Bryghus</p>
                </div>
            </div>
            <div class="
            subscription-container
            col-11
            d-flex
            flex-column
            align-items-center
            justify-content-center
          ">
                <div class="col-11 pt-3">
                    <label for="mce-FNAME">First Name</label>
                    <input class="col-12" type="text" name="FNAME" id="mce-FNAME" placeholder="Write your name" />
                </div>
                <div class="col-11 py-4">
                    <label for="mce-EMAIL">Email Address</label>
                    <input class="col-12" type="email" name="EMAIL" id="mce-EMAIL" placeholder="Write your email" />
                </div>
                <div>
                    <input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button" />
                </div>
            </div>
        </form>
    </div>
</section>

<?php get_footer() ?>