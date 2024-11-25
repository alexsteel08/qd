<section class="feautures">
    <div class="feautures_block wrapper">
        <div class="feautures_content">
            <div class="feautures_image">
                <div class="feautures_hello">Привіт,<br> Я - Аліна!</div>
                <?php
                $image = get_sub_field('image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="feautures_text_block">
                <?php if( get_sub_field('title') ): ?>
                   <div class="feautures_title">
                      <?php the_sub_field('title'); ?>
                   </div>
                <?php endif; ?>

                <?php if( get_sub_field('text') ): ?>
                   <div class="feautures_text">
                      <?php the_sub_field('text'); ?>
                   </div>
                <?php endif; ?>

                <?php if( have_rows('list') ): ?>
                    <div class="feautures_list">
                        <?php while( have_rows('list') ): the_row();  $image = get_sub_field('image'); ?>
                            <div class="feautures_item">
                                <img src="<?php echo $image; ?>" alt="img">
                                <span><?php the_sub_field('text'); ?></span>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>