<?php

// Creating a meta box

add_action('add_meta_boxes', 'games2_metaboxes');
function games2_metaboxes()
{
    add_meta_box(
        'start_date',
        __('Start Date', 'myplugin_textdomain'),
        'start_date_content',
        'Game2',
        'side',
        'high'
    );
    add_meta_box(
        'end_date',
        __('End Date', 'myplugin_textdomain'),
        'end_date_content',
        'Game2',
        'side',
        'high'
    );
    add_meta_box(
        'rate',
        __('Rating', 'myplugin_textdomain'),
        'rate_content',
        'Game2',
        'side',
        'high'
    );
}

function start_date_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'product_price_box_content_nonce');
    echo '<label for="start_date"></label>';
    echo '<input type="date" id="start_date" name="start_date" placeholder="Start Date" />';
}
function end_date_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'product_price_box_content_nonce');
    echo '<label for="start_date"></label>';
    echo '<input type="date" id="end_date" name="end_date" placeholder="Start Date" />';
}

function rate_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'product_price_box_content_nonce');
    echo '<select style="width:100%" name="game2_rate" id="game2_rate">
            <option value="one">1</option>
            <option value="two">2</option>
            <option value="three">3</option>
            <option value="four">4</option>
            <option value="five">5</option>
          </select>';
}








// If we are in a loop we can get the post ID easily
$price = get_post_meta(get_the_ID(), 'start_date', true);

// To get the price of a random product we will need to know the ID
$price = get_post_meta($product_id, 'start_date', true);
