<?php
/*
   Plugin Name: Make a Donation Application
   Plugin URI: http://apexglobalsolutions.com	
   Description: Used for display list of data.
   Version: 1.0
   Author: Apex Global solutions
   Author URI: http://apexglobalsolutions.com
*/
if ( ! defined( 'ABSPATH' ) ) { 
	exit; // Exit if accessed directly
}
if ( ! defined('PP_PLUGIN_BASENAME') )
	define('PP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
if ( ! defined('PP_PLUGIN_NAME') )
	define( 'PP_PLUGIN_NAME', trim( dirname(PP_PLUGIN_BASENAME ), '/' ) );
if ( ! defined( 'PP_PLUGIN_DIR' ) )
	define( 'PP_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PP_PLUGIN_NAME );
if ( ! defined( 'PP_PLUGIN_URL' ) )
	define( 'PP_PLUGIN_URL', WP_PLUGIN_URL . '/' . PP_PLUGIN_NAME );

	
add_action( 'admin_menu', 'donation_menu_items_data');

function donation_menu_items_data() {
	add_menu_page( "Make a Donation", "Make a Donation", 'manage_options', "donation_info",'application_class_data_donation', '' ,30);
	add_submenu_page("null",'Make a Donation','Make a Donation','manage_options','view_application_donation','view_donation_information');
}
function application_class_data_donation(){
	global $wpdb;
	include 'donation_listing.php';
	include 'view_donation_data.php';
}
function view_donation_information(){
	global $wpdb;
	include 'view_donation_data.php';
}

add_action("admin_init","donation_admin_enquque_scripts_information");

function donation_admin_enquque_scripts_information(){
    wp_enqueue_script('ui-sortable');
	 wp_enqueue_style('pp_custom', PP_PLUGIN_URL . '/assets/css/custom.css', false,null);
}
?>