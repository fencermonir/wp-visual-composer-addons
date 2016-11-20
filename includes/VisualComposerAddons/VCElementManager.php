<?php
/**
 * Visual composer element manager class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\VisualComposerAddons\Elements;

use Symfony\Component\Finder\Finder;

/**
 * Visual composer element manager class.
 *
 * @package    visual-composer-addons
 */
class VCElementManager {
	const ELEMENTS_PATH = __DIR__ . '/Elements/';

	/**
	 * Store visual composer elements instances.
	 *
	 * @access private
	 * @var array \MedFreeman\WP\VisualComposerAddons\AbstractVCElement
	 */
	private $elements_instances;

	/**
	 * Register visual composer elements instances.
	 *
	 * @return void
	 */
	function __construct() {
		$elements_instances = array();

		$finder = new Finder();
		$finder->files()->in( self::ELEMENTS_PATH );

		foreach ( $finder as $file ) {
			$file_name = $file->getRelativePathname();
			$class_name = 'MedFreeman\WP\VisualComposerAddons\Elements\\' . pathinfo( $file_name, PATHINFO_FILENAME );
			$this->elements_instances[] = new $class_name();
		}
	}

	/**
	 * Initializes visual composer elements instances.
	 *
	 * @return void
	 */
	function init() {
		foreach ( $this->elements_instances as $instance ) {
			$instance->init();
		}
	}
}
