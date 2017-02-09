<?php
/**
 * Visual composer abstract field class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\Dev\Hooks;

/**
 * Visual composer field abstract class.
 *
 * @package    visual-composer-addons
 */
abstract class VCFieldAbstract {

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
	 * Allows declaring the new field to visual composer.
	 *
	 * @return void
	 */
	abstract protected function vc_integration();
}
