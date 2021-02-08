<?php

/**
 * Plugin Name: Games2 custom plugin
 * Description: This a custom game2 plugin.
 * Author: Yash
 */

// create a custom post type (CTP)  
function my_custom_post_games2()
{
    $labels = array(
        'name'               => _x('Games2', 'post type general name'),
        'singular_name'      => _x('Game2', 'post type singular name'),
        'add_new'            => _x('Add New', 'book'),
        'add_new_item'       => __('Add New Game2'),
        'edit_item'          => __('Edit Game2'),
        'new_item'           => __('New Games2'),
        'all_items'          => __('All Games2'),
        'view_item'          => __('View Game2'),
        'search_items'       => __('Search Games2'),
        'not_found'          => __('No Games2 found'),
        'not_found_in_trash' => __('No Games2 found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Games2'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Games2 and Games2 specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'tag'),
        'has_archive'   => true,
        'rewrite' => array('slug' => 'Games2'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('Game2', $args);
}
add_action('init', 'my_custom_post_games2');


function my_updated_messages($messages)
{
    global $post, $post_ID;
    $messages['Game2'] = array(
        0 => '',
        1 => sprintf(__('Game2 updated. <a href="%s">View Game2</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Game2 field updated.'),
        3 => __('Game2 field deleted.'),
        4 => __('Game2 updated.'),
        5 => isset($_GET['revision']) ? sprintf(__('Game2 restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Game2 published. <a href="%s">View Game2</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Game2 saved.'),
        8 => sprintf(__('Game2 submitted. <a target="_blank" href="%s">Preview Game2</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Game2 scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Game2</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Game2 draft updated. <a target="_blank" href="%s">Preview Game2</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}
add_filter('post_updated_messages', 'my_updated_messages');




define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'game2_display.php'); //Shortcode to display on frontend
// require_once(ROOTDIR . 'games2_metabox.php'); //metabox OR meta fields are here 
require_once(ROOTDIR . 'games2_categories.php'); //taxonomies are here
