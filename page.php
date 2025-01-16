<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
get_header();
?>

<div id="primary" class="content-default">
  <main id="main" class="site-main content-default-banner">
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="wrapper flexwrap">
          <div class="content-default-title">
            <h1><?php the_title(); ?></h1>
          </div>
        </div><!-- wrapper -->
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <div class="content-default-banner-image-wrap">
            <div class="content-default-banner-image">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
            </div>
          </div>
        <?php endif; ?>
		<?php endwhile; ?>
	</main>
	<section class="wrapper padding-tb-100">
		<?php while ( have_posts() ) : the_post(); ?>
		  
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
