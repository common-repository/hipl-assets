<?php 
/*
	Plugin Name:  HIPL Assets
	Plugin URI: https://www.helpfulinsightsolution.com/
	Description: Handle the basics with this plugin.
	Tags: editor, posts, post types
	Author: saini9460
	Author URI: https://www.helpfulinsightsolution.com/
	Donate link: https://www.helpfulinsightsolution.com/
	Requires at least: 4.9
	Tested up to: 6.0
	Version: 1.0
	Requires PHP: 5.6.20
	Text Domain: hipl
	Domain Path: /languages
	License: GPL v2 or later
*/

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 
	2 of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
*/

if (!defined('ABSPATH')) die();

if (!class_exists('HiplAssets')) {

    class HiplAssets {

        function __construct() {
			
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'hipl_assets_add_action_links'), 10, 2);
			
			add_action('admin_menu', array($this, 'hipl_assets_menu'));
			
		}

        function hipl_assets_menu(){
            add_menu_page( 
                'HIPL',
                'HIPL',
                'manage_options',
                'hipl_assets',
                array( __CLASS__, 'hipl_assets' ),
                plugin_dir_url(__FILE__).'/assets/images/icon.png',
                6
            );
        }

        function hipl_assets_add_action_links ( $actions ) {
            $mylinks = array(
               '<a href="' . admin_url( 'admin.php?page=hipl_assets' ) . '">Settings</a>',
               '<a href="https://helpfulinsightsolution.com" target="_blank"><strong style="color: #11967A; display: inline;">Helpful Insight Pvt. Ltd.</strong></a>',
            );
            $actions = array_merge( $actions, $mylinks );
            return $actions;
        }

        function hipl_assets(){
            // esc_html_e('Hello, This is a plugin just for introduction.', 'hipl');
            include_once 'inc/hipl-assets-settings.php';
        }

    }

    global $HiplAssets;

    $HiplAssets = new HiplAssets();
	
}