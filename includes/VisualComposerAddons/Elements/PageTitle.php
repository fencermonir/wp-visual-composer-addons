<?php
/**
 * Visual composer 1plusX page title.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Elements;

use MedFreeman\WP\VisualComposerAddons\VCElementInterface;

/**
 * Visual composer page title element class.
 */
class PageTitle extends \WPBakeryShortCodeFishBones implements VCElementInterface {

	/**
	 * Register visual composer element.
	 *
	 * @return array $settings Visual composer vc_map settings.
	 */
	public static function vc_settings() {
		/* Intro */
		return array(
			'name'        => __( 'Page title', 'vcaddons' ),
			'base'        => 'page_title',
			'description' => __( 'Page title', 'vcaddons' ),
			'category'    => 'Addons',
			'admin_enqueue_js'  => VCADDONS_URL . 'assets/js/src/Elements/PageTitle.js',
			'icon'              => 'icon-wpb__page_title',
			'js_view'           => 'VcPageTitleView',
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
			'title'       => '',
			'title_color' => '#006699',
		), $atts );
		$color = '' !== $atts['title_color'] ? " style=\"color: {$atts['title_color']}\"" : '';

		$output = "<h2 class=\"wpb__page__title\"{$color}>{$atts['title']}</h2>";
		return $output;
	}
}
