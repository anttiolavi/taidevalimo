 <?php
/**
 * Template part for displaying yhteys page content
 *
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('article', 'padding-large', 'padding-keep-bottom')); ?>>
  <div class="article-content padding-large padding-keep-sides">
    <?php
      $ingress = get_post_meta( get_the_id(), 'ingress');
      $content = apply_filters('meta_content', get_the_content());
    ?>

    <?php if (!empty($ingress[0])) : ?>
      <h2 class="article-ingress small-margin heading-s"><?php echo $ingress[0]; ?></h2>
    <?php endif; ?>

    <div class="article-text">
      <?php echo do_shortcode($content); ?>
    </div>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
