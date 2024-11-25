<section class="slider">
    <div class="slider_block wrapper">
        <div class="slider_content">
            <?php if( get_sub_field('title') ): ?>
               <div class="slider_title">
                  <?php the_sub_field('title'); ?>
               </div>
            <?php endif; ?>
            <div class="slider_items">
                <div class="swiper slider_image">
                    <div class="swiper-wrapper">
                        <?php if( have_rows('images') ): ?>
                            <?php while( have_rows('images') ): the_row();  $image = get_sub_field('image'); ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>