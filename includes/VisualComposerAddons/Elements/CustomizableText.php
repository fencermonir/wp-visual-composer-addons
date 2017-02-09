<?php
/**
 * Visual composer colorable text.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\VCElement;

/**
 * Visual composer landing page text element class.
 */
class CustomizableText extends \WPBakeryShortCodeFishBones {

	use VCElement;

	/**
	 * Register visual composer element.
	 *
	 * @return array $settings Visual composer vc_map settings.
	 */
	public static function vc_settings() {

		/* Intro */
		return array(
			'name'        => __( 'Customizable text', 'vcaddons' ),
			'base'        => 'customizable_text',
			'description' => __( 'Text with size, weight and color', 'vcaddons' ),
			'category'    => 'Addons',
			'admin_enqueue_js'  => VCADDONS_URL . 'assets/js/src/Elements/CustomizableText.js',
			'icon'              => 'icon-wpb__customizable_text',
			'js_view'           => 'VcCustomizableTextView',
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
		);
	}

	/**
	 * Register visual composer element shortcode.
	 *
	 * @param array           $atts shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return shortcode output
	 */
	function content( $atts, $content = null ) {
		$atts = shortcode_atts( array(
			'size' => '16',
			'weight' => 'normal',
			'color' => '#006699',
		), $atts );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.

		$output = "<div class=\"wpb__customizable__text\" style=\"font-size:{$atts['size']}px;font-weight:{$atts['weight']};color:{$atts['color']};\">";
		$output .= $content;
		$output .= '</div>';
		return $output;
	}
}
