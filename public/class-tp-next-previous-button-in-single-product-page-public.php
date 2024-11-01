<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://tplugins.com/shop
 * @since      1.0.0
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/public
 * @author     TP Plugins <pluginstp@gmail.com>
 */
class Tp_Next_Previous_Button_In_Single_Product_Page_Public {

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

		if(get_option('tpnpb_activate_next_previous')){
			wp_enqueue_style( $this->plugin_name.'-icons', plugin_dir_url( __FILE__ ) . 'icons/css/fontello.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tp-next-previous-button-in-single-product-page-public.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if(get_option('tpnpb_activate_next_previous')){
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tp-next-previous-button-in-single-product-page-public.js', array( 'jquery' ), $this->version, false );
		}
	}

	public function init_next_previous_button_simple() {

		$activate_next_previous_mobile = get_option('tpnpb_activate_next_previous_mobile');
		$buttons_position              = get_option('tpnpb_buttons_position');

		if(wp_is_mobile() && !$activate_next_previous_mobile){
			$disabled = 'tpnpb_prev_next_buttons_disabled';
		}
		else{
			$disabled = 'tpnpb_prev_next_buttons_display';
		}

		if(wp_is_mobile()){
			$mobile_class = 'tpnpb_prev_next_buttons_mobile';
		}
		else{
			$mobile_class = 'tpnpb_prev_next_buttons_desktop';
		}

		//$next_post = get_next_post(TRUE,'','product_cat');
		//$previous_post = get_previous_post(TRUE,'','product_cat');

		//Labels
		$label_prev = apply_filters('tpnpb_prev_label', get_option('tpnpb_label_previous'));
		$label_next = apply_filters('tpnpb_next_label', get_option('tpnpb_label_next'));

		echo '<div class="tpnpb_prev_next_buttons tpnpb_prev_next_buttons_'.esc_attr($buttons_position).' '.esc_attr($mobile_class).' '.esc_attr($disabled).'">';
		
			// 'product_cat' will make sure to return next/prev from current category
			$previous = next_post_link('%link', '&larr; '.$label_prev.'', TRUE, ' ', 'product_cat');
			$next = previous_post_link('%link', ''.$label_next.' &rarr;', TRUE, ' ', 'product_cat');
		
			echo apply_filters('tpnpb_prev_button', $previous);
			echo apply_filters('tpnpb_next_button', $next);
			
		echo '</div>';
	}

	public function init_custom_css() {

		$buttons_color      = get_option('tpnpb_buttons_color');
		$buttons_border     = get_option('tpnpb_buttons_border');
		$add_product_image  = get_option('tpnpb_add_product_image');
		$product_image_size = get_option('tpnpb_product_image_size');
		$buttons_font_size  = get_option('tpnpb_buttons_font_size');

		$buttons_border  = ($buttons_border) ? '1px solid' : 'none';
		$buttons_padding = (get_option('tpnpb_buttons_border')) ? '0 20px' : '0';

		echo '<style>';

			echo '.tpnpb_prev_next_buttons a, .tpnpb_prev_next_buttons a {
				color: '.$buttons_color.';
				border: '.$buttons_border.';
				padding: '.$buttons_padding.';
				font-size: '.$buttons_font_size.'px;
			}';

			echo '.tpnpb-single-post-nav img{
				width: '.$product_image_size.'px;
			}';

			if($add_product_image && get_option('tpnpb_buttons_border')){
				echo '.tpnpb-next-post-link a{
					padding-right: 0;
				}';

				echo '.tpnpb-previous-post-link a{
					padding-left: 0;
				}';
			}

		echo '</style>';
	}

}
