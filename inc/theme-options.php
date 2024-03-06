<?php
// Add theme options page under Appearance
add_action('admin_menu', function() {
    add_theme_page('AjaxinWP Options', 'AjaxinWP Options', 'manage_options', 'ajaxinwp-options', 'ajaxinwp_options_page');
});

// Register settings
add_action('admin_init', function() {
    register_setting('ajaxinwp-options-group', 'ajaxinwp_setting');
});

function ajaxinwp_options_page() {
?>
<div class="wrap">
    <h2>AjaxinWP Theme Options</h2>
    <form method="post" action="options.php">
        <?php settings_fields('ajaxinwp-options-group'); ?>
        <?php do_settings_sections('ajaxinwp-options-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Custom Setting</th>
                <td><input type="text" name="ajaxinwp_setting" value="<?php echo esc_attr(get_option('ajaxinwp_setting')); ?>" /></td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
</div>
<?php
}
