<section class="special_gift">
    <div class="special_gift_block wrapper">
        <div class="special_gift_content">
            <?php if( get_sub_field('title') ): ?>
               <div class="special_gift_title">
                  <?php the_sub_field('title'); ?>
               </div>
            <?php endif; ?>

            <div class="special_gift_box">
                <div class="special_gift_img">
                    <?php
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>

                <div class="special_gift_descr">
                    <?php if( get_sub_field('text') ): ?>
                       <div class="special_gift_text">
                          <?php the_sub_field('text'); ?>
                       </div>
                    <?php endif; ?>
                    <div class="special_gift_miniumg">
                        <?php
                        $image = get_sub_field('image_second');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="special_gift_button">
                        <?php
                        $link = get_sub_field('button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a ><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>