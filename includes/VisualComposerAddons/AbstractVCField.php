<?php
/**
 * Visual composer abstract element class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\Dev\Hooks;

/**
 * Visual composer element abstract class.
 *
 * @package    visual-composer-addons
 */
abstract class AbstractVCField {

	use Hooks;

	/**
	 * Register visual composer field type.
	 *
	 * @uses   add_action
	 * @action vc_before_init
	 * @return void
	 */
	public function __construct() {
		// We safely integrate with VC with this hook.
		$this->add_action( 'vc_before_init', 'vc_integration' );
	}

	/**
	 * The function that is bound to vc_before_init hook.
	 * Allows declaring the new element to visual composer.
	 *
	 * @return void
	 */
	abstract protected function vc_integration();
}
