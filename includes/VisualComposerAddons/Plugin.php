<?php
/**
 * Initializes the plugin.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons;

use MedFreeman\WP\VisualComposerAddons\VCElementManager;

/**
 * Plugin initialization class
 *
 * @package    visual-composer-addons
 * @author     Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since      Class available since Release 1.0.0
 */
class Plugin {
	/**
	 * The instance of the vc element manager.
	 *
	 * @access public
	 * @var \MedFreeman\WP\VisualComposerAddons\VCElementManager
	 */
	public $vc_element_manager;
	/**
	 * Setup the plugin's main functionality.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'init', array( $this, 'init' ) );

		$this->vc_element_manager = new VCElementManager();
	}
	/**
	 * Initializes the plugin and fires an action other plugins can hook into.
	 *
	 * @author Allen Moore, 10up
	 * @return void
	 */
	public function init() {
		// Check if Visual Composer is installed.
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			// Display notice that Visual Compser is required.
			add_action( 'admin_notices', array( $this, 'vc_install_notice' ) );

			return;
		}

		$this->vc_element_manager->init();

		do_action( 'vcaddons_init' );
	}

	/**
	 * Prints a notice when visual composer is not installed and activated.
	 *
	 * @uses get_plugin_data()
	 *
	 * @prints notice
	 * @return void
	 */
	function vc_install_notice() {
		$plugin_data = get_plugin_data( __FILE__ );
		?>
		<div class="updated">
		  <p>
		  	<?php sprintf( __( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a><	strong> plugin to be installed and activated on your site.', 'vcaddons' ), $plugin_data['Name'] ); ?>
		  </p>
		</div>
		<?php
	}

	/**
	 * Sets up the text domain.
	 *
	 * @return void
	 */
	public function i18n() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'vcaddons' );
		load_textdomain( 'vcaddons', WP_LANG_DIR . '/vcaddons/vcaddons-' . $locale . '.mo' );
		load_plugin_textdomain( 'vcaddons', false, plugin_basename( VCADDONS_PATH ) . '/languages/' );
	}
}

