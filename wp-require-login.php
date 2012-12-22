<?php
/*
  Plugin Name: Require Login
  Plugin URI: https://github.com/richard4339/wp-require-login
  Description: Plugin redirects users to the login page whenever they try to visit any page on the website.
  Version: 1.0.1
  Author: Richard
  Author URI: http://www.digitalxero.com
 */

/*  Copyright 2007 - 2012  RICHARD LYNSKEY (email : richard@mozor.net)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

register_uninstall_hook(__FILE__, 'rl_uninstall');
register_activation_hook(__FILE__, 'rl_activate');

function rl_uninstall() {
    delete_option('require_login');
    delete_option('require_login_first_notice');
}

function rl_activate() {
    add_option('require_login', '0');
    add_option('require_login_first_notice', '1');
}

function rl_post_install() {
    if (get_option('require_login_first_notice') == '1') {
        echo '<div class="updated"><p>Click <a href="'.get_admin_url(null, 'options-general.php?page=require_login').'">here</a> to turn on Require Login.</p></div>';
        delete_option('require_login_first_notice');
    }
}

add_action('admin_notices', 'rl_post_install');
add_action('admin_menu', 'rl_menu');

function rl_menu() {
    add_options_page('Require Login', 'Require Login', 'manage_options', 'require_login', 'require_login');
}

function require_login() {
    ?>
    <div>
        <h2><?php print __('Require Login', 'require_login'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('require_login'); ?>
            <?php do_settings_sections('require_login'); ?>

            <input type="submit" name="Submit" value="<?php _e('Update Options ?') ?>" />
        </form>
    </div>

    <?php
}

// add the admin settings and such
add_action('admin_init', 'plugin_admin_init');

function plugin_admin_init() {
    register_setting('require_login', 'require_login', 'plugin_options_validate');
    //register_setting('require_login', 'require_login');
    add_settings_section('rl_main', 'Main Options', 'rl_section_text', 'require_login');
    add_settings_field('require_login', 'Enabled?', 'rl_setting_string', 'require_login', 'rl_main');
}

function rl_section_text() {
    echo '<p>Settings for the Require Login Plugin. This option to require a login for the site is currently <b>';
    if (get_option('require_login') != '1') {
        print 'off';
    } else {
        print 'on';
    }
    print '</b>.</p>';
}

function rl_setting_string() {
    ?>
    <input name="require_login" id="rl_require_login" type="checkbox" value="1" class="code" <?php print checked(1, get_option('require_login'), false); ?> />
    <?php
}

// validate our options
function plugin_options_validate($input) {

    $newinput = trim($input);
    if (!preg_match('/^[0-1]{1}$/i', $newinput)) {
        $newinput = '0';
    }
    return $newinput;
}

function rl_redirect() {
    if (!is_user_logged_in()) {
        auth_redirect();
    }
}

if (get_option('require_login') == '1')
    add_action('get_header', 'rl_redirect');
?>
