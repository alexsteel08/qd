<section class="guarantees">
    <div class="guarantees_block wrapper">
        <div class="guarantees_content">
            <?php if( get_sub_field('title') ): ?>
               <div class="guarantees_title">
                  <?php the_sub_field('title'); ?>
               </div>
            <?php endif; ?>
            <?php if( get_sub_field('text') ): ?>
                <div class="guarantees_text">
                    <?php the_sub_field('text'); ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('list') ): ?>
                <div class="guarantees_list">
                    <?php while( have_rows('list') ): the_row(); $image = get_sub_field('image'); ?>
                        <div class="guarantees_item">
                            <video width="100%" muted>
                                <source src="<?php the_sub_field('video'); ?>" type="video/mp4">
                            </video>
                            <span><?php the_sub_field('text'); ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <script>

            </script>
        </div>
    </div>
</section>


