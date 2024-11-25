<section class="text_block">
    <div class="text_block_block wrapper">
        <div class="text_block_content">
            <?php if( get_sub_field('title') ): ?>
                <div class="text_block_title">
                    <?php the_sub_field('title'); ?>
                </div>
            <?php endif; ?>
            <?php if( get_sub_field('text') ): ?>
               <div class="text_block_text">
                  <?php the_sub_field('text'); ?>
               </div>
            <?php endif; ?>
        </div>
    </div>
</section>