<section class="product">
    <div class="product_block">
        <div class="product_content">
            <div class="product_top">
                <div class="product_top_left">
                    <div class="product_top_left_content">
                        <?php if( get_sub_field('title') ): ?>
                           <div class="product_title">
                              <?php echo wp_kses_post(the_sub_field('title')); ?>
                           </div>
                        <?php endif; ?>
                        <?php if( get_sub_field('description') ): ?>
                            <div class="product_description">
                                <?php echo wp_kses_post(get_sub_field('description')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product_top_left_image">
                        <?php
                        $image_1 = get_sub_field('image_1');
                        if( !empty( $image_1 ) ): ?>
                            <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" />
                        <?php endif; ?>
                        <div class="product_top_btn">
                            <a href="#" data-modal="modal-size">Купити</a>
                        </div>
                    </div>
                </div>
                <div class="product_top_right">
                    <div class="product_main_img">
                        <?php
                        $image_2 = get_sub_field('image_2');
                        if( !empty( $image_2 ) ): ?>
                            <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="product_bottom">
                <div class="product_bottom_left">
                    <div class="product_bottom_img">
                        <?php
                        $image_3 = get_sub_field('image_3');
                        if( !empty( $image_3 ) ): ?>
                            <img src="<?php echo esc_url($image_3['url']); ?>" alt="<?php echo esc_attr($image_3['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="product_bottom_right">
                    <div class="product_bottom_right_img">
                        <div class="product_bottom_right_image">
                            <?php
                            $image_4 = get_sub_field('image_4');
                            if( !empty( $image_4 ) ): ?>
                                <img src="<?php echo esc_url($image_4['url']); ?>" alt="<?php echo esc_attr($image_4['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    // Отримуємо пов'язані товари
                    $products = get_sub_field('product');
                    if( $products ): ?>
                        <?php foreach( $products as $product_id ):
                            // Отримуємо дані про товар
                            $product = wc_get_product( $product_id ); // Отримуємо об'єкт товару WooCommerce
                            $sku = $product->get_sku(); // SKU товару
                            $regular_price = $product->get_regular_price(); // Звичайна ціна
                            $sale_price = $product->get_sale_price(); // Ціна зі знижкою
                            $attributes = $product->get_attributes(); // Атрибути товару
                            // Отримуємо теги продукту
                            $tags = get_the_terms( $product_id, 'product_tag' );
                            ?>

                            <div class="product_bottom_title">Характеристики</div>
                            <div class="product_bottom_subtitle"><?php echo esc_html( $product->get_name() ); ?></div>
                            <div class="product_bottom_text">оригінальний дизайн Q&D©</div>
                            <div class="product_bottom_price">
                                <?php if ( $regular_price ): ?>
                                    <div class="price_regular">₴ <?php echo number_format($regular_price, 2, ',', ' '); ?></div>
                                <?php endif; ?>
                                <?php if ( $sale_price ): ?>
                                    <div class="price_sale">₴ <?php echo number_format($sale_price, 2, ',', ' '); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="product_bottom_char">
                                <div class="product_bottom_char_left">
                                    <div class="product_char_items">
                                        <div class="product_char_name">Артикул:</div>
                                        <div class="product_char_value"><?php echo esc_html( $sku ); ?></div>
                                    </div>
                                    <div class="product_char_items product_char_items_line">
                                        <div class="product_char_name">Тематика:</div>
                                        <div class="product_char_value">
                                            <?php
                                            if ( $tags && ! is_wp_error( $tags ) ):
                                                foreach ( $tags as $tag ) {
                                                    echo esc_html( $tag->name ) . '<br>';
                                                }
                                            else:
                                                echo 'Теги відсутні';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_bottom_char_right">
                                    <?php
                                    if ( $attributes ):
                                        foreach ( $attributes as $attribute_name => $attribute_data ):
                                            $attribute_label = wc_attribute_label( $attribute_name ); // Отримуємо назву атрибуту
                                            $attribute_values = $attribute_data->get_options(); // Отримуємо значення атрибуту
                                            ?>
                                            <div class="product_char_items">
                                                <div class="product_char_name"><?php echo esc_html( $attribute_label ); ?>:</div>
                                                <div class="product_char_value">
                                                    <?php echo esc_html( implode( ', ', $attribute_values ) ); ?>
                                                </div>
                                            </div>
                                        <?php endforeach;
                                    else: ?>
                                        <div class="product_char_items">
                                            <div class="product_char_name">Атрибути:</div>
                                            <div class="product_char_value">Не знайдено атрибутів</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>



                    <div class="product_bottom_modal">
                        <div class="product_bottom_modal_btn">
                            <a href="#" data-modal="modal-size">Розмірна сітка</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_mobile">
    <div class="product_mobile_block">
        <div class="product_mobile_content">
            <div class="product_mobile_title">
                <h1>Q&D - подаруй коханій діаманти</h1>
            </div>
            <div class="product_mobile_img">
                <img src="/wp-content/uploads/2024/05/6O0A1082-2.jpg" alt="">
            </div>
            <div class="product_mobile_bottom_modal">
                <div class="product_top_btn">
                    <a href="#" data-modal="modal-size">Купити</a>
                </div>
            </div>
            <div class="product_mobile_char">
                <div class="product_bottom_title">Характеристики</div>
                <div class="product_bottom_subtitle">Золота каблучка з діамантами</div>
                <div class="product_bottom_text">оригінальний дізайн Q&D©</div>
                <div class="product_bottom_price">
                    <div class="price_regular">₴ 12 200</div>
                    <div class="price_sale">₴ 9 980</div>
                </div>
                <div class=""><img src="/wp-content/uploads/2024/05/6O0A1008-3.jpg" alt=""></div>
                <div class="product_char_list">
                    <div class="product_char_items">
                        <div class="product_char_name">Артикул:</div>
                        <div class="product_char_value">12811</div>
                    </div>
                    <div class="product_char_items product_char_items_line">
                        <div class="product_char_name">Тематика:</div>
                        <div class="product_char_value">подарунок,<br> день народження, <br>ювілей, <br>заручини</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Матеріал:</div>
                        <div class="product_char_value">золото</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Проба:</div>
                        <div class="product_char_value">585</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Вставка:</div>
                        <div class="product_char_value">діаманти</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Форма:</div>
                        <div class="product_char_value">кр57</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Колір/чистота:</div>
                        <div class="product_char_value">3/3А</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Маса:</div>
                        <div class="product_char_value">0,045 ct</div>
                    </div>
                    <div class="product_char_items">
                        <div class="product_char_name">Вага:</div>
                        <div class="product_char_value">2,57</div>
                    </div>

                    <div class="product_bottom_modal_btn">
                        <a href="#" data-modal="modal-size">Розмірна сітка</a>
                    </div>
                </div>

                
                <div class=""><img src="/wp-content/uploads/2024/05/6O0A1092-1.jpg" alt=""></div>
                <div class="product_top_btn product_top_btn_last">
                    <a href="#" data-modal="modal-size">Купити</a>
                </div>
            </div>
        </div>
    </div>
</section>