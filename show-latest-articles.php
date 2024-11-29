<?php
/*
Plugin Name: پاپ آپ آخرین مقاله
Description: این افزونه جدیدترین مقاله سایت تان را به صورت یک پاپ آپ پنج ثانیه بعد از لود کامل سایت نمایش می دهد. 
Version: 1.0.0
Author: عبدالرحمان مهدوی
*/

// جلوگیری از دسترسی مستقیم به فایل
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


function lpp_enqueue_scripts() {
    wp_enqueue_style( 'lpp-style', plugin_dir_url( __FILE__ ) . 'style.css' );
    wp_enqueue_script( 'lpp-script', plugin_dir_url( __FILE__ ) . 'script.js', array('jquery'), null, true );
    wp_localize_script( 'lpp-script', 'lppAjax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'lpp_enqueue_scripts' );


function my_latest_post_popup() {
    // دریافت جدیدترین پست
    $args = array('numberposts' => 1, 'post_status' => 'publish');
    $latest_post = wp_get_recent_posts($args)[0];

    // دیتای پست
    $post_title = $latest_post['post_title'];
    $post_link = get_permalink($latest_post['ID']);
    $post_thumbnail = get_the_post_thumbnail($latest_post['ID'], 'medium');

    // خروجی HTML
    ?>
    <div id="latest-post-popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <?php echo $post_thumbnail; ?>
            <h2><a href="<?php echo esc_url($post_link); ?>"><?php echo esc_html($post_title); ?></a></h2>
        </div>
    </div>

   
    <?php
}

add_action('wp_footer', 'my_latest_post_popup');
