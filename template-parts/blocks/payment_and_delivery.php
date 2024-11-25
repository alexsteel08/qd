<section class="payment_and_delivery">
    <div class="payment_and_delivery_block wrapper">
        <div class="payment_and_delivery_content">
            <?php if( get_sub_field('title') ): ?>
               <div class="payment_and_delivery_title">
                  <?php the_sub_field('title'); ?>
               </div>
            <?php endif; ?>
            <?php if( get_sub_field('subtitle') ): ?>
               <div class="payment_and_delivery_subtitle">
                  <?php the_sub_field('subtitle'); ?>
               </div>
            <?php endif; ?>


            <div class="pad_circle">
                <div class="pad_circle_btn">
                    <?php
                    $link = get_sub_field('button');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="#" data-modal="modal-size" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

                <div class="pad_circle_steps">
                    <div class="pad_circle_step_pay">
                        <div class="pad_circle_step_text">
                            оплатіть карткою та<br> отримайте знижку
                        </div>
                        <div class="pad_circle_step_img">
                            <img src="/wp-content/uploads/2024/06/image-removebg-preview-18-1.png" alt="logo">
                        </div>
                    </div>
                    <div class="pad_circle_step_delivery">
                        <div class="pad_circle_step_text">
                            оплатіть на Н.П.<br> при отриманні
                        </div>
                        <div class="pad_circle_step_img">
                            <img src="/wp-content/uploads/2024/06/image-removebg-preview-17-1.png" alt="logo">
                        </div>
                    </div>
                </div>

                <div class="pad_circle_bottom">
                    <img src="/wp-content/uploads/2024/06/6O0A1004_1.jpg" alt="img">
                </div>

            </div>
        </div>
    </div>
</section>