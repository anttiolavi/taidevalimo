<?php
/**
 * The template for displaying all pages by default.
 *
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

get_header(); ?>

<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php
      $args = array(
        'category_name' => $post->post_name
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
          get_template_part('template-parts/content', 'page');
        endwhile;

        wp_reset_query();
      }
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
