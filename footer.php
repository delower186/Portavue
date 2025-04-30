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
      $facebook = get_theme_mod( 'facebook' );
      $linkedin = get_theme_mod( 'linkedin' );
      $github = get_theme_mod( 'github' );
      $instagram = get_theme_mod( 'instagram' );
      $x = get_theme_mod( 'x' );

      if ( $facebook ) {
        echo '<a href="'.$facebook.'"><i class="bi bi-facebook"></i></a>';
      }
      if ( $linkedin ) {
        echo '<a href="'.$linkedin.'"><i class="bi bi-linkedin"></i></a>';
      }
      if ( $github ) {
        echo '<a href="'.$github.'"><i class="bi bi-github"></i></a>';
      }
      if ( $instagram ) {
        echo '<a href="'.$instagram.'"><i class="bi bi-instagram"></i></a>';
      }
      if ( $x ) {
        echo '<a href="'.$x.'"><i class="bi bi-twitter-x"></i></a>';
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