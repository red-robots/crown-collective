	</div><!-- #content -->

	<footer class="footer" role="contentinfo">			
		<div class="wrapper">
      <div class="footer-inner flexwrap">
        <div class="footer-logo">
          <?php
            $footer_img = get_field("footer_logo", "option");

            if( $footer_img ) {
          ?>
            <a href="<?php bloginfo('url'); ?>" class="footer-logo">
              <img src="<?php echo esc_url($footer_img["url"]); ?>" alt="<?php echo esc_attr($footer_img["alt"]); ?>" />
            </a>
          <?php } else { ?>
            <?php the_custom_logo(); ?>
          <?php } ?>
  			</div>

        <div class="footer-newsletter">
          <?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?>
        </div>

        <?php
          $facebook = get_field("facebook", "option");
          $instagram = get_field("instagram", "option");

          if( $facebook || $instagram ){
            echo "<div class='social-media'>";

            if( $facebook ){
              echo "<a href='". $facebook ."' class='facebook' target='_blank'><i class='fa-brands fa-facebook-f'></i></a>";
            }

            if( $instagram ){
              echo "<a href='". $instagram ."' class='instagram' target='_blank'><i class='fa-brands fa-instagram'></i></a>";
            }

            echo '</div>';
          }
        ?>
        
      </div>
    </div>
	</footer><!-- #footer -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
