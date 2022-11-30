<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

    function my_stylized_header_before()
    {

        
        if (!is_shop()) :
            echo '<div class="banner d-flex justify-content-center align-items-center col-12 p-2 text-center"> <a class="banner-text" href="/shop"> Take advantage of our Sales and get free delivery with your order, when you purchase for more than <span class="banner-price"> 500 kr.</span> </a> </div>';
        endif;
    }
    add_action('get_header', 'my_stylized_header_before', 5);

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');


function load_bootstrap()
{
    wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css");
    wp_enqueue_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js", null, null, true);
}
add_action("wp_enqueue_scripts", "load_bootstrap");

function load_page_css()
{
    global $post;
    wp_enqueue_style("page-css", get_stylesheet_directory_uri() . "/css/" . $post->post_name . ".css");
}
add_action("wp_enqueue_scripts", "load_page_css");

// Custom Nav Menu
function my_custom_nav_menu()
{
    register_nav_menu('my_custom_nav_menu', __('My Custom Nav Menu'));
}
add_action('init', 'my_custom_nav_menu');

/**
 * Font Awesome Kit Setup
 * 
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (!function_exists('fa_custom_setup_kit')) {
    function fa_custom_setup_kit($kit_url = '')
    {
        foreach (['wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts'] as $action) {
            add_action(
                $action,
                function () use ($kit_url) {
                    wp_enqueue_script('font-awesome-kit', $kit_url, [], null);
                }
            );
        }
    }
}
fa_custom_setup_kit('https://kit.fontawesome.com/be7adbfbf1.js');

// Custom JS
function custom_main_js()
{
    wp_enqueue_script(
        'custom_main_js',
        get_stylesheet_directory_uri() . '/scripts/main.js',
        array('jquery'),
        false,
        true
    );
    $script_data = array(
        'image_path' => get_stylesheet_directory_uri() . '/images/'
    );
    wp_localize_script(
        'custom_main_js',
        'wpa_data',
        $script_data
    );
}

add_action('wp_enqueue_scripts', 'custom_main_js');

// Hook ,need to find out why it doesnt work

function add_section_before_products()
{
    echo '<section class="section-before-products">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<h2>Our Products</h2>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';

} 
    add_action('woocommerce_before_shop_loop', 'add_section_before_products', 10);

// Hook to add footer
// function add_footer()
// {
//     echo '<footer>';
//     echo '<div class="container">';
//     echo '<div class="row">';
//     echo '<div class="col-md-12">';
//     echo '<h2>Footer</h2>';
//     echo '</div>';
//     echo '</div>';
//     echo '</div>';
//     echo '</footer>';
// }
// add_action('wp_footer', 'add_footer', 10);


function remove_storefront_sidebar()
{
    if (is_checkout() || is_cart() || is_product() || is_account_page() || is_product_category() || is_product_tag()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
    }
}
add_action('get_header', 'remove_storefront_sidebar');
