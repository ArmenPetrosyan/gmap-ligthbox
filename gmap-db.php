<?php 

global $wpdb;

/*
 * Класс для работы с базой данных
 */

class GmapDB{
	global $wpdb;

	
	var dataTable = $wpdb->prefix.'gmap_data';

	/*
	 * Возвращает список координат отмеченных на карте
	 */
	function getCoordinates(){
		global $wpdb;

		$res = $wpdb->get_results(
			"SELECT * FROM $this->dataTable"
		);

		return $res;
	}
	
	/*
	 * Добавляет координаты в таблицу
	 */
	function addCoordinate($title, $lattitude, $longitude){
		global $wpdb;
		
		$res = $wpdb->query(
			$wpdb->prepare(
				"INSERT INTO $this->dataTable (title, lattitude, longitude) VALUES (%s, %d, %d)",
				array($title, $lattitude, $longitude)
			);
		);

		return $res;
	}
}