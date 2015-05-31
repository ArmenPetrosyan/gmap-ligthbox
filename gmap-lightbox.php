<?php 
/*
	Plugin name: Google Map in Lightbox
	Version: 0.1beta
	Description: Плагин для вывода карт Google во всплывающем окне
	Author: Armen Petrosyan
	Author URI: http://vk.com/armen_petrosyan
	License: GPLv2 or later
*/

	register_activation_hook(__FILE__,'gmap_activation');
	register_deactivation_hook(__FILE__,'gmap_deactivation');

	global $wpdb;
	$table = 'gmap_data';

	function gmap_builder(){
		global $wpdb,$table;

		$res = $wpdb->query(
			"CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.$table."(id INT AUTO_INCREMENT, title TEXT, longitude DOUBLE NOT NULL, lattitude DOUBLE NOT NULL, PRIMARY KEY(id))"
		);

		// echo +$res." ".$wpdb->last_error;
	}

	function gmap_init(){
		if(get_option('gmap_activated')){
			add_action('init', 'gmap_builder');
		}

		if(is_admin()){
			require_once(dirname(__FILE__).'/admin/admin_option_page.php');
		}
	}

	function gmap_activation(){
		add_option('gmap_activated', true );
	}

	function gmap_deactivation(){
		delete_option('gmap_activated');
	}

	gmap_init();
?>