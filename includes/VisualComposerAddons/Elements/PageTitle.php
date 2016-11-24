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
class PageTitle extends AbstractVCElement {

	/**
	 * Set element base name.
	 *
	 * @return string
	 */
	function get_base() {
		return 'page_title';
	}

	/**
	 * Register visual composer element.
	 *
	 * @return void
	 */
	function vc_integration() {
		/* Intro */
		vc_map( array(
			'name'        => __( 'Page title', 'vcaddons' ),
			'base'        => $this->get_base(),
			'description' => __( '1plusX page title', 'vcaddons' ),
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
					'type' => 'colorpicker',
					'holder' => 'div',
					'class' => '',
					'heading' => __( 'Color', 'vcaddons' ),
					'param_name' => 'title_color',
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
			'title'       => '',
			'title_color' => '#006699',
		), $attrs );
		$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content.
		$color = '' !== $attrs['title_color'] ? " style=\"color: {$attrs['title_color']}\"" : '';

		$output = "<h1 class=\"wpb__page__title\"{$color}>{$attrs['title']}</h1>";
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
