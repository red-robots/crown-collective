<?php 
/*
 * Custom Post Types 
 * DASH ICONS = https://developer.wordpress.org/resource/dashicons/
 * Example: 'menu_icon' => 'dashicons-admin-users'
*/

add_action('init', 'js_custom_init', 1);
function js_custom_init() {
    $post_types = array(
        array(
          'post_type' => 'team',
          'menu_name' => 'Team',
          'plural'    => 'Teams',
          'single'    => 'Team',
          'menu_icon' => 'dashicons-buddicons-buddypress-logo',
          'menu_position' => 10,
          'supports'  => array('title', 'thumbnail')
        ),
        array(
            'post_type' => 'vendor',
            'menu_name' => 'Vendor',
            'plural'    => 'Vendors',
            'single'    => 'Vendor',
            'menu_icon' => 'dashicons-schedule',
            'menu_position' => 10,
            'supports'  => array('title')
          ),
    );
    
    if($post_types) {
        foreach ($post_types as $p) {
            $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
            $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
            $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
            
            $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural'];
            $hierarchical = ( isset($p['hierarchical']) && $p['hierarchical'] ) ? true : false;
            $menu_icon = ( isset($p['menu_icon']) && $p['menu_icon'] ) ? $p['menu_icon'] : "dashicons-admin-post"; 
            $supports = ( isset($p['supports']) && $p['supports'] ) ? $p['supports'] : array('title','editor','custom-fields','thumbnail'); 
            $taxonomies = ( isset($p['taxonomies']) && $p['taxonomies'] ) ? $p['taxonomies'] : array(); 
            $parent_item_colon = ( isset($p['parent_item_colon']) && $p['parent_item_colon'] ) ? $p['parent_item_colon'] : ""; 
            $menu_position = ( isset($p['menu_position']) && $p['menu_position'] ) ? $p['menu_position'] : 20; 
            
            if($p_type) {
                
                $labels = array(
                    'name' => _x($plural_name, 'post type general name'),
                    'singular_name' => _x($single_name, 'post type singular name'),
                    'add_new' => _x('Add New', $single_name),
                    'add_new_item' => __('Add New ' . $single_name),
                    'edit_item' => __('Edit ' . $single_name),
                    'new_item' => __('New ' . $single_name),
                    'view_item' => __('View ' . $single_name),
                    'search_items' => __('Search ' . $plural_name),
                    'not_found' =>  __('No ' . $plural_name . ' found'),
                    'not_found_in_trash' => __('No ' . $plural_name . ' found in Trash'), 
                    'parent_item_colon' => $parent_item_colon,
                    'menu_name' => $menu_name
                );
          
                $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true, 
                    'show_in_menu' => true, 
                    'show_in_rest' => true,
                    'query_var' => true,
                    'rewrite' => true,
                    'capability_type' => 'post',
                    'has_archive' => false, 
                    'hierarchical' => $hierarchical, // 'false' acts like posts 'true' acts like pages
                    'menu_position' => $menu_position,
                    'menu_icon'=> $menu_icon,
                    'supports' => $supports
                ); 
                
                register_post_type($p_type,$args); // name used in query
                
            }
            
        }
    }
}

/* ##########################################################
 * Add new taxonomy, make it hierarchical (like categories)
 * Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 ); 
function build_taxonomies() {

  $post_types = array(
    array(
        'post_type' => array('team'),
        'menu_name' => 'Team Category',
        'plural'    => 'Team Categories',
        'single'    => 'Team Category',
        'taxonomy'  => 'team-category',
        'query_var' => false,
        'show_admin_column'=>1
    ),
    array(
      'post_type' => array('vendor'),
      'menu_name' => 'Vendor Category',
      'plural'    => 'Vendor Categories',
      'single'    => 'Vendor Category',
      'taxonomy'  => 'vendor-category',
      'query_var' => false,
      'show_admin_column'=>1
    )
  );

  if($post_types) {
    foreach($post_types as $p) {
      $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
      $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
      $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
      $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural'];
      $taxonomy = ( isset($p['taxonomy']) && $p['taxonomy'] ) ? $p['taxonomy'] : "";
      $rewrite = ( isset($p['rewrite']) && $p['rewrite'] ) ? $p['rewrite'] : $taxonomy;
      $query_var = ( isset($p['query_var']) && $p['query_var'] ) ? $p['query_var'] : true;
      $show_admin_column = ( isset($p['show_admin_column']) ) ? $p['show_admin_column'] : true;

      $labels = array(
        'name' => _x( $menu_name, 'taxonomy general name' ),
        'singular_name' => _x( $single_name, 'taxonomy singular name' ),
        'search_items' =>  __( 'Search ' . $plural_name ),
        'popular_items' => __( 'Popular ' . $plural_name ),
        'all_items' => __( 'All ' . $plural_name ),
        'parent_item' => __( 'Parent ' .  $single_name),
        'parent_item_colon' => __( 'Parent ' . $single_name . ':' ),
        'edit_item' => __( 'Edit ' . $single_name ),
        'update_item' => __( 'Update ' . $single_name ),
        'add_new_item' => __( 'Add New ' . $single_name ),
        'new_item_name' => __( 'New ' . $single_name ),
      );

      register_taxonomy($taxonomy, $p_type, array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_admin_column' => $show_admin_column,
        'query_var' => $query_var,
        'show_ui' => true,
        'show_in_rest' => true,
        'public' => true,
        '_builtin' => true,
        'rewrite' => array( 'slug' => $rewrite ),
      ));

    }
  }
}



// Add the custom columns to the position post type:
add_filter( 'manage_posts_columns', 'set_custom_cpt_columns' );
function set_custom_cpt_columns($columns) {
    global $wp_query;
    $query = isset($wp_query->query) ? $wp_query->query : '';
    $post_type = ( isset($query['post_type']) ) ? $query['post_type'] : '';

    if($post_type=='post') {
        unset($columns['tags']);
        unset($columns['author']);
        unset($columns['categories']);
        unset($columns['taxonomy-activity_type']);
        unset($columns['expirationdate']);
        unset($columns['date']);
        $columns['title'] = __( 'Name', 'bellaworks' );
        $columns['categories'] = __( 'Category', 'bellaworks' );
        $columns['author'] = __( 'Author', 'bellaworks' );
        $columns['date'] = __( 'Date', 'bellaworks' );
        $columns['expirationdate'] = __( 'Expires', 'bellaworks' );
    }

    if($post_type=='faqs') {
        unset($columns['expirationdate']);
        unset($columns['date']);
        unset($columns['taxonomy-faq_type']);
        $columns['title'] = __( 'Name', 'bellaworks' );
        $columns['icon'] = __( 'Icon', 'bellaworks' );
        $columns['taxonomy-faq_type'] = __( 'FAQ Type', 'bellaworks' );
        $columns['date'] = __( 'Date', 'bellaworks' );
        $columns['expirationdate'] = __( 'Expires', 'bellaworks' );
    }

    if($post_type=='instructions') {
        unset($columns['taxonomy-instructions-template']);
    }
    
    return $columns;
}

//Add the data to the custom columns for the book post type:
add_action( 'manage_posts_custom_column' , 'custom_post_column', 10, 2 );
function custom_post_column( $column, $post_id ) {
    global $wp_query;
    $query = isset($wp_query->query) ? $wp_query->query : '';
    $post_type = ( isset($query['post_type']) ) ? $query['post_type'] : '';
    
    if($post_type=='music') {
        switch ( $column ) {

            case 'show_on_homepage' :
                $show = get_field('show_on_homepage',$post_id);
                if($show=='yes') {
                    echo '<span style="display:inline-block;width:50px;text-align:center;"><i class="dashicons dashicons-star-filled" style="color:#f1b429;font-size:25px;"></i></span>';
                } 
                break;

            case 'featimage' :
                $img = get_field('thumbnail_image',$post_id);
                $img_src = ($img) ? $img['sizes']['medium'] : '';
                $the_photo = '<span class="tmphoto" style="display:inline-block;width:50px;height:50px;background:#e2e1e1;text-align:center;border:1px solid #CCC;overflow:hidden;">';
                if($img_src) {
                   $the_photo .= '<span style="display:block;width:100%;height:100%;background:url('.$img_src.') top center no-repeat;background-size:cover;transform:scale(1.2)"></span>';
                } else {
                    $the_photo .= '<i class="dashicons dashicons-format-image" style="font-size:25px;position:relative;top:13px;left: -3px;opacity:0.3;"></i>';
                }
                $the_photo .= '</span>';
                echo $the_photo;
                break;

            case 'start_date' :
                $date_string = get_field('start_date',$post_id);
                if($date_string) {
                    $sdate = DateTime::createFromFormat('Y-m-d', $date_string);
                    echo $sdate->format('M j, Y');
                } 
                break;
        }
    }

    if($post_type=='dining') {
      switch ( $column ) {
        case 'start_date' :
            $date_string = get_field('start_date',$post_id);
            if($date_string) {
                $sdate = DateTime::createFromFormat('Y-m-d', $date_string);
                echo $sdate->format('M j, Y');
            } 
            break;
      }
    }

    if($post_type=='post') {
        switch ( $column ) {

            case 'show_on_homepage' :
                $show = get_field('show_on_homepage',$post_id);
                if($show=='yes') {
                    echo '<span style="display:inline-block;width:50px;text-align:center;"><i class="dashicons dashicons-star-filled" style="color:#f1b429;font-size:25px;"></i></span>';
                } 
                break;

        }
    }

    if($post_type=='camp') {
        switch ( $column ) {
            case 'eventdate' :
                $dates = get_field('date_range',$post_id);
                echo ($dates) ? $dates:'';
                break;
        }
    }

    if($post_type=='faqs') {
        switch ( $column ) {
            case 'icon' :
                $icon = get_field('custom_icon',$post_id);
                echo ($icon) ? '<span class="'.$icon.'" style="font-size:25px;line-height:1"></span>':'';
                break;
        }
    }

    if($post_type=='tribe_events') {
        switch ( $column ) {
            case 'bandname' :
                $bName = get_post_field( 'post_title', get_the_ID() );
                $bName = preg_replace("/[^a-zA-Z]+/", " ", $bName);
                if($bName !=='') {
                    echo $bName;
                } 
                break;
        }
    }
    
}
