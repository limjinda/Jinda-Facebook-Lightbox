<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.jindatheme.com
 * @since      1.0.0
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/admin
 * @author     JindaTheme <hello@jindatheme.com>
 */
class Jinda_Social_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jinda-social-admin.css', array('wp-color-picker'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jinda-social-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );

	}


	public function add_plugin_admin_menu(){
		// add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
		add_options_page("Jinda Social Lightbox for WordPress", "Jinda LightBox", "manage_options", $this->plugin_name, array($this, "display_plugin_setup_page"));
	}

	public function add_action_links($links){
		$settings_link = array(
			'<a href="'. admin_url('options-general.php?page='. $this->plugin_name) .'">'. __('Settings', $this->plugin_name) .'</a>',
		);
		return array_merge($settings_link, $links);
	}

	public function display_plugin_setup_page(){
		include_once('partials/jinda-social-admin-display.php');
	}

	public function validate($input){
		$valid = array();
		$valid['facebook-page-url'] = esc_url($input['facebook-page-url']);
		$valid['close-click-overlay'] = (isset($input['close-click-overlay']) && !empty($input['close-click-overlay'])) ? 1 : 0;
		$valid['show-homepage'] = (isset($input['show-homepage']) && !empty($input['show-homepage'])) ? 1 : 0;
		$valid['show-post'] = (isset($input['show-post']) && !empty($input['show-post'])) ? 1 : 0;
		$valid['show-page'] = (isset($input['show-page']) && !empty($input['show-page'])) ? 1 : 0;
		$valid['show-interval'] = sanitize_text_field($input['show-interval']);
		$valid['popup-delay'] = sanitize_text_field($input['popup-delay']);

		$valid['lightbox-color'] = ( isset($input['lightbox-color']) && !empty($input['lightbox-color']) ) ? sanitize_text_field($input['lightbox-color']) : '';
		if ( !empty($input['lightbox-color']) && !preg_match('/^#[a-f0-9]{6}$/i', $valid['lightbox-color']) ){
			add_settings_error(
				'lightbox-color',
				'lightbox-color_text_error',
				'Lightbox Color - Please enter a valid hex value color',
				'error'
			);
		}

		$valid['button-color'] = ( isset($input['button-color']) && !empty($input['button-color']) ) ? sanitize_text_field($input['button-color']) : '';
		if ( !empty($input['button-color']) && !preg_match('/^#[a-f0-9]{6}$/i', $valid['button-color']) ){
			add_settings_error(
				'button-color',
				'button-color_text_error',
				'Button Color - Please enter a valid hex value color',
				'error'
			);
		}

		$valid['text-before'] = sanitize_text_field($input['text-before']);
		$valid['text-after'] = sanitize_text_field($input['text-after']);
		$valid['override-css'] = sanitize_text_field($input['override-css']);
		
		return $valid;
	}

	public function options_update(){
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}


}
