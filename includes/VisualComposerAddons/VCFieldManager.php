<?php
/**
 * Visual composer field manager class.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use Symfony\Component\Finder\Finder;

/**
 * Visual composer fields manager class.
 */
class VCFieldManager {
	const FIELDS_PATH = __DIR__ . '/Fields/';

	/**
	 * Register visual composer fields instances.
	 *
	 * @return void
	 */
	public function __construct() {
		$field_classes = array();

		$finder = new Finder();
		$finder->files()->in( self::FIELDS_PATH );

		foreach ( $finder as $file ) {
			$file_name = $file->getRelativePathname();
			$class_name = 'MedFreeman\WP\VisualComposerAddons\Fields\\' . pathinfo( $file_name, PATHINFO_FILENAME );
			$field_classes[] = $class_name;
		}

		$field_classes = apply_filters( 'vcaddons_fields_classes', $field_classes );

		foreach ( $field_classes as $class_name ) {
			new $class_name();
		}
	}
}
