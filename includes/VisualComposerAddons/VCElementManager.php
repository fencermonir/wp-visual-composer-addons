<?php
/**
 * Visual composer element manager class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\Dev\Hooks;

use Symfony\Component\Finder\Finder;

/**
 * Visual composer element manager class.
 */
class VCElementManager {

	use Hooks;

	const ELEMENTS_PATH = __DIR__ . '/Elements/';

	/**
	 * Store visual composer elements class names.
	 *
	 * @access private
	 * @var array classes names.
	 */
	private $elements_classes;

	/**
	 * Register visual composer elements instances.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->elements_classes = array();

		$finder = new Finder();
		$finder->files()->in( self::ELEMENTS_PATH );

		foreach ( $finder as $file ) {
			$file_name = $file->getRelativePathname();
			$class_name = 'MedFreeman\WP\VisualComposerAddons\Elements\\' . pathinfo( $file_name, PATHINFO_FILENAME );
			$this->elements_classes[] = $class_name;
		}
		$this->elements_classes = apply_filters( 'vcaddons_elements_classes', $this->elements_classes );

		$this->add_action( 'vc_before_init', 'vc_integration' );
	}

	/**
	 * Integrates each element with visual composer.
	 *
	 * @return void
	 */
	private function vc_integration() {
		foreach ( $this->elements_classes as $class_name ) {
			vc_map(
				array_merge(
					$class_name::vc_settings(),
					array(
						'php_class_name' => $class_name,
					)
				)
			);
		}
	}
}
