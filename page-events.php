<?php
/**
 * Template Name: Events
 */
get_header(); ?>
<div id="primary" class="content-area events-page">
	<main id="main" class="site-main events-banner">
		<?php
      while ( have_posts() ) : the_post();

      $page_title = get_the_title(get_the_ID());
      $tag = get_the_content(get_the_ID());

      $arrs = array(
        'posts_per_page'   => 1,
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'orderby'          => 'date',
        'order'            => 'ASC',
        'cat'             => 4
      );
      $main_event = new WP_Query($arrs);

      while ( $main_event->have_posts() ) : $main_event->the_post();
        $event_date = get_field("event_date");
        $start_date = get_field("event_start_time");
        $end_date = get_field("event_end_time");
        $event_location = get_field("event_location");
        $register_link = get_field("resgister_button_link");
      ?>
        <div class="wrapper">
          <div class="flexwrap padding-tb-100">
            <div class="events-banner-content">
              <h1><?php echo $page_title; ?></h1>
              <div class="events-banner-details">
                <div class="tag-container">
                  <div class="tag">
                    <div class="tag-title"><?php echo $tag; ?></div>
                    <div class="tag-tail"></div>
                  </div>
                </div>
                <h3 class="events-title"><?php the_title(); ?></h3>
                <?php if ($event_date && $start_date && $end_date && $event_location) { ?>
                  <div class="events-date"><?php echo $event_date; ?> &nbsp;|&nbsp; <?php echo $start_date .' - '. $end_date; ?> &nbsp;|&nbsp; <?php echo $event_location; ?></div>
                <?php } ?>
                <div class="events-content"><?php the_content(); ?></div>
                <?php if ($register_link) { ?>
                  <a href="<?php echo $register_link; ?>" class="button btn-green">Register</a>
                <?php } ?>
              </div>
            </div>
            <div class="events-banner-image-wrap">
              <div class="events-banner-image">
                <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
              </div>
            </div>
          </div>
        </div><!-- banner -->
      <?php endwhile;  ?>
		<?php endwhile; ?>
	</main>

  <?php  
    $arrs = array(
      'posts_per_page'   => -1,
      'post_type'        => 'post',
      'post_status'      => 'publish',
      'orderby'          => 'date',
      'order'            => 'ASC',
      'cat'             => 1
    );
    $teams = new WP_Query($arrs);

    if ( $teams->have_posts() ) { ?>
    <section class="events-wrapper wrapper padding-tb-150">
      <div class="flexwrap">
        <?php
          while ( $teams->have_posts() ) : $teams->the_post();
            $placeholder = THEMEURI . '/images/image-not-available.jpg';
            $photo = get_the_post_thumbnail( get_the_ID(), 'medium' );

            $event_date = get_field("event_date");
            $start_date = get_field("event_start_time");
            $end_date = get_field("event_end_time");
            $event_location = get_field("event_location");
            $register_link = get_field("resgister_button_link");
          ?>
          <div class="events-item">
            <div class="events-photo">
              <?php if ($photo) { ?>
                <?php echo $photo; ?>
              <?php } else { ?>
                <img src="<?php echo $placeholder; ?>" alt="" aria-hidden="true">
              <?php } ?>
            </div>
            <div class="events-details">
              <div>
                <h3 class="events-title"><?php the_title(); ?></h3>
                <?php if ($event_date) { ?>
                  <div class="events-date"><?php echo $event_date; ?></div>
                <?php } ?>
                <?php if ($start_date && $end_date) { ?>
                  <div class="events-start-end"><?php echo $start_date .' - '. $end_date; ?></div>
                <?php } ?>
                <?php if ($event_location) { ?>
                  <div class="events-location"><?php echo $event_location; ?></div>
                <?php } ?>
                <div class="events-content"><?php the_content(); ?></div>
              </div>
              <?php if ($register_link) { ?>
                <a href="<?php echo $register_link; ?>" class="button btn-green">Register</a>
              <?php } ?>
            </div>
          </div>
        <?php endwhile;  ?>
      </div>
    </section>
  <?php } ?>
</div>
<?php
get_footer();
