<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.jindatheme.com
 * @since      1.0.0
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/public
 * @author     JindaTheme <hello@jindatheme.com>
 */
class Jinda_Social_Public {

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
		$this->jinda_social_options = get_option($this->plugin_name);

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
		 * defined in Jinda_Social_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jinda_Social_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jinda-social-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jinda_Social_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jinda_Social_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_register_script('jquery-cookie', plugin_dir_url( __FILE__ ) . 'js/lib/js.cookie-2.0.3.min.js' , array( 'jquery' ), '2.0.3', false);
		wp_register_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jinda-social-public.js' , array( 'jquery', 'jquery-cookie' ), $this->version, false);
		
		$options = array(
			'facebook_page_url' => $this->jinda_social_options['facebook-page-url'],
			'close_click_overlay' => $this->jinda_social_options['close-click-overlay'],
			'show_interval' => $this->jinda_social_options['show-interval'],
			'popup_delay' => $this->jinda_social_options['popup-delay'],
		);

		wp_localize_script($this->plugin_name, 'jinda_obj', $options);
		wp_enqueue_script( $this->plugin_name );
		wp_enqueue_script( 'jquery-cookie' );

	}

	public function display_plugin_front_page(){

		// show popup on homepage
		if ( $this->jinda_social_options['show-homepage'] == 1 ) {
			if ( is_home() ){
				include_once('partials/jinda-social-public-display.php');
			}
		}

		// show popup on post
		if ( $this->jinda_social_options['show-post'] == 1 ) {
			if ( is_single() ){
				include_once('partials/jinda-social-public-display.php');
			}
		}

		// show popup on page
		if ( $this->jinda_social_options['show-page'] == 1 ) {
			if ( is_page() ){
				include_once('partials/jinda-social-public-display.php');
			}
		}

		
	}

}









