<?php
/**
 * Visual composer Number field.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Fields;

use MedFreeman\WP\VisualComposerAddons\VCFieldAbstract;

/**
 * Visual composer Number field class.
 */
class Number extends VCFieldAbstract {

	/**
	 * Register visual composer field.
	 *
	 * @return void
	 */
	protected function vc_integration() {
		vc_add_shortcode_param( 'number' , array( $this, 'number_field_output' ) );
	}

	/**
	 * Visual composer field output.
	 *
	 * @param  array  $settings VC Field settings.
	 * @param  string $value    VC Field value.
	 *
	 * @return field output
	 */
	public function number_field_output( $settings, $value ) {
		$dependency = vc_generate_dependencies_attributes( $settings );
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$min = isset( $settings['min'] ) ? $settings['min'] : '';
		$max = isset( $settings['max'] ) ? $settings['max'] : '';
		$output = '<input
					type="number"
					min="' . esc_attr( $min ) . '"
					max="' . esc_attr( $max ) . '"
					class="wpb_vc_param_value wpb-number-input"
					name="' . esc_attr( $param_name ) . '"
					value="' . esc_attr( $value ) . '"
					/>';
		return $output;
	}
}
