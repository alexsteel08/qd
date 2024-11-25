</main>
<footer class="footer">
    <div class="footer_block">
        <div class="footer_content">
            <div class="footer_left">
                <?php
                $image = get_field('logo_header', 'option');
                if ($image): $url = $image['url'];
                    $title = $image['title']; ?>
                    <a class='header_logo' href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr($title); ?>">
                        <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($title); ?>"/>
                    </a>
                <?php endif; ?>
            </div>
            <div class="footer_center">
                <div class="footer_center_col">
                    <?php if (have_rows('footer_menu', 'option')): ?>
                        <ul>
                            <?php while (have_rows('footer_menu', 'option')): the_row();
                                $link = get_sub_field('link'); ?>
                                <?php
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <li><a class="button" href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer_right">
                <div class="footer_right">
                    <?php if( get_field('phone_text','option') ): ?>
                        <span>
                      <?php the_field('phone_text','option'); ?>
                   </span>
                    <?php endif; ?>
                    <?php if( get_field('header_phone','option') ): ?>
                        <a href="tel:<?php the_field('header_phone','option'); ?>"><?php the_field('header_phone','option'); ?></a>
                    <?php endif; ?>
                </div>
                <?php if( have_rows('social_link', 'option') ): ?>
                    <div class="footer_social">
                        <?php while( have_rows('social_link', 'option') ): the_row();  $image = get_sub_field('logo'); $link = get_sub_field('link');?>
                            <?php
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php
                                    if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>



<div class="modal" id="modal-size">
    <div class="modal-bg modal-exit"></div>
    <div class="modal-container">
        <?php if( have_rows('dimensional_grid','option') ): ?>
            <div class="size_table">
                <div class="size_table_head">
                    <div class="size_table_item">Діаметр каблучки, мм</div>
                    <div class="size_table_item">УКРАЇНА (UA)</div>
                    <div class="size_table_item">ЄВРОПА (EU)</div>
                    <div class="size_table_item">США (USA)</div>
                    <div class="size_table_item">АНГЛІЯ</div>
                    <div class="size_table_item">ФРАНЦІЯ</div>
                    <div class="size_table_item">ЯПОНІЯ</div>
                    <div class="size_table_item">Окружність кола, мм</div>
                </div>
                <?php while( have_rows('dimensional_grid','option') ): the_row();  $link = get_sub_field('link_to_product'); ?>
                    <?php
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <div class="size_table_product">
                                <div class="size_table_item"><?php the_sub_field('size_diametr'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_ua'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_eu'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_usa'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_eng'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_fr'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_jap'); ?></div>
                                <div class="size_table_item"><?php the_sub_field('size_round'); ?></div>
                            </div>
                        </a>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</div>




<?php wp_footer(); ?>
</body>

</html>