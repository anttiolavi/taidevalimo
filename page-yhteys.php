<?php
/**
 * Template name: Yhteys template
 *
 * @package WordPress
 * @subpackage Taidevalimo
 * @since Taidevalimo 1.0
 */

get_header(); ?>

<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="map-container">
        <div id="map"></div>
      </div>

    <?php
      $query = new WP_Query(
        array(
          'category_name' => $post->post_name
        )
      );

      if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
          get_template_part('template-parts/content', 'page-yhteys');
        endwhile;

        wp_reset_query();
      }
    ?>
      <script type="text/javascript">
        function generateMap() {
          var mapPosition = {
            lat: 60.986,
            lng: 22.485
          }

          var content =
          "<div class='info-window'> " +
            "<strong>Taidevalimo Sinisalo</strong>" +
            "<small>Sydänmaantie 90 Säkylä</small>" +
          "</div>";

          var infoWindow = new google.maps.InfoWindow({
            content: content
          });

          var mapStyle = <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/json/mapStyle.json"); ?>;

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            scrollwheel: false,
            center: mapPosition,
            title: 'Taidevalimo',
            styles: mapStyle
          });

          var marker = new google.maps.Marker({
            position: mapPosition,
            map: map
          });

          marker.addListener('click', function() {
            infoWindow.open(map, marker);
          })
        }
      </script>

    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
