<?php
/**
 * Visual composer 1plusX big number element.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\AbstractVCElement;

/**
 * Visual composer page title element class.
 */
class BigNumber extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'big_number';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		/* Intro */
		vc_map( array(
			'name'        => __( 'Big number', 'vcaddons' ),
			'base'        => $this->get_base(),
			'description' => __( '1plusX big number', 'vcaddons' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
				array(
					'type' => 'number',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Number', 'vcaddons' ),
					'param_name' => 'number',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'colorpicker',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Color', 'vcaddons' ),
					'param_name' => 'number_color',
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
		$this->counter += 1;
		$attrs = shortcode_atts( array(
			'number'       => '',
			'number_color' => '#006699',
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.
		$color = '' !== $attrs['number_color'] ? " style=\"color: {$attrs['number_color']}\"" : '';

		$output = "<div class=\"wpb__big__number\"{$color}>{$attrs['number']}</div>";
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
