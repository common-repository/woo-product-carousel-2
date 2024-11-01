<?php
vc_map( array(
		"name" => __("Featured Product Carousel"),
		"base" => "d_featured_slider",
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
			
			array(
				"type" => "textfield",
				"holder" => "",
				"class" => "",
				"heading" => __("Number of Post","Chasto"),
				"param_name" => "limit",
				"value" => ""
				
			),
			
	)
		
));
add_shortcode('d_featured_slider', 'd_theme_shortcode');

function d_theme_shortcode( $atts ){
  global $post;
  $default = array(
    'type'      => 'post',
	'status'    => 'publish',
    'post_type' => 'product',
	'heading' => '',
	'limit'     => '',
	'alignment' => ''
  );
  $r = shortcode_atts( $default, $atts );
  extract( $r );

	  $args = array(
		'post_type'   => $post_type,
		'numberposts' => $limit,
		'post_status' => $status,
		'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
  );
  
  
ob_start();
    $loop = new WP_Query( $args );
	
	if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
    wp_reset_postdata();

    return '
		<div class="full">
		<div class="sfs_title">
		<div class="fancy-heading blank"><h3>'.$atts['heading'].'</h3></div>
		</div>
		<div class="sfs_trigger">
		<ul class="next_prev">
		<li><a class="prev"><span class="fa fa-angle-left"></span></a></li>
		<li><a class="next"><span class="fa fa-angle-right"></span></a></li>
		</ul>
		</div>  
		</div>

	<div class="full">
      <ul class="products fture">
      <div class="owl-carousel owl-theme my-carousel">
	  ' . ob_get_clean() . '</div>
    </ul>
 </div> ';
} 
?>