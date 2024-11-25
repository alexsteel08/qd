<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<div class="search_list">


    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    // Параметри для пошуку постів
    $post_args = array(
        'post_type' => array('post', 'shops'), // Вказуємо типи постів для пошуку
        'posts_per_page' => -1, // Вивести всі пости
        's' => get_search_query() // Пошуковий запит з інпута
    );

    // Запит постів
    $post_query = new WP_Query($post_args);

    // Виведення результатів пошуку постів
    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) :
            $post_query->the_post();
            // Виводимо назву запису, який збігається з пошуковим запитом
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php
        endwhile;
    else :
        ?>
        <p><?php _e('No matching posts found.', 'textdomain'); ?></p>
    <?php
    endif;
    wp_reset_postdata(); // Скидаємо дані запиту постів

    // Параметри для пошуку користувачів
    $user_args = array(
        'search' => '*' . esc_attr(get_search_query()) . '*', // Пошуковий запит з інпута
        'search_columns' => array('user_login', 'user_nicename', 'user_email', 'user_url'), // Колонки для пошуку
        'number' => -1 // Вивести всіх користувачів
    );

    // Запит користувачів
    $users = get_users($user_args);

    // Виведення результатів пошуку користувачів
    if (!empty($users)) :
        foreach ($users as $user) :
            // Виводимо інформацію про користувача
            ?>
            <h2><a href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo $user->display_name; ?></a></h2>
        <?php
        endforeach;
    else :
        ?>
        <p><?php _e('No matching users found.', 'textdomain'); ?></p>
    <?php endif; ?>


</div>

<?php

get_footer(); // Підключаємо футер
?>
