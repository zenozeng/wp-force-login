<?php
/*
  Plugin Name: WP Super Force Login
  Plugin URI: https://github.com/zenozeng/wp-force-login
  Description: Force Login
  Author: Zeno Zeng
  Version: 0.0.4
  Author URI: http://zenozeng.com/

  Copyright (C) 2013-2016 Zeno Zeng

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
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function force_login() {
  
    if (( $GLOBALS['pagenow'] === 'wp-login.php' ) || ( $GLOBALS['pagenow'] === 'xmlrpc.php' )) {
        $_GET = array();
        $tmp = array();
        $tmp['log'] = $_POST['log'];
        $tmp['pwd'] = $_POST['pwd'];
        $tmp['wp-submit'] = $_POST['wp-submit'];
        $tmp['redirect_to'] = $_POST['redirect_to'];
        $tmp['testcookie'] = $_POST['testcookie'];
        $_POST = $tmp;
        return;
    }
    
    if ( !is_user_logged_in() ) {
        header('Location: '.wp_login_url());
        exit;
    }
}

add_action('init', 'force_login', 1);
