<?php
/**
 * Visual composer element interface.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.4.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

Interface VCElementInterface {
	/**
	 * Register visual composer element.
	 *
	 * @uses   add_action
	 * @action vc_before_init
	 * @return array $settings Visual composer vc_map settings.
	 */
	public static function vc_settings();

	/**
	 * Register visual composer element shortcode.
	 *
	 * @param array           $atts shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return shortcode output
	 */
	public function content( $atts, $content = null );
}
