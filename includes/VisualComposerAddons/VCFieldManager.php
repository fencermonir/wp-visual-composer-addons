<?php
/**
 * Visual composer field manager class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\VisualComposerAddons\Fields;

use Symfony\Component\Finder\Finder;

/**
 * Visual composer fields manager class.
 *
 * @package    visual-composer-addons
 */
class VCFieldManager {
	const FIELDS_PATH = __DIR__ . '/Fields/';

	/**
	 * Store visual composer fields instances.
	 *
	 * @access private
	 * @var array \MedFreeman\WP\VisualComposerAddons\AbstractVCField
	 */
	private $fields_instances;

	/**
	 * Register visual composer fields instances.
	 *
	 * @return void
	 */
	function __construct() {
		$this->fields_instances = array();

		$finder = new Finder();
		$finder->files()->in( self::FIELDS_PATH );

		foreach ( $finder as $file ) {
			$file_name = $file->getRelativePathname();
			$class_name = 'MedFreeman\WP\VisualComposerAddons\Fields\\' . pathinfo( $file_name, PATHINFO_FILENAME );
			$this->fields_instances[] = new $class_name();
		}
	}
}
