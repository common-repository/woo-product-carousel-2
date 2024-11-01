<?php
vc_map( array(
		"name" => __("Product Category Carousel"),
		"base" => "d_category_slider",
		"class" => "",
		'category' => __( 'Easy Component' ),
		"icon" => plugin_dir_path( __FILE__ ) . "images/icon.png",
		"params" => array(
		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Heading","my-text-domain"),
				"param_name" => "heading",
				"value" => ""
			),
			
	)
		
));
add_shortcode('d_category_slider', 'd_category_shortcode');

function d_category_shortcode( $atts ){
  global $post;
  $default = array(
	'heading' => '',
	'limit'     => '',
  );
  $r = shortcode_atts( $default, $atts );
  extract( $r );

ob_start();
  $taxonomyName = "product_cat";
//This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));

   
    foreach ($parent_terms as $pterm) {

        //show parent categories

        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
        // get the image URL for parent category
        $image = wp_get_attachment_url($thumbnail_id);
        // print the IMG HTML for parent category
        echo "<li><img src='{$image}' alt=''  /></li>";

    };
    wp_reset_postdata();

    return '
	
		<div class="full">
		<div class="sfs_title">
		<div class="fancy-heading blank"><h3>'.$atts['heading'].'</h3></div>
		</div>
		<div class="sfs_trigger">
		<ul class="next_prev">
		<li><a class="rprev"><span class="fa fa-angle-left"></span></a></li>
		<li><a class="rnext"><span class="fa fa-angle-right"></span></a></li>
		</ul>
		</div>  
		</div> 
 
 

	<div class="full">
   <ul class="cata">
  <div class="owl-carousel owl-theme cat-carousel">
	  ' . ob_get_clean() . '</div></ul></div>';
} 
?>