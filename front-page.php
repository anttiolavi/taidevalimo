<?php
/**
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="front-page-mobile-nav-graphic padding-large padding-keep-sides">
      <i class="logopuu">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/img/logopuu_v5.svg"); ?>
      </i>
    </div>

  <?php
    wp_nav_menu(array(
      'menu' => 'etusivun-valikko',
      'menu_class' => 'frontpage-mobile-menu padding-large padding-clear-bottom',
      'container_class' => 'frontpage-mobile-menu-container'
    ));
  ?>

  <div class="frontpage-mobile__scroll-motivation">
    <i class="icon-arrow-down material-icons">expand_more</i>
  </div>

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
