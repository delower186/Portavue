<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Portavue
 */

get_header();
?>

<main class="main">

    <!-- Starter Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>404 - Page Not Found</h2>
            <div class="title-shape">
                <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                </svg>
            </div>
            <p class="lead mb-4">
                Oops! We couldn't find the page you're looking for.<br>
                It might have been moved or deleted. 🚫
            </p>

            <!-- CTA Buttons -->
            <div class="cta-b mb-4">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">🏠 Go to Homepage</a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline-secondary">📬 Contact Support</a>
            </div>

            <!-- Image Section -->
            <div class="container d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.jpg" alt="404 Error" class="img-fluid">
                </div>
            </div>

        </div><!-- End Section Title -->

    </section><!-- /Starter Section -->

</main>

<?php
get_footer();