<?php

if (!defined('ABSPATH')) {
    exit;
}
get_header(); ?>

<div class="news">
    <div class="news_block">
        <div class="news_content">
            <div class="news_items">
                <?php
                $args = array(
                    'post_type' => 'post',
                );

                $query = new WP_Query($args);

                if (have_posts()) :
                    $count = 0;

                    while (have_posts()) :
                        the_post();
                        $count++;
                        $additional_class = ($count == 1 || $count == 10 || $count == 19) ? 'big' : '';
                        ?>
                        <div class="news_item <?php echo $additional_class; ?>">
                            <?php get_template_part('template-parts/postitem'); ?>
                        </div>
                    <?php
                    endwhile;
                    echo '<div class="pagination">';
                    echo paginate_links(array(
                        'total'   => $query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => '<',
                        'next_text' => '>',
                    ));
                    echo '</div>';
                    wp_reset_postdata();
                else :
                    echo 'Статті не знайдені.';
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
