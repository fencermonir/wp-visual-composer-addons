<?php
/**
 * Visual composer extension class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

/**
 * Visual composer extension class
 *
 * @package    visual-composer-addons
 * @author     Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since      Class available since Release 1.0.0
 */
class VCExtend {
	/**
	 * Register the plugin's vc extension.
	 *
	 * @return void
	 */
	function __construct() {
		// We safely integrate with VC with this hook.
		add_action( 'vc_before_init', array( $this, 'integrate_with_vc' ) );
	}

	/**
	 * Setup the extension main functionality.
	 *
	 * @return void
	 */
	function setup() {
		// Use this when creating a shortcode addon.
		add_shortcode( 'bartag', array( $this, 'render_my_bartag' ) );

		// Register CSS and JS.
		add_action( 'wp_enqueue_scripts', array( $this, 'load_css_and_js' ) );
	}

	/**
	 * Setup the integration with visual composer.
	 *
	 * @return void
	 */
	public function integrate_with_vc() {
		/*
		Add your Visual Composer logic here.
		Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

		More info: http://kb.wpbakery.com/index.php?title=Vc_map
		*/
		vc_map( array(
			'name' => __( 'My Bar Shortcode', 'vc_extend' ),
			'description' => __( 'Bar tag description text', 'vc_extend' ),
			'base' => 'bartag',
			'class' => '',
			'controls' => 'full',
			'icon' => 'vc_extend_my_class', // or css class name which you can reffer in your css file later. Example: 'vc_extend_my_class'.
			'category' => __( 'Content', 'js_composer' ),
			// 'admin_enqueue_js' => array(plugins_url( 'assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor.
			// 'admin_enqueue_css' => array(plugins_url( 'assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor.
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Text', 'vc_extend' ),
					'param_name' => 'foo',
					'value' => __( 'Default params value', 'vc_extend' ),
					'description' => __( 'Description for foo param.', 'vc_extend' ),
				),
				array(
					'type' => 'colorpicker',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Text color', 'vc_extend' ),
					'param_name' => 'color',
					'value' => '#FF0000', // Default Red color.
					'description' => __( 'Choose text color', 'vc_extend' ),
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Content', 'vc_extend' ),
					'param_name' => 'content',
					'value' => __( '<p>I am test text block. Click edit button to change this text.</p>', 'vc_extend' ),
					'description' => __( 'Enter your content.', 'vc_extend' ),
				),
			),
		) );
	}

	/**
	 * Prints the bartag shortcode.
	 *
	 * @param array           $attrs shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return shortcode output
	 */
	public function render_my_bartag( $attrs, $content = null ) {
		$attrs = shortcode_atts( array(
			'foo' => 'something',
			'color' => '#FF0000',
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.

		$output = "<div style='color:{$color};' data-foo='${foo}'>{$content}</div>";
		return $output;
	}

	/**
	 * Loads the plugin's css and js files.
	 *
	 * @return void
	 */
	public function load_css_and_js() {
		wp_register_style( 'vc_extend_style', plugins_url( 'assets/css/visual-composer-addons.css', __FILE__ ) );
		wp_enqueue_style( 'vc_extend_style' );

		// If you need any javascript files on front end, here is how you can load them.
		// wp_enqueue_script( 'vc_extend_js', plugins_url( 'assets/vc_extend.js', __FILE__), array( 'jquery' ) );.
	}
}
