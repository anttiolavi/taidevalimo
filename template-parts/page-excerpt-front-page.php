 <?php
/**
 * Template part for page excrpts on front page
 *
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

?>

<?php
  $the_ID = get_the_ID();
  $the_image = wp_get_attachment_url(get_post_thumbnail_id($the_ID));
?>
<article class="front-page-excerpt front-page-excerpt__id-<?php echo $the_ID; ?>">
  <div class="front-page-excerpt__content">
    <div class="front-page-excerpt__images">
      <div class="front-page-excerpt__image padding-large padding-keep-bottom">
        <img src="<?php echo $the_image; ?>" alt="">
      </div>
    </div>
    <div class="front-page-excerpt__copy">
      <h2 class="front-page-excerpt__title padding-large padding-keep-bottom">
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>"></a>
      </h2>
      <a class="front-page-excerpt__link" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
    </div>
  </div>
</article>
