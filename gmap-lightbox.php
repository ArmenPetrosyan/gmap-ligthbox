<?php 
/*
	Plugin name: Google Map in Lightbox
	Version: 0.1beta
	Description: Плагин для вывода карт Google во всплывающем окне
	Author: Armen Petrosyan
	Author URI: http://vk.com/armen_petrosyan
	License: GPLv2 or later
*/

	// require_once(dirname(__FILE__).'gmap-db.php');

	register_activation_hook(__FILE__,'gmap_activation');
	register_deactivation_hook(__FILE__,'gmap_deactivation');
	wp_enqueue_script('gmap','//maps.googleapis.com/maps/api/js?v=3.exp');
	wp_enqueue_script('gmapEngine',plugin_dir_url(__FILE__).'js/maps.engine.js');

	global $wpdb;
	$table = 'gmap_data';

	function gmap_builder(){
		global $wpdb,$table;

		$res = $wpdb->query(
			"CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.$table."(id INT AUTO_INCREMENT, title TEXT, longitude DOUBLE NOT NULL, lattitude DOUBLE NOT NULL, PRIMARY KEY(id))"
		);

		// $test = GmapDB::getCoordinates();

		// print_r($test);
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