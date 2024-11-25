<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}



global $post;
$post_id = $post->ID;
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>






    <div class="product_image">
        <img src="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>" alt="<?php the_title(); ?>">
    </div>
	<div class="summary entry-summary">
        <div class="product_details">
            <div class="product_details_image">
                <?php
                global $product;

                // Отримуємо всі ID зображень з галереї товару
                $gallery_image_ids = $product->get_gallery_image_ids();

                // Перевіряємо, чи є зображення в галереї
                if ( ! empty( $gallery_image_ids ) ) {
                    // Виводимо перше зображення з галереї
                    echo wp_get_attachment_image( $gallery_image_ids[0], 'full' );
                } else {
                    echo '<p>Галерея відсутня.</p>';
                }
                ?>


            </div>
            <div class="product_details_char">
                Характеристики
            </div>
            <div class="product_details_title">
                <?php the_title(); ?>
            </div>
            <div class="product_details_subtitle">
                оригінальний дізайн Q&D©
            </div>
            <?php
            global $product;
            ?>

            <div class="product_details_prices">
                <div class="product_details_regular">
                    <?php if ( $product->get_regular_price() ) : ?>
                        <?php echo wc_price( $product->get_regular_price() ); ?>
                    <?php endif; ?>
                </div>
                <div class="product_details_sale">
                    <?php if ( $product->is_on_sale() && $product->get_sale_price() ) : ?>
                        <?php echo wc_price( $product->get_sale_price() ); ?>
                    <?php endif; ?>
                </div>

            </div>

            <div class="product_details_char_table">
                <div class="product_details_char_left">
                    <div class="product_details_sku"></div>
                    <div class="product_details_tags"></div>
                </div>
                <div class="product_details_char_right">
                    <div class="product_details_sku_tag">
                        <div class="product_details_sku">
                            <?php
                            global $product;

                            // Отримуємо артикул товару (SKU)
                            $sku = $product->get_sku();

                            if ( $sku ) {
                                echo '<p>Артикул: ' . esc_html( $sku ) . '</p>';
                            } else {
//                                echo '<p>Артикул не вказано.</p>';
                            }
                            ?>

                        </div>
                        <div class="product_details_tag">
                            <?php
                            global $product;

                            // Отримуємо теги продукту (таксономія 'product_tag')
                            $product_tags = get_the_terms( $product->get_id(), 'product_tag' );

                            // Перевіряємо, чи є теги у продукту
                            if ( ! empty( $product_tags ) && ! is_wp_error( $product_tags ) ) {
                                echo "Тематика:";
                                echo '<ul class="product_tags_list">';

                                // Виводимо кожен тег у списку
                                foreach ( $product_tags as $tag ) {
                                    $tag_link = get_term_link( $tag ); // Отримуємо посилання на тег
                                    echo '<li>' . esc_html( $tag->name ) . '</li>';
                                }

                                echo '</ul>';
                            } else {
//                                echo '<p>Теги для цього товару не встановлені.</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="product_details_atr">
                        <?php
                        global $product;

                        // Отримуємо всі атрибути продукту
                        $attributes = $product->get_attributes();

                        if ( ! empty( $attributes ) ) {
                            foreach ( $attributes as $attribute ) {
                                // Перевіряємо, чи є це таксономією (як pa_material)
                                if ( $attribute->is_taxonomy() ) {
                                    $terms = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'names' ) );
                                    $attribute_value = implode( ', ', $terms );
                                } else {
                                    // Якщо атрибут не таксономія, виводимо його значення напряму
                                    $attribute_value = $attribute->get_options()[0];
                                }

                                // Отримуємо назву атрибуту (чисту назву без "pa_")
                                $attribute_label = wc_attribute_label( $attribute->get_name() );

                                // Виводимо атрибут у заданому форматі
                                ?>
                                <div class="product_char_items">
                                    <div class="product_char_name"><?php echo esc_html( $attribute_label ); ?>:</div>
                                    <div class="product_char_value"><?php echo esc_html( $attribute_value ); ?></div>
                                </div>
                                <?php
                            }
                        } else {
                            // Якщо атрибутів немає
                            echo '<p>Атрибути не вказані для цього продукту.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="product_bottom_modal">
                <div class="product_bottom_modal_btn">
                    <a href="#" data-modal="modal-size">Розмірна сітка</a>
                </div>
            </div>
        </div>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
