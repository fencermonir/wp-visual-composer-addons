<?php
/**
 * Visual composer colorable text.
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
class CustomizableText extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'customizable_text';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {

		/* Intro */
		vc_map( array(
			'name'        => __( 'Customizable text', 'vcaddons' ),
			'base'        => $this->get_base(),
			'description' => __( 'Text with size, weight and color', 'vcaddons' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
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
					'heading' => __( 'Text size', 'vcaddons' ),
					'param_name' => 'size',
					'value' => '16',
					'min'   => 12,
					'max'   => 36,
					'description' => 'in pixels.',
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Text weight', 'vcaddons' ),
					'param_name' => 'weight',
					'value' => array(
						'Standard' => 'normal',
						'Bold' => 'bold',
					),
					'description' => '',
				),
				array(
					'type' => 'colorpicker',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Text color', 'vcaddons' ),
					'param_name' => 'color',
					'value' => '#006699',
					'description' => '',
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
		$attrs = shortcode_atts( array(
			'size' => '16',
			'weight' => 'normal',
			'color' => '#006699',
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.

		$output = "<div class=\"wpb__customizable__text\" style=\"font-size:{$attrs['size']}px;font-weight:{$attrs['weight']};color:{$attrs['color']};\">";
		$output .= $content;
		$output .= '</div>';
		return $output;
	}

	/**
	 * Register visual composer element style.
	 *
	 * @return void
	 */
	function enqueue_scripts() {
	}
}
