<?php
/**
 * Visual composer media selector field.
 *
 * @package visual-composer-addons
 * @author  Mehdi Lahlou <mehdi.lahlou@free.fr>
 * @since   1.0.0
 */

namespace MedFreeman\WP\VisualComposerAddons\Fields;

use MedFreeman\WP\VisualComposerAddons\VCFieldAbstract;

/**
 * Visual composer Media selector field class.
 */
class MediaSelector extends VCFieldAbstract {

	/**
	 * Register visual composer field.
	 *
	 * @return void
	 */
	protected function vc_integration() {
		vc_add_shortcode_param( 'media' , array( $this, 'media_field_output' ), VCADDONS_URL . '/assets/js/src/Fields/admin-media-selector2.js' );
	}

	/**
	 * Visual composer field output.
	 *
	 * @param  array  $settings VC Field settings.
	 * @param  string $value    VC Field value.
	 *
	 * @return field output
	 */
	public function media_field_output( $settings, $value ) {
		$dependency = vc_generate_dependencies_attributes( $settings );
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$mime = isset( $settings['mime'] ) ? $settings['mime'] : '';
		if ( is_array( $mime ) ) {
			$mime = implode( ',', $mime );
		}
		$output = '<button type="button" class="button wpb-media-input-button" data-mime-type="' . esc_attr( $mime ) . '" style="float:right; margin-top: 3px;">Browse Media</button>';
		$output .= '<input
					type="text"
					class="wpb-media-input-field"
					value="' . esc_attr( wp_get_attachment_url( $value ) ) . '"
					style="width: calc(100% - 125px);"
					/>';
		$output .= '<input
			type="hidden"
			class="wpb_vc_param_value wpb-media-id-field"
			name="' . esc_attr( $param_name ) . '"
			value="' . esc_attr( $value ) . '"
			/>';

		return $output;
	}
}
