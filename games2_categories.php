<?php
// Add Categories section

function my_taxonomies_game2()
{
    $labels = array(
        'name' => _x('Games2 Categories', 'taxonomy general name'),
        'singular_name' => _x('Games2 Category', 'taxonomy singular name'),
        'search_items' => __('Search Games2 Categories'),
        'all_items' => __('All Games2 Categories'),
        'parent_item' => __('Parent Games2 Category'),
        'parent_item_colon' => __('Parent Games2 Category:'),
        'edit_item' => __('Edit Games2 Category'),
        'update_item' => __('Update Games2 Category'),
        'add_new_item' => __('Add New Games2 Category'),
        'new_item_name' => __('New Games2 Category'),
        'menu_name' => __('Games2 Categories'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('games2_categories', 'game2', $args);
}
add_action('init', 'my_taxonomies_game2');
