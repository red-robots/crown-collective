<?php 
get_header(); 
?>
<div id="primary" class="homepage-content">

  <!-- <?php
    $content_1 = get_field("content_1");
    $content_1_img = $content_1["content_1_featured_image"];
    $content_1_title = $content_1["content_1_title"];
    $content_1_description = $content_1["content_1_description"];
    $content_1_button = $content_1["content_1_button"];
    $content_1_button_link = $content_1["content_1_button_link"];

    if( $content_1_title ){
  ?>
    <div class="content-1 padding-tb-200">
      <div class="wrapper flexwrap">
        <div class="content">
          <h2 class="title"><?php echo $content_1_title; ?></h2>
          <div class="description"><?php echo $content_1_description; ?></div>
          <?php if($content_1_button && $content_1_button_link){ ?>
            <a href="<?php echo $content_1_button_link; ?>" class="button btn-green"><?php echo $content_1_button; ?></a>
          <?php } ?>
        </div>
        <?php if( !empty( $content_1_img ) ): ?>
          <div class="feat-img-wrap">
            <div class="feat-img">
              <img src="<?php echo esc_url($content_1_img['url']); ?>" alt="<?php echo esc_attr($content_1_img['alt']); ?>" />
            </div>
          </div>
        <?php endif; ?>
      
      </div>
    </div><!-- content-1 -->
  <?php } ?> -->
  
  <?php
    $sponsor = get_field("sponsor");
    $sponsor_title = $sponsor["sponsor_title"];
    $sponsor_content = $sponsor["sponsor_content"];
    $sponsors = $sponsor["sponsors"];

    if( $sponsor ){
  ?>
    <div class="sponsor padding-tb-150">
      <div class="wrapper">
        <h2 class="sponsor-title"><?php echo $sponsor_title; ?></h2>
        <div class="sponsor-content">
          <?php echo $sponsor_content; ?>
        </div>
        <?php if( $sponsors ) { ?>
          <div class="sponsor-wrapper flexwrap">
            <?php foreach( $sponsors as $brand ) {
                $image = $brand["sponsor_image"];
                $url = $brand["sponsor_link"];
            ?>
              <a class="hexagon" href="<?php echo $url ?? '#' ?>" target="_blank">
                <div class="sponsor-img">
                  <?php if( !empty( $image ) ){ ?>
                    <img src="<?php echo esc_url($image["url"]); ?>" alt="<?php echo esc_attr($image["alt"]); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/image-not-available.jpg" alt="no image" />
                  <?php } ?>
                </div>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div><!-- brands -->
  <?php } ?>

  <!-- <?php
    $cta = get_field("call_to_action");
    $cta_title = $cta["cta_title"];
    $cta_description = $cta["cta_description"];
    $cta_button = $cta["cta_button_title"];
    $cta_button_link = $cta["cta_button_title_link"];

    if( $cta_title ){
  ?>
    <div class="cta">
      <div class="cta-wrapper">
        <h2 class="cta-title"><?php echo $cta_title; ?></h2>
        <div class="cta-description"><?php echo $cta_description; ?></div>
        <?php if($cta_button){ ?>
          <a href="<?php echo $cta_button_link; ?>" class="button btn-white"><?php echo $cta_button; ?></a>
        <?php } ?>
      </div>
    </div><!-- cta -->
  <?php } ?> -->

  <?php
    $pre_footer = get_field("pre_footer");
    $pre_footer_img = $pre_footer["pre_footer_image"];
    $pre_footer_title = $pre_footer["pre_footer_title"];

    if( $pre_footer && !empty( $pre_footer_img ) ){
  ?>
    <div class="pre-footer padding-tb-70" style="background-image:url('<?php echo esc_url($pre_footer_img['url']); ?>');">
      <div class="wrapper flexwrap">
        <div class="content">
          <h2 class="title"><?php echo $pre_footer_title; ?></h2>
        </div>      
      </div>
    </div><!-- pre-footer -->
  <?php } ?>

</div><!-- #primary -->

<?php
get_footer();