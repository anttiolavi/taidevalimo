<?php
/**
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

  <?php
    wp_nav_menu(array(
      'menu' => 'etusivun-valikko',
      'menu_class' => 'frontpage-mobile-menu',
      'container_class' => 'frontpage-mobile-menu-container'
    ));
  ?>

  <?php

      $args = array(
        'post__not_in' => array(12),
        'post_type' => 'page',
        'order' => 'ASC'
      );

    $query = new WP_Query($args);
  ?>

  <?php
    while ($query->have_posts()) : $query->the_post();
      get_template_part('template-parts/page-excerpt', 'front-page');
    endwhile;

    wp_reset_query();
  ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
