<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portavue
 */

?>
<footer id="footer" class="footer">

<div class="container">
  <div class="copyright text-center ">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">Portavue</strong> <span>All Rights Reserved</span></p>
  </div>
  <div class="social-links d-flex justify-content-center">
    <?php 
      $linkedin = get_theme_mod( 'linkedin' );
      $whatsapp = get_theme_mod( 'whatsapp' );
      $msteams = get_theme_mod( 'msteams' );
      $upwork = get_theme_mod( 'upwork' );
      $facebook = get_theme_mod( 'facebook' );
      $twitter = get_theme_mod( 'twitter' );
      $instagram = get_theme_mod( 'instagram' );

      if ( $linkedin ) {
        echo '<a href="'.$linkedin.'"><i class="bi bi-linkedin"></i></a>';
      }
      if ( $whatsapp ) {
        echo '<a href="'.$whatsapp.'"><i class="bi bi-whatsapp fs-5"></i></a>';
      }
      if ( $msteams ) {
        echo '<a href="'.$msteams.'"><i class="bi bi-microsoft-teams fs-5"></i></a>';
      }
      if ( $upwork ) {
        echo '<a href="'.$upwork.'"><i class="fa-brands fa-square-upwork fa-lg"></i></a>';
      }
      if ( $facebook ) {
        echo '<a href="'.$facebook.'"><i class="bi bi-facebook"></i></a>';
      }
      if ( $twitter ) {
        echo '<a href="'.$twitter.'"><i class="bi bi-twitter-x"></i></a>';
      }
      if ( $instagram ) {
        echo '<a href="'.$instagram.'"><i class="bi bi-instagram"></i></a>';
      }
    ?>
  </div>
  <div class="credits">
    Developed by <a href="https://sandalia.com.bd/apps">Sandalia Apps</a>
  </div>
</div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php wp_footer(); ?>
</body>

</html>