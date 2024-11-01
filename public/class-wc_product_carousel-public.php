<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://designas.in
 * @since      1.0.0
 *
 * @package    Wc_product_carousel
 * @subpackage Wc_product_carousel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_product_carousel
 * @subpackage Wc_product_carousel/public
 * @author     Sushovan Bhowmik <papaisushovan@gmail.com>
 */
class Wc_product_carousel_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_product_carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_product_carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
			
		wp_enqueue_style('owl-carousel', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, 'all' );
		wp_enqueue_style('owl-theme', plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.css', array(), $this->version, 'all' );
		wp_enqueue_style('slider-custom', plugin_dir_url( __FILE__ ) . 'css/wc_product_carousel-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_product_carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_product_carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'owl-carousel', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'thene-custom', plugin_dir_url( __FILE__ ) . 'js/wc_product_carousel-public.js', array( 'jquery' ), $this->version, false );

	}

}
