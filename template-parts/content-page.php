 <?php
/**
 * Template part for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('article', 'padding-large', 'padding-keep-bottom')); ?>>
  <div class="article-content padding-large padding-keep-sides">
    <?php
      $firstParagraphs = get_the_content();
      $meta = get_post_meta(get_the_id());
      $ingress = $meta['ingress'][0];
      $articleImageId = $meta['article_image'][0];
      $imageUrl = wp_get_attachment_url($articleImageId);
      $secondParagraphs = $meta['second_content'][0];
    ?>

    <h2 class="article-ingress heading-s"><?php echo $ingress; ?></h2>
    <div class="article-text">
      <?php echo apply_filters('meta_content', $firstParagraphs); ?>
    </div>

    <?php if (!empty($imageUrl)) : ?>
      <div class="article-image-container padding-large padding-clear-sides">
        <img class="article-image" src="<?php echo $imageUrl; ?>"></img>
      </div>
    <?php endif; ?>

    <div class="article-text">
      <?php echo apply_filters('meta_content', $secondParagraphs); ?>
    </div>
  </div><!-- .article-content -->
</article><!-- #post-## -->
