<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<div class="single_wrapper">
    <div class="single_block">
        <div class='single_hero'>
            <div class="single_hero_content content">
                <div class="single_hero_wrapper">
                    <div class="single_hero_title">
                        <h1><?php echo the_title();?></h1>
                        <div class="excerpt"><?php the_excerpt();?></div>
                        <div class="read_time">8 min read</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_post_thumbnail">
            <img class="single_post_image"
                 src="<?php echo get_the_post_thumbnail_url(); ?>"
                 alt="<?php the_title(); ?>" />
        </div>
        <div class="single_content">
            <div class="single_post_content">
                <?php the_content();?>
            </div>
        </div>



        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'order' => 'DESC'
        );
        $recent_posts = new WP_Query($args);
        if ($recent_posts->have_posts()) { ?>
            <section class="single_more_news">
                <ul class="latest_news_items">
                    <?php
                    while ($recent_posts->have_posts()) {
                        $recent_posts->the_post(); ?>
                        <li class="latest_news">
                            <a class="latest_news_card " href="<?php get_permalink() ?>">
                                <div class="latest_news_card_img">
                                    <img
                                         src="<?php echo $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                         alt="<?php get_the_title(); ?>"/>
                                </div>
                                <div class='title_post'><?php the_title(); ?></div>
                                <div class="latest_news_readtime">5 min read</div>
                            </a>
                        </li>
                        <?php
                    } ?>
                </ul>
            </section>
            <?php
            wp_reset_postdata();
        } else {
            echo '';
        }
        ?>



    </div>
</div>

<?php get_footer(); ?>
