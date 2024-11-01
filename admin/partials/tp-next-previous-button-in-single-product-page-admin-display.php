<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tplugins.com/shop
 * @since      1.0.0
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/admin/partials
 */

add_action('admin_menu', 'tpnpb_plugin_create_menu');

function tpnpb_plugin_create_menu() {
 
	//create new top-level menu
	add_menu_page(TPNPB_PLUGIN_MENU_NAME, TPNPB_PLUGIN_MENU_NAME, 'manage_options', 'tpnpb_plugin_settings_page', 'tpnpb_plugin_settings_page' , plugins_url('/images/tp.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_tpnpb_plugin_settings' );
    
}

function register_tpnpb_plugin_settings() {

    //register our settings
    register_setting('tpnpb-plugin-settings-group','tpnpb_activate_next_previous');
    register_setting('tpnpb-plugin-settings-group','tpnpb_activate_next_previous_mobile');
    register_setting('tpnpb-plugin-settings-group','tpnpb_label_previous');
    register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    register_setting('tpnpb-plugin-settings-group','tpnpb_buttons_position');
    register_setting('tpnpb-plugin-settings-group','tpnpb_buttons_color');
    register_setting('tpnpb-plugin-settings-group','tpnpb_buttons_border');
    register_setting('tpnpb-plugin-settings-group','tpnpb_buttons_font_size');
    register_setting('tpnpb-plugin-settings-group','tpnpb_buttons_icons');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');
    // register_setting('tpnpb-plugin-settings-group','tpnpb_label_next');

}

function tpnpb_plugin_settings_page() {

    //Settings
    $activate_next_previous        = get_option('tpnpb_activate_next_previous');
    $activate_next_previous_mobile = get_option('tpnpb_activate_next_previous_mobile');
    $buttons_position              = get_option('tpnpb_buttons_position');
    $buttons_font_size             = get_option('tpnpb_buttons_font_size');
    $buttons_icons                 = get_option('tpnpb_buttons_icons');

    //Labels
    $label_previous = get_option('tpnpb_label_previous');
    $label_next     = get_option('tpnpb_label_next');

    //Style
    $buttons_color  = get_option('tpnpb_buttons_color');
    $buttons_border = get_option('tpnpb_buttons_border');
    $custom_css     = get_option('tpnpb_custom_css');
    
    $activate_next_previous_check        = ($activate_next_previous) ? 'checked="checked"' : '';
    $activate_next_previous_mobile_check = ($activate_next_previous_mobile) ? 'checked="checked"' : '';
    $buttons_border_check                = ($buttons_border) ? 'checked="checked"' : '';

    ?>
    
    <div class="wrap tpnpb-wrap">

        <h1><?php echo TPNPB_PLUGIN_NAME; ?></h1>
        
        <form method="post" action="options.php">
            <?php settings_fields( 'tpnpb-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'tpnpb-plugin-settings-group' ); ?>

            <div id="tpnpb-tabs" class="tpglobal-tabs">
                <ul>
                    <li><a href="#tabs-1">Settings</a></li>
                    <li><a href="#tabs-2">Style</a></li>
                    <li><a href="#tabs-3">Labels</a></li>
                    <li><a href="#tabs-4">Custom css</a></li>
                    <li><a href="#tabs-7">License</a></li>
                </ul>

                <div id="tabs-1" class="tpglobal-tabs-content">

                    <div class="tpglobal-tabs-row">
                        <div class="tpglobal-tabs-row-ins">
                            <label class="tpglobal-container">Activate Next & Previous Button
                                <input type="checkbox" name="tpnpb_activate_next_previous" <?php echo esc_html($activate_next_previous_check); ?> value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label class="tpglobal-container">Activate Next & Previous Button on Mobile
                                <input type="checkbox" name="tpnpb_activate_next_previous_mobile" <?php echo esc_html($activate_next_previous_mobile_check); ?> value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div><!-- tpglobal-tabs-row -->

                    <div class="tpglobal-tabs-row">
                        <label>Buttons Position</label>
                        <?php
                            $buttons_position_options = array(
                                'top'       => 'Top',
                                'bottom'    => 'Bottom',
                                'both'      => 'Both (Top & Bottom) (PRO)',
                                'fixed'     => 'Fixed (Sticky in the middle) (PRO)',
                                'animation' => 'Fixed with Animation (Sticky in the middle) (PRO)',
                                'tooltip'   => 'Fixed with Arrows & Tooltip (Sticky in the middle) (PRO)'
                            );

                            echo tpnpb_select_asso_options('tpnpb_buttons_position',$buttons_position_options,$buttons_position,2);
                        ?>
                        <div class="tpglobal_triangle_topright_box"><div class="tpglobal_triangle_topright"><span>PRO</span></div></div>
                    </div>

                    <div class="tpglobal-tabs-row">
                        <label>Arrows Icon</label>
                        <?php
                            echo tpnpb_select_icon('tpnpb_buttons_icons',$buttons_icons);
                        ?>
                        <div class="tpglobal_triangle_topright_box"><div class="tpglobal_triangle_topright"><span>PRO</span></div></div>
                    </div>

                    <div class="tpglobal-tabs-row">
                        <div class="tpglobal-tabs-row-ins">
                            <label class="tpglobal-container">Add Product Image
                                <input type="checkbox" name="tpnpb_add_product_image" value="1" disabled>
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label>Product Image Size (in px)</label>
                            <input type="number" name="tpnpb_product_image_size" value="15" min="20" disabled>
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label class="tpglobal-container">Replace Next/Prev label with Product Name
                                <input type="checkbox" name="tpnpb_add_product_name" value="1" disabled>
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="tpglobal_triangle_topright_box"><div class="tpglobal_triangle_topright"><span>PRO</span></div></div>
                    </div><!-- tpglobal-tabs-row -->

                </div><!-- tpglobal-tabs-content -->

                <div id="tabs-2" class="tpglobal-tabs-content">

                    <div class="tpglobal-tabs-row">

                        <div class="tpglobal-tabs-row-ins">
                            <label>Buttons Color</label>
                            <input type="text" class="tp_colorpiker" name="tpnpb_buttons_color" value="<?php echo esc_html($buttons_color); ?>" >
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label>Buttons Font Size</label>
                            <input type="range" class="tp_range" name="tpnpb_buttons_font_size" id="tpnpb_buttons_font_size" value="<?php echo esc_html($buttons_font_size); ?>" min="12" ><span id="tpnpb_buttons_font_size_range_show" class="tp_range_show"></span>
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label class="tpglobal-container">Buttons Border
                                <input type="checkbox" name="tpnpb_buttons_border" <?php echo esc_html($buttons_border_check); ?> value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                    </div><!-- tpglobal-tabs-row -->

                </div><!-- tpglobal-tabs-content -->

                <div id="tabs-3" class="tpglobal-tabs-content">

                    <div class="tpglobal-tabs-row">
                        <div class="tpglobal-tabs-row-ins">
                            <label>PREVIOUS</label>
                            <input type="text" name="tpnpb_label_previous" value="<?php echo esc_html($label_previous); ?>">
                        </div>

                        <div class="tpglobal-tabs-row-ins">
                            <label>NEXT</label>
                            <input type="text" name="tpnpb_label_next" value="<?php echo esc_html($label_next); ?>">
                        </div>
                    </div><!-- tpglobal-tabs-row -->

                </div><!-- tpglobal-tabs-content -->

                <div id="tabs-4" class="tpglobal-tabs-content">
                    <div class="tpglobal-tabs-row">
                        <p>This option is for developers only! If you do not know CSS it is not recommended to change it.</p>
                        <textarea id="tpnpb_custom_css" class="tpnpb_custom_css" name="tpnpb_custom_css"><?php echo esc_html($custom_css); ?></textarea>
                        <div class="tpglobal_triangle_topright_box"><div class="tpglobal_triangle_topright"><span>PRO</span></div></div>
                    </div>
                </div>

                <div id="tabs-7" class="tpglobal-tabs-content">

                    <div class="tppdn_admin_settings_left">
                        <h2>Free Version</h2>
                        <a href="https://www.tplugins.com/product/<?php echo TPNPB_PLUGIN_SLUG; ?>/" target="_blank">Upgrade to PRO</a>
                    </div>
                
                </div><!-- tabs-7 -->

            </div><!-- tpglobal-tabs -->

            <?php submit_button(); ?>
        </form>

    </div><!-- tpnpb-wrap -->
    <?php

}

function tpnpb_select_asso_options($name,$options,$selected = false,$flag = false) {
    $i = 1;
    $select = '';
    $select .= '<select name="'.esc_attr($name).'">';
    foreach ($options as $option => $value) {

        $disabled = '';

        if($flag && $flag < $i){
            $disabled = 'disabled';
        }

        if($selected && $selected == $option){
            $select .= '<option value="'.esc_attr($option).'" selected '.$disabled.'>'.esc_attr($value).'</option>';
        }
        else{
            $select .= '<option value="'.esc_attr($option).'" '.$disabled.'>'.esc_attr($value).'</option>';
        }

        $i++;
    }
    $select .= '</select>';
    return $select;
}

function tpnpb_select_icon($name,$selected = false) {

    $icons = tpnpb_get_icons_type();

    $select = '<div class="tpnpb_select_icon">';
        foreach ($icons as $key => $value) {

            if($selected && $selected == $key){
                $checked = 'checked';
            }
            else{
                $checked = '';
            }

            $select .= '<div class="tpnpb_select_icon_row">';
                $select .= '<input type="radio" name="'.$name.'" value="'.$key.'" id="'.$name.'_'.$key.'" '.$checked.'><label for="'.$name.'_'.$key.'">'.$value.'</label>';
            $select .= '</div>';
        }
    $select .= '</div>';

    return $select;

}

function tpnpb_get_icons_type() {

    $icons = array(
        'tpnpbicon-left-dir@tpnpbicon-right-dir' => '<i class="demo-icon tpnpbicon-left-dir"></i> <i class="demo-icon tpnpbicon-right-dir"></i>',
        'tpnpbicon-left-open@tpnpbicon-right-open' => '<i class="demo-icon tpnpbicon-left-open"></i> <i class="demo-icon tpnpbicon-right-open"></i>',
        'tpnpbicon-left@tpnpbicon-right' => '<i class="demo-icon tpnpbicon-left"></i> <i class="demo-icon tpnpbicon-right"></i>',
        'tpnpbicon-left-big@tpnpbicon-right-big' => '<i class="demo-icon tpnpbicon-left-big"></i> <i class="demo-icon tpnpbicon-right-big"></i>',
        'tpnpbicon-left-circled@tpnpbicon-right-circled' => '<i class="demo-icon tpnpbicon-left-circled"></i> <i class="demo-icon tpnpbicon-right-circled"></i>',
        'tpnpbicon-left-circled2@tpnpbicon-right-circled2' => '<i class="demo-icon tpnpbicon-left-circled2"></i> <i class="demo-icon tpnpbicon-right-circled2"></i>',
        'tpnpbicon-left-circled-1@tpnpbicon-right-circled-1' => '<i class="demo-icon tpnpbicon-left-circled-1"></i> <i class="demo-icon tpnpbicon-right-circled-1"></i>',
        'tpnpbicon-left-open-1@tpnpbicon-right-open-1' => '<i class="demo-icon tpnpbicon-left-open-1"></i> <i class="demo-icon tpnpbicon-right-open-1"></i>',
        'tpnpbicon-left-open-mini@tpnpbicon-right-open-mini' => '<i class="demo-icon tpnpbicon-left-open-mini"></i> <i class="demo-icon tpnpbicon-right-open-mini"></i>',
        'tpnpbicon-left-open-big@tpnpbicon-right-open-big' => '<i class="demo-icon tpnpbicon-left-open-big"></i> <i class="demo-icon tpnpbicon-right-open-big"></i>',
        'tpnpbicon-left-open-2@tpnpbicon-right-open-2' => '<i class="demo-icon tpnpbicon-left-open-2"></i> <i class="demo-icon tpnpbicon-right-open-2"></i>',
        'tpnpbicon-left-2@tpnpbicon-right-2' => '<i class="demo-icon tpnpbicon-left-2"></i> <i class="demo-icon tpnpbicon-right-2"></i>',
        'tpnpbicon-left-outline@tpnpbicon-right-outline' => '<i class="demo-icon tpnpbicon-left-outline"></i> <i class="demo-icon tpnpbicon-right-outline"></i>',
        'tpnpbicon-left-small@tpnpbicon-right-small' => '<i class="demo-icon tpnpbicon-left-small"></i> <i class="demo-icon tpnpbicon-right-small"></i>',
        'tpnpbicon-left-3@tpnpbicon-right-3' => '<i class="demo-icon tpnpbicon-left-3"></i> <i class="demo-icon tpnpbicon-right-3"></i>',
        'tpnpbicon-left-circle@tpnpbicon-right-circle' => '<i class="demo-icon tpnpbicon-left-circle"></i> <i class="demo-icon tpnpbicon-right-circle"></i>',
        'tpnpbicon-left-open-3@tpnpbicon-right-open-3' => '<i class="demo-icon tpnpbicon-left-open-3"></i> <i class="demo-icon tpnpbicon-right-open-3"></i>',
        'tpnpbicon-left-bold-1@tpnpbicon-right-bold-1' => '<i class="demo-icon tpnpbicon-left-bold-1"></i> <i class="demo-icon tpnpbicon-right-bold-1"></i>',
        'tpnpbicon-left-fat@tpnpbicon-right-fat' => '<i class="demo-icon tpnpbicon-left-fat"></i> <i class="demo-icon tpnpbicon-right-fat"></i>',
        'tpnpbicon-left-open-4@tpnpbicon-right-open-4' => '<i class="demo-icon tpnpbicon-left-open-4"></i> <i class="demo-icon tpnpbicon-right-open-4"></i>',
        'tpnpbicon-left-4@tpnpbicon-right-4' => '<i class="demo-icon tpnpbicon-left-4"></i> <i class="demo-icon tpnpbicon-right-4"></i>',
        'tpnpbicon-left-circled-2@tpnpbicon-right-circled-2' => '<i class="demo-icon tpnpbicon-left-circled-2"></i> <i class="demo-icon tpnpbicon-right-circled-2"></i>',
        'tpnpbicon-left-open-5@tpnpbicon-right-open-5' => '<i class="demo-icon tpnpbicon-left-open-5"></i> <i class="demo-icon tpnpbicon-right-open-5"></i>',
        'tpnpbicon-left-circle-1@tpnpbicon-right-circle-1' => '<i class="demo-icon tpnpbicon-left-circle-1"></i> <i class="demo-icon tpnpbicon-right-circle-1"></i>',
        'tpnpbicon-left-1@tpnpbicon-right-1' => '<i class="demo-icon tpnpbicon-left-1"></i> <i class="demo-icon tpnpbicon-right-1"></i>',
        'tpnpbicon-left-bold@tpnpbicon-right-bold' => '<i class="demo-icon tpnpbicon-left-bold"></i> <i class="demo-icon tpnpbicon-right-bold"></i>',
        'tpnpbicon-left-thin@tpnpbicon-right-thin' => '<i class="demo-icon tpnpbicon-left-thin"></i> <i class="demo-icon tpnpbicon-right-thin"></i>'
    );

    return $icons;
}