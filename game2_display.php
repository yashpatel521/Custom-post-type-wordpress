<?php
function posts_shortcode_handler($atts)
{
    ob_start();
    $query = new WP_Query(
        array(
            'post_type' => 'Game2',
            'color' => 'blue',
            'posts_per_page' => 1,
            'order' => 'ASC',
            'orderby' => 'title',
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        )
    );
    if ($query->have_posts()) { ?>
        <?php
        while ($query->have_posts()) : $query->the_post();
            $imgurl = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
            <img src="<?php echo $imgurl; ?>" alt="none" width="400px" height="100px">
            <h1><a href="<?php the_permalink(); ?>" style="text-decoration: underline;color:black"><?php the_title(); ?></a></h1>
            <p>Time Post Created : <?php the_time(); ?></p>
            <p>Author : <?php the_author(); ?></p>
            <p><?php the_excerpt();  ?></p>
        <?php endwhile; ?>
        <div>

            <?
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $query->max_num_pages
            ));
            ?>
        </div>
<?php
        $myvariable = ob_get_clean();
        return $myvariable;
    } else {
        echo "No data found";
    }
}

add_shortcode('game2_display', 'posts_shortcode_handler');
