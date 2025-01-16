<?php
/**
 * Template Name: Contact
 */
get_header(); 
?>
<div class="contact-page">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
      <header class="contact-banner padding-tb-100">
          <div class="wrapper">
            <h1 class="contact-title"><?php the_title(); ?></h1>
            <div class="contact-hours"><?php the_content(); ?></div>
            <?php
              $notice = get_field("notice");

              if( $notice ){
            ?>
              <div class="notice"><?php echo $notice; ?></div>
            <?php } ?>
          </div>
      </header>
        
      <section class="contact-content">
        <div class="wrapper">
          <?php
            $rows = get_field("showroom", "option");
            if( $rows ) {
              foreach( $rows as $row ) {
                $title = $row["showroom_title"];
                $address = $row["address"];
                $phone = $row["phone"];
                $hours = $row["hours"];
                $google_maps = $row["google_maps"];
          ?>
            <div class="contact-showroom flexwrap">
              <div class="contact-details">
                <div class="contact-showroom-title"><?php echo $title; ?></div>
                <div class="contact-showroom-address"><?php echo $address; ?></div>
                <div class="contact-showroom-phone">Phone: <?php echo $phone; ?></div>
              </div>
              <div class="contact-gmaps">
                <?php echo $google_maps; ?>
              </div>
            </div>
          <?php
              }
            }

            if ( $map = get_field('googlemap','option') ) { ?>
            <div class="right-col">
              <div class="map">
                <?php echo $map; ?>
                <img src="<?php echo THEMEURI ?>/assets/images/rectangle.png" alt="" aria-hidden="true">
              </div>
            </div>
          <?php } ?>
        </div>

        <?php if( $contact_form = get_field("gravity_form_shortcode") ){ ?>
          <div class="contact-form wrapper">
            <?php echo $contact_form; ?>
          </div>
        <?php } ?>

        <?php
            $facebook = get_field("facebook", "option");
            $instagram = get_field("instagram", "option");
            $pinterest = get_field("pinterest", "option");
  
            if( $facebook || $instagram || $pinterest ){
              echo "<div class='contact-social'>";

              echo "<div class='contact-social-header'>Connect</div>";
  
              if( $facebook ){
                echo "<a href='". $facebook ."' class='facebook' target='_blank'><i class='fa-brands fa-facebook-f'></i> Facebook</a>";
              }
  
              if( $instagram ){
                echo "<a href='". $instagram ."' class='instagram' target='_blank'><i class='fa-brands fa-instagram'></i> Instagram</a>";
              }
  
              if( $pinterest ){
                echo "<a href='". $pinterest ."' class='pinterest' target='_blank'><i class='fa-brands fa-pinterest-p'></i> Pinterest</a>";
              }
  
              echo '</div>';
            }
          ?>

      </section>
		<?php endwhile; ?>
	</main>
</div>
<?php
get_footer();
