<?php
/*
 * Basic Section
 */
?>

<?php if ( 'wptut_field-example1' == $field['label_for'] ) : ?>

	<input id="<?php esc_attr_e( 'wptut_settings[basic][field-example1]' ); ?>" name="<?php esc_attr_e( 'wptut_settings[basic][field-example1]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['basic']['field-example1'] ); ?>" />
	<span class="example"> Example value</span>

<?php endif; ?>


<?php
/*
 * Advanced Section
 */
?>

<?php if ( 'wptut_field-example2' == $field['label_for'] ) : ?>

	<textarea id="<?php esc_attr_e( 'wptut_settings[advanced][field-example2]' ); ?>" name="<?php esc_attr_e( 'wptut_settings[advanced][field-example2]' ); ?>" class="large-text"><?php echo esc_textarea( $settings['advanced']['field-example2'] ); ?></textarea>
	<p class="description">This is an example of a longer explanation.</p>

<?php elseif ( 'wptut_field-example3' == $field['label_for'] ) : ?>

	<p>Another example</p>

<?php endif; ?>
