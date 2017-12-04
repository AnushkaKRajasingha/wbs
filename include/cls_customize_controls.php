<?php
/**
 * Created by Anushka K R.
 * Dev. Ref: http://www.anushkar.com
 * Dev. Public Profile: https://www.upwork.com/fl/anushkakrajasingha
 * Date: 12/2/2017
 * Time: 1:36 AM
 */
/**
 * Range-based sliding value picker for Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
class Wbs_Range_Option extends WP_Customize_Control {
    public $type = 'range';

    public function render_content() {
        ?>
        <label>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
            <input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> data-reset_value="<?php echo esc_attr( $this->setting->default ); ?>" />
            <input type="number" <?php $this->input_attrs(); ?> class="et-pb-range-input" value="<?php echo esc_attr( $this->value() ); ?>" />
            <span class="et_divi_reset_slider"></span>
        </label>
    <?php
    }
}

class Wbs_Select_Option extends WP_Customize_Control {
    public $type = 'select';

    public function render_content() {
        ?>
        <label>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>

            <select <?php $this->link(); ?>>
                <?php
                foreach ( $this->choices as $value => $attributes ) {
                    $data_output = '';

                    if ( ! empty( $attributes['data'] ) ) {
                        foreach( $attributes['data'] as $data_name => $data_value ) {
                            if ( '' !== $data_value ) {
                                $data_output .= sprintf( ' data-%1$s="%2$s"',
                                    esc_attr( $data_name ),
                                    esc_attr( $data_value )
                                );
                            }
                        }
                    }

                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . $data_output . '>' . esc_html( $attributes['label'] ) . '</option>';
                }
                ?>
            </select>
        </label>
    <?php
    }
}
}