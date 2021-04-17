<?php

// 絵文字を無効化
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

// wp-block-library-cssを無効化
add_action('wp_enqueue_scripts', 'remove_block_library_style');
 function remove_block_library_style()
 {
     wp_dequeue_style('wp-block-library');
     wp_dequeue_style('wp-block-library-theme');
 }

// DNSプリフェッチ用コードを無効化
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }
    return $hints;
}

//RSSフィードを無効化
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// HTML5でマークアップさせる
add_theme_support('html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));

// Feedのリンクを自動で生成する
add_theme_support('automatic-feed-links');

//アイキャッチ画像を使用する設定
add_theme_support('post-thumbnails');

// wp-jsonを無効化
remove_action('wp_head', 'rest_output_link_wp_head');

// EditURIを無効化
remove_action('wp_head', 'rsd_link');

// wlwmanifestを無効化
remove_action('wp_head', 'wlwmanifest_link');

// generatorを無効化
remove_action('wp_head', 'wp_generator');

// wp-embedを無効化
function register_javascript()
{
    wp_deregister_script('wp-embed');
}
  add_action('wp_enqueue_scripts', 'register_javascript');

// max-image-previewを無効化
remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large' );

// css
function twpp_enqueue_styles()
{
    wp_enqueue_style(
        'bootstrap-style',
        get_template_directory_uri() . '/css/bootstrap.custom.min.css'
    );
    wp_enqueue_style(
        'sub-style',
        get_template_directory_uri() . '/css/style.css',
        array( 'bootstrap-style' )
    );
}
add_action('wp_enqueue_scripts', 'twpp_enqueue_styles');

// js
function twpp_enqueue_scripts() {
  wp_enqueue_script( 
    'jquery-script', 
    get_template_directory_uri() . '/js/lib/jquery-3.6.0.min.js',
    array(),
    false,
    true
  );
  wp_enqueue_script( 
    'bootstrap-script', 
    get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js',
    array( 'jquery-script' ),
    false,
    true
  );
  wp_enqueue_script( 
    'fontawesome-script', 
    get_template_directory_uri() . '/js/lib/fontawesome.all.min.js',
    array( 'bootstrap-script' ),
    false,
    true
  );
  wp_enqueue_script( 
    'custom-script', 
    get_template_directory_uri() . '/js/script.js',
    array( 'fontawesome-script' ),
    false,
    true
  );
}
add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );
