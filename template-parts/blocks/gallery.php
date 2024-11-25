<link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">

<section class="gallery">
    <div class="gallery_block content">
        <div class="gallery_content">
            <?php if( get_sub_field('title') ): ?>
               <div class="special_gift_title">
                  <?php the_sub_field('title'); ?>
               </div>
            <?php endif; ?>
            <?php
            $images = get_sub_field('gallery');
            if ($images): ?>
                <div id="lightgallery" class="gallery-container ">
                    <?php foreach ($images as $image): ?>
                        <a data-lg-size="1000-1000" class="gallery-item img-responsive" data-src="<?php echo esc_url($image['url']); ?>">
                            <img src="<?php echo esc_url($image['url']); ?>"/>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $("#lightgallery").lightGallery({
            pager: true,
            animateThumb: false,
            zoomFromOrigin: false,
            allowMediaOverlap: true,
            toggleThumb: true,
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/js/lightgallery-all.min.js"></script>