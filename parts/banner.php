<?php if( is_front_page() || is_home() ) { ?>
  <?php if( $banners = get_field("banner") ) { ?>
    <div class="banner">
      <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner) { ?>
              <?php 
                $banner_img = $banner['banner_image']; 
                $banner_content = $banner['banner_content'];

                $logo = get_theme_mod( 'custom_logo' );
                $logo_img = wp_get_attachment_image_src( $logo , 'full' );
                $logo_img_url = $logo_img[0];

                if ($banner_img) { 
              ?>
                <div class="swiper-slide">
                  <div class="banner-item" style="background-image:url('<?php echo esc_url($banner_img['url']); ?>');">
                    <!-- <div class="banner-image-wrap">
                      <div class="banner-image">
                        <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                      </div>
                    </div> -->
                    <div class="banner-content">
                      <?php if( $logo_img_url ) { ?>
                        <?php echo '<img src="'. $logo_img_url .'" class="banner-logo" />'; ?>
                      <?php } ?>
                      <h2 class="banner-title"><?php echo $banner_content; ?></h2>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
    </div><!-- banner -->
  <?php } ?>
<?php } ?>