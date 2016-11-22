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
		$breakpoint = get_option( 'wpb_js_responsive_max', 768 );

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
				array(
					'type' => 'number',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Vertical offset', 'vcaddons' ),
					'param_name' => 'offset',
					'value' => 0,
					'min'   => 0,
					'max'   => 100,
					'description' => 'in vw units.',
				),
				array(
					'type' => 'number',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Small screen Vertical offset', 'vcaddons' ),
					'param_name' => 'offset_iphone',
					'value' => 0,
					'min'   => 0,
					'max'   => 100,
					'description' => 'in vw units for screens under ' . $breakpoint . 'px.',
				),
			),
		) );
	}

	/**
	 * Register visual composer element shortcode.
	 *
	 * @param array           $attrs shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return shortcode output
	 */
	function shortcode( $attrs, $content = null ) {
		$this->counter += 1;
		$attrs = shortcode_atts( array(
			'title' => '',
			'title2' => '',
			'subtitle' => '',
			'offset' => 0,
			'offset_iphone' => 0,
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.

		$breakpoint = get_option( 'wpb_js_responsive_max', 768 );

		$output = "
		<style scoped>
			.wpb__landing--{$this->counter} {
				margin-top: {$attrs['offset_iphone']}vw;
			}

			@media only screen and (min-width: {$breakpoint}px) {
				.wpb__landing--{$this->counter} {
					margin-top: {$attrs['offset']}vw;
				}
			}
		</style>";
		$output .= "<div class=\"wpb__landing wpb__landing--{$this->counter}\">";
		$output .= '' !== $attrs['title'] ? "<h1 class=\"wpb__landing__title\">{$attrs['title']}</h1>" : '';
		$output .= '' !== $attrs['title2'] ? "<h1 class=\"wpb__landing__title\">{$attrs['title2']}</h1>" : '';
		$output .= '' !== $attrs['subtitle'] ? "<h2 class=\"wpb__landing__subtitle\">{$attrs['subtitle']}</h2>" : '';
		$output .= '' !== $content ? "<div class=\"wpb__landing__text\">{$content}</div>" : '';
		$output .= '</div>';
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
