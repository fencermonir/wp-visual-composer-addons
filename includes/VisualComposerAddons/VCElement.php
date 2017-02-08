<?php
/**
 * Visual composer element trait.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.4.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

trait VCElement {
	/**
	 * Register visual composer element.
	 *
	 * @uses   add_action
	 * @action vc_before_init
	 * @return void
	 */
	protected static function vc_settings() {

	}
}
