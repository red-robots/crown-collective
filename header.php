<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/select2.min.css">
<meta name="facebook-domain-verification" content="vcbl42j06vfl4vocp07qka3fcdtyir" />
<?php if ( is_singular(array('post')) ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->


<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo get_the_title(); ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script src="https://kit.fontawesome.com/df142d44cc.js" crossorigin="anonymous"></script>
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script> 
<script>
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page" class="site cf">
	<!-- <a class="skip-link sr" href="#content"><?php //esc_html_e( 'Skip to content', 'bellaworks' ); ?></a> -->

	<header id="masthead" class="site-header" role="banner">
        <div id="site-navigation" class="site-nav flexwrap">
            <?php if ( has_nav_menu( 'mobile' ) ){ ?>
                <span class="mobile-menu" id="mobile-menu-toggle"><span class="bar"></span><i>Menu</i></span>
                <nav id="navigation" class="mobile-menu mobile-navigation animated fadeIn" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'container'=>false, 'menu_id' => 'mobile-menu') ); ?>
                </nav>
                <span id="closeMobileNav"></span>
            <?php } ?>

            <?php wp_nav_menu( array( 'theme_location' => 'left', 'container'=>false, 'menu_id' => 'menu-left', 'container_class' => 'menu-left menu-desktop') ); ?>

            <div id="site-logo">
                <a href="<?php echo get_home_url(); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90.913" height="90.938" viewBox="0 0 90.913 90.938"><g transform="translate(-662.438 -40.761)"><path d="M732.653,61.447c.323-1.965.6-3.792.954-5.6.05-.255.489-.55.794-.617,1.8-.4,3.624-.735,5.584-1.121-.248,1.307-.483,2.544-.72,3.781-.011.058-.039.113-.051.172-.538,2.454-.538,2.45-3,2.822-1.144.173-2.286.363-3.559.566"/><path d="M672.825,86.249l-5.014,3.58-5.373-3.563c.5-.348.915-.651,1.345-.938q1.375-.92,2.76-1.827c1.274-.834,1.279-.836,2.549.067,1.207.859,2.408,1.729,3.733,2.681"/><path d="M739.842,118.332c-1.808-.355-3.62-.727-5.439-1.061-.59-.108-.8-.369-.883-.988-.224-1.712-.562-3.41-.88-5.255,1.332.21,2.583.39,3.828.609.755.133,1.713.1,2.187.557.445.427.381,1.391.529,2.121q.391,1.929.762,3.862c.007.039-.06.092-.1.155"/><path d="M721.294,118.593l5.241,3.26-1.256,6.34c-1.773-1.183-3.458-2.3-5.126-3.44a.6.6,0,0,1-.18-.515c.41-1.825.848-3.645,1.321-5.645"/><path d="M690.472,44.226c1.764,1.176,3.425,2.269,5.061,3.4a.788.788,0,0,1,.213.673c-.395,1.8-.829,3.585-1.284,5.517-1.173-.723-2.279-1.4-3.381-2.084-1.881-1.168-1.873-1.169-1.42-3.367.274-1.332.524-2.668.811-4.137"/><path d="M743.536,67.562l6.343,1.254c-.963,1.445-1.861,2.8-2.762,4.143-.823,1.229-.825,1.228-2.3.894-1.452-.329-2.9-.661-4.548-1.035,1.106-1.78,2.163-3.481,3.265-5.256"/><path d="M707.857,40.761c1.186,1.783,2.268,3.4,3.326,5.025a.712.712,0,0,1,.064.625c-1.087,1.564-2.206,3.1-3.393,4.759l-3.587-5.015,3.59-5.394"/><path d="M707.919,121.351l3.545,4.961L707.88,131.7c-.872-1.3-1.679-2.5-2.48-3.7-1.119-1.681-1.116-1.682.086-3.36q1.094-1.525,2.185-3.055a2.707,2.707,0,0,1,.248-.23"/><path d="M726.542,50.567,721.3,53.829c-.472-1.988-.926-3.855-1.339-5.73-.032-.147.183-.414.349-.528,1.6-1.095,3.211-2.169,4.961-3.344l1.271,6.34"/><path d="M740.294,99.635c1.927-.447,3.693-.867,5.467-1.256.219-.047.6-.007.7.134,1.153,1.662,2.268,3.351,3.455,5.127-2.052.4-3.979.776-5.914,1.12a.774.774,0,0,1-.648-.249c-1.016-1.574-1.995-3.171-3.055-4.876"/><path d="M694.459,118.621c.459,1.947.894,3.735,1.289,5.531a.792.792,0,0,1-.21.676c-1.639,1.128-3.3,2.218-5.071,3.392-.4-2.075-.791-4.022-1.146-5.975a.683.683,0,0,1,.247-.562c1.577-1.011,3.172-1.992,4.891-3.062"/><path d="M665.877,68.841c2.068-.4,3.965-.781,5.867-1.133.192-.035.522.015.6.144,1.044,1.617,2.054,3.256,3.127,4.976-1.965.468-3.778.91-5.6,1.318a.709.709,0,0,1-.6-.223c-1.125-1.642-2.22-3.305-3.4-5.082"/><path d="M675.481,99.635c-1.078,1.73-2.073,3.348-3.1,4.944a.7.7,0,0,1-.589.187c-1.93-.355-3.854-.739-5.914-1.142,1.178-1.766,2.287-3.451,3.434-5.109a.819.819,0,0,1,.694-.16c1.771.393,3.534.821,5.476,1.28"/><path d="M683.073,61.437c-1.974-.32-3.826-.607-5.67-.938a.783.783,0,0,1-.473-.514c-.418-1.915-.8-3.839-1.219-5.9,2.044.411,3.965.784,5.876,1.2a.861.861,0,0,1,.546.548c.334,1.816.618,3.641.94,5.6"/><path d="M753.351,86.245l-5.392,3.585-5.025-3.584c1.665-1.191,3.227-2.318,4.807-3.418a.628.628,0,0,1,.549.062c1.643,1.073,3.272,2.165,5.061,3.355"/><path d="M683.072,111.031c-.325,1.985-.618,3.838-.947,5.684a.7.7,0,0,1-.446.444c-1.942.42-3.891.805-5.968,1.226.42-2.06.8-3.983,1.218-5.9a.784.784,0,0,1,.47-.518c1.845-.331,3.7-.619,5.673-.939"/></g></svg>
                </a>
            </div>
            
            <?php wp_nav_menu( array( 'theme_location' => 'right', 'container'=>false, 'menu_id' => 'menu-right', 'container_class' => 'menu-right menu-desktop') ); ?>
        </div>
	</header><!-- #masthead -->

  <?php get_template_part('parts/banner'); ?>

	<div id="content" class="site-content">
