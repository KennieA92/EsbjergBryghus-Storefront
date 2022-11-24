<?php get_header() ?>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner d-flex">
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => 'new_product', 'orderby' => 'rand');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            global $product; ?>
            <div style="background: <?php echo the_field("beer_color") ?>" class="carousel-item <?php if ($loop->current_post == 0) echo 'active'; ?> d-flex justify-content-center align-items-center">
                <a href="<?php echo get_permalink() ?>" class="d-block col-12 col-md-4 ">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" class="col-12 slide-image" alt="...">
                </a>
                <div class="carousel-caption">
                    <h5><?php the_title() ?></h5>
                    <p><?php echo $product->get_price_html(); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php $bannerLoop = new WP_Query(array("post_type" => "banner", "posts_per_page" => 1, "order" => 'ASC')) ?>
<?php while ($bannerLoop->have_posts()) : $bannerLoop->the_post() ?>
    <a href="<?php the_field("banner_link") ?>">
        <div class="banner-container col-12 position-sticky" style="background: <?php echo the_field("banner_color") ?>">
            <h1><?php the_field("banner_text") ?></h1>
        </div>
    </a>
<?php endwhile ?>
<div class="site-info-container">
    <div class="site-info">
        <h1><?php the_field("site_info_title") ?></h1>
        <p><?php the_field("site_info_text") ?></p>
    </div>
</div>
<?php get_footer() ?>