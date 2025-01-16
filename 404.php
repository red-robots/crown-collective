<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bellaworks
 */

get_header(); ?>
<main id="main" class="site-main page404 custom404 padding-tb-100" role="main">
	<div class="wrapper">
		<div class="small-title">404 ERROR</div>
		<h1 class="page-title"><span>Page Not Found!</span></h1>
	</div>
	<section class="entry-content content404">
      <div class="wrapper">
        <div class="innerText">
          <p>It looks like nothing was found at this location. Maybe try one of the links below.</p>
		  <?php wp_nav_menu( array( 'container_class' => 'sitemap', 'theme_location' => 'primary' ) ); ?>
        </div>
      </div>
    </section>
</main>
<?php
get_footer();
