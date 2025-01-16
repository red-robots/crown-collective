<?php
/**
 * Template Name: Vendors
 */
get_header(); ?>
<div id="primary" class="content-area vendors-page">
	<main id="main" class="site-main vendors-banner">
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="wrapper flexwrap">
          <div class="vendors-banner-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div><!-- wrapper -->
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <div class="vendors-banner-image-wrap">
            <div class="vendors-banner-image">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            </div>
          </div>
        <?php endif; ?>
		<?php endwhile; ?>
	</main>

  <?php  
    $vendors_initials = array();
    $vendors_array = array();
    $arrs = array(
      'posts_per_page'   => -1,
      'post_type'        => 'vendor',
      'post_status'      => 'publish',
      'orderby'          => 'post_title',
      'order'            => 'ASC'
    );
    $vendors = get_posts($arrs);

    $vendors_cat = array();

    foreach($vendors as $vendor) {
      $i = strtoupper( substr( $vendor->post_title, 0, 1 ) );
      if(empty($vendors_array[$i])) {
        $vendors_initials[] = $i;
        $vendors_array[$i] = array();
      }
      $vendors_array[$i][] = $vendor;
    }

    if(count($vendors_initials)):
  ?>
    <section id="top" class="vendors-wrapper wrapper padding-tb-150">
      <div class="vendors-anchor flexwrap">
        <?php
          foreach( range( 'A', 'Z' ) as $letter ) {
            if(in_array($letter, $vendors_initials)) {
              echo '<a href="#'. $letter .'" class="letter"><span>' . $letter . '</span></a>';
            } else {
              echo '<span>' . $letter . '</span>';
            }
          }
        ?>
      </div>
      <div class="vendors-container">
        <div class="vendors-listing">
          <?php foreach($vendors_array as $letter => $vendors): ?>
            <div class="vendors-lists">
              <div class="vendors-letter">
                <h4 id="<?=$letter?>" class="letter"><?=$letter?></h4>
              </div>
              <div class="flexwrap">
                <?php
                  foreach($vendors as $vendor):

                  $cats_array = array();
                  $cats_slugs_array = array();
                  $cats = wp_get_object_terms($vendor->ID, 'vendor-category');

                  foreach($cats as $cat){
                    $cats_array[] = $cat->name;
                    $cats_slugs_array[] = $cat->slug;

                    if( empty($vendors_cat[$cat->slug]) ){
                      $vendors_cat[$cat->slug] = $cat;
                    }
                  }
                ?>
                  <a href="<?=$vendor->website?>" class="vendors-item <?=implode(' ', $cats_slugs_array)?>" target="_blank">
                    <h3 class="vendors-title"><?=$vendor->post_title?></h3>
                    <div class="vendors-cat">#<?=implode(', ', $cats_array)?></div>
                    <i class="fa-solid fa-circle-chevron-right"></i>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="vendors-filter">
          <div class="by-category">By Category</div>
          <label>All
            <input checked type="radio" name="radio" class="category-filter" data-target="all">
            <span class="checkmark"></span>
          </label>
          <?php
            ksort($vendors_cat);
            foreach( $vendors_cat as $cat):
          ?>
          <label><?=$cat->name?>
            <input type="radio" name="radio" class="category-filter" data-target="<?=$cat->slug?>">
            <span class="checkmark"></span>
          </label>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <a href="#top" class="scroll-top"><i class="fa-solid fa-circle-chevron-up"></i></a>
  <?php
    endif;
  ?>
</div>

<?php
get_footer();
