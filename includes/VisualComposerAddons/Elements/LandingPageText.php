<?php
/**
 * Visual composer 1plusX landing page text.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\AbstractVCElement;

/**
 * Visual composer landing page text element class.
 */
class LandingPageText extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'landing_page_text';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		/* Intro */
		vc_map( array(
			'name'        => __( 'Landing page text', 'vcaddons' ),
			'base'        => $this->get_base(),
			'description' => __( 'Landing page text with controllable placement, and options for small screens', 'vcaddons' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Title', 'vcaddons' ),
					'param_name' => 'title',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Title (new paragraph)', 'vcaddons' ),
					'param_name' => 'title2',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Subtitle', 'vcaddons' ),
					'param_name' => 'subtitle',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Text', 'vcaddons' ),
					'param_name' => 'content',
					'value' => '',
					'description' => '',
				),
			)
		) );
	}

	/**
	 * Register visual composer element shortcode.
	 *
	 * @param array           $attrs shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return void
	 */
	function shortcode( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'title' => '',
			'title2' => '',
			'subtitle' => '',
		), $attrs ) );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content

		$output  = "<div class=\"wpb__landing\">";
		$output .= '' !== $title ? "<h1 class=\"wpb__landing__title\">{$title}</h1>" : '';
		$output .= '' !== $title2 ? "<h1 class=\"wpb__landing__title\">{$title2}</h1>" : '';
		$output .= '' !== $subtitle ? "<h2 class=\"wpb__landing__subtitle\">{$subtitle}</h2>" : '';
		$output .= '' !== $content ? "<div class=\"wpb__landing__text\">{$content}</div>" : '';
		$output .= "</div>";
		return $output;
	}

	/**
	 * Register visual composer element style.
	 *
	 * @return void
	 */
	function enqueue_scripts() {
		wp_register_style( 'vc_landing_page_text', VCADDONS_URL . '/assets/css/Elements/LandingPageText.css' );
		wp_enqueue_style( 'vc_landing_page_text' );
	}
}
