<?php 

global $wpdb;

/*
 *
 *
 *
 */

class GmapDB{
	global $wpdb;
	var dataTable = $wpdb->prefix.'gmap_data';

	/*
	 *
	 *
	 *
	 */
	function getCoordinates(){
		global $wpdb;

		$res = $wpdb->get_results(
			// select statetment
		);

		return $res;
	}
	
	/*
	 *
	 *
	 *
	 */
	function addCoordinate($title, $lattitude, $longitude){
		global $wpdb;
		
		$res = $wpdb->query(
			// insert statetment
		);

		return $res;
	}
}