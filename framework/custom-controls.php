<?php
/*-----------------------------------------------------------------------------------*/

    /* This file contains custom control classes for the theme customizer */
    /* WARNING: Do not change anything in here or things will quickly break */

/*-----------------------------------------------------------------------------------*/


    // Create Custom Textarea Control Type
    class Milk_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() {
            ?>
            <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
            </label>
            
            <?php

        }

    } // end textarea class

    // Create Custom Slider Control Type
    class Milk_Customize_Slider_Control extends WP_Customize_Control {

        public $type = 'slider';

        // enqueue the needed scripts
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-slider' );
        }

        // render the control
        public function render_content() { ?>
            
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input style="width: 13%; margin-right: 3%; float: left; text-align: center;" type="text" id="input_<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>/>
            </label>
            <div style="width: 80%; margin-top: 6px; float: left;" id="slider_<?php echo esc_attr($this->id); ?>" class="control_slider"
                    data-min="<?php echo esc_attr($this->choices['min']); ?>"
                    data-max="<?php echo esc_attr($this->choices['max']); ?>"
                    data-step="<?php echo esc_attr($this->choices['step']); ?>"
                    data-value="<?php echo esc_attr($this->value()); ?>"
                    data-input-id="<?php echo esc_attr($this->id); ?>"></div>
        <script>
            jQuery(document).ready(function($) {
                $( "#slider_<?php echo esc_attr($this->id); ?>" ).slider({
                    value: <?php echo esc_attr(is_numeric($this->value()) ? $this->value() : 0); ?>,
                    min: <?php echo esc_attr($this->choices['min']); ?>,
                    max: <?php echo esc_attr($this->choices['max']); ?>,
                    step: <?php echo esc_attr($this->choices['step']); ?>,
                    slide: function( event, ui ) {
                        $( "#input_<?php echo esc_attr($this->id); ?>" ).val(ui.value).keyup();
                    }
                });
                $( "#input_<?php echo esc_attr($this->id); ?>" ).val( $( "#slider_<?php echo esc_attr($this->id); ?>" ).slider( "value" ) );
            });
            </script>
            <?php

        } // end render content

    } // end slider class
?>