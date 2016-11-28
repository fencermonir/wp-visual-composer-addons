<?php
/**
 * Visual composer 1plusX page title.
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
class Button extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'bs_button';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		/* Intro */
		vc_map( array(
			'name'        => __( 'Button', 'vcaddons' ),
			'base'        => $this->get_base(),
			'description' => __( '1plusX button', 'vcaddons' ),
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
					'type' => 'vc_link',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Link', 'vcaddons' ),
					'param_name' => 'link',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Style', 'vcaddons' ),
					'param_name' => 'style',
					'value' => array(
						'White text on Marine' => 'btn-white-on-marine',
						'Marine text on White' => 'btn-marine-on-white',
						'White text on Salmon' => 'btn-white-on-salmon',
					),
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
			'title' => '',
			'link'  => '#',
			'style' => 'btn-white-on-marine',
		), $attrs );
		$href = vc_build_link( $attrs['link'] );

		$output = "<a href=\"{$href['url']}\" class=\"btn {$attrs['style']}\" role=\"button\">{$attrs['title']}</a>";
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
