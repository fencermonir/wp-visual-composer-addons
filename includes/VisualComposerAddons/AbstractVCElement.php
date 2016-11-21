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
abstract class AbstractVCElement {

	use Hooks;

	/**
	 * Register visual composer element.
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
	 * Register visual composer element shortcode,
	 * and enqueue scripts and styles if needed.
	 *
	 * @uses   add_shortcode
	 * @uses   add_filter
	 * @action wp_enqueue_scripts
	 * @return void
	 */
	public function init() {
		// Use this when creating a shortcode addon.
		if ( ! empty( $this->get_base() ) ) {
			$this->add_shortcode( $this->get_base(), 'shortcode' );
		}

		// Register CSS and JS.
		$this->add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
	}

	/**
	 * The function that returns the base name of the element.
	 * If not empty, a shortcode will be registered with a name equal to this string.
	 *
	 * @return string | empty
	 */
	abstract protected function get_base();

	/**
	 * The function that is bound to vc_before_init hook.
	 * Allows declaring the new element to visual composer.
	 *
	 * @return void
	 */
	abstract protected function vc_integration();

	/**
	 * The function that is bound to the element's shortcode.
	 * Outputs the shortcode's markup.
	 *
	 * @param array           $attrs shortcode attributes.
	 * @param (string | null) $content shortcode contents.
	 *
	 * @return shortcode output
	 */
	abstract protected function shortcode( $attrs, $content = null );

	/**
	 * The function that is bound to wp_enqueue_scripts hook.
	 * Registers scripts and styles.
	 *
	 * @return void
	 */
	abstract protected function enqueue_scripts();
}
