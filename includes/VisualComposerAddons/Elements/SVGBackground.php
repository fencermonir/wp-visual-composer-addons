<?php
/**
 * Visual composer svg background element.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\AbstractVCElement;

/**
 * Visual composer SVG background element class.
 */
class SVGBackground extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return '';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		$group      = 'Background SVG';
		$shortcode  = 'vc_row';

		/* Intro */
		vc_add_param( $shortcode, array(
			'type'        => 'checkbox',
			'heading'     => 'Background SVG',
			'param_name'  => 'svg_bg',
			'value'       => array(
								'Use background vector graphics' => 'true',
							 ),
			'description' => 'Responsive vector background.',
			'group'       => $group,
		) );

		/* === Video Files === */

		/* SVG URL */
		vc_add_param( $shortcode, array(
			'type'        => 'media',
			'heading'     => 'SVG URL',
			'param_name'  => 'svg_bg_id',
			'mime'        => 'image/svg+xml',
			'value'       => '',
			'description' => 'Select or upload SVG file.',
			'group'       => $group,
			'dependency'  => array(
								'element' => 'svg_bg',
								'value'   => array( 'true' ),
							 ),
		) );
	}

	/**
	 * Register visual composer element shortcode.
	 * This element doesn't need this function since it only extends vc rows.
	 *
	 * @param array           $attrs shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return void
	 */
	function shortcode( $attrs, $content = null ) {

	}

	/**
	 * Register visual composer element style.
	 *
	 * @return void
	 */
	function enqueue_scripts() {
		wp_register_style( 'vc_svg_background', VCADDONS_URL . '/assets/css/Elements/SVGBackground.css' );
		wp_enqueue_style( 'vc_svg_background' );
	}
}
