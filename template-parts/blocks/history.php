<section class="history">
    <div class="history_block wrapper">
        <div class="history_content">
            <div class="history_img">
                <?php
                $image = get_sub_field('image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="history_decr">
                <?php if( get_sub_field('title') ): ?>
                   <div class="history_title">
                      <?php the_sub_field('title'); ?>
                   </div>
                <?php endif; ?>
                <?php if( get_sub_field('text') ): ?>
                   <div class="history_text">
                      <?php the_sub_field('text'); ?>
                   </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>