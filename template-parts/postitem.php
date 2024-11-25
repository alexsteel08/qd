<div class="news_card">
    <div class="news_card_img">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
             alt="<?php the_title(); ?>"/>
        </a>
    </div>
    <div class="news_card_wrapper">
        <a href="<?php the_permalink(); ?>">
            <div class="news_card_title"><?php the_title(); ?></div>
        </a>
        <div class="news_card_excerpt"><p><?php the_excerpt(); ?></p></div>
        <div class="news_card_readtime">8 min read</div>
        <div class="news_card_footer">
            <a href="<?php the_permalink(); ?>">
                <?php _e('Read full article', 'tattos'); ?>
                <svg width="39" height="13" viewBox="0 0 39 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 6.5H38" stroke="#F44335"/>
                    <path d="M30.667 1L38.0003 6.5" stroke="#F44335"/>
                    <path d="M38 6.5L30.6667 12" stroke="#F44335"/>
                </svg>
            </a>
        </div>
    </div>
</div>