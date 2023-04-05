<?php
/**
 * Plugin Name:     Settings
 * Description:     Nothing
 * Author:          Gendy
 */
function settings_init() {
    // register a new setting for "reading" page
    register_setting('reading', 'setting_name');

    // register a new section in the "reading" page
    add_settings_section(
        'settings_section',
        'settings Section', 'settings_section_callback',
        'reading'
    );

    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'settings_field',
        'Created By', 'settings_field_callback',
        'reading',
        'settings_section'
    );
}

/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'settings_init');

/**
 * callback functions
 */

// section content cb
function settings_section_callback() {
    echo '<p>Section Introduction.</p>';
}

// field content cb
function settings_field_callback() {
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('setting_name');
    // output the field
    ?>
    <input type="text" name="setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}
//    add_action( 'wp_footer', 'settings_field_callback' );



function displayCreate() {
    $setting = get_option('setting_name');
    echo 'This WordPress site was created by '. $setting;
}
add_action( 'wp_footer', 'displayCreate' );