<?php
/**
 * Visual composer svg picture element.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\AbstractVCElement;

/**
 * Visual composer svg picture element class.
 */
class SVGPicture extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'svg_picture';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		/* Intro */
		vc_map( array(
			'name'          => __( 'SVG picture', 'vcaddons' ),
			'base'          => $this->get_base(),
			'description'   => __( 'Vector picture', 'vcaddons' ),
			'category'    => '1plusX',
			'custom_markup' => '',
			'params'        => array(
				array(
					'type'        => 'media',
					'heading'     => 'SVG URL',
					'param_name'  => 'svg_id',
					'mime'        => 'image/svg+xml',
					'value'       => '',
					'description' => 'Select or upload SVG file.',
				),
			),
		) );
	}

	/**
	 * Changes element appearance in admin.
	 *
	 * @return element html output
	 */
	function vc_custom_markup( $value, $settings, $tag ) {

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
			'svg_id'       => 0,
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.

		$output = '';
		$output .= '<picture>';
		$output .= absint( $attrs['svg_id'] ) ? '<source srcset="' . wp_get_attachment_url( $attrs['svg_id'] ) . '">' : '';
		$output .= '<img class="wpb__svg__picture" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="transparent gif">';
		$output .= '</picture>';

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
