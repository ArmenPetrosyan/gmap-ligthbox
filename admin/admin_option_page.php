<?php 

global $plugin_name;
$plugin_name= 'Google Maps in Lightbox';

add_action( 'admin_menu', 'gmap_admin_page');

function gmap_admin_page(){
	global $plugin_name;
	add_menu_page( $plugin_name, $plugin_name, 'manage_options', 'gmap_menu','gmap_create_menu',plugin_dir_url(__FILE__).'map35.png');
}

function gmap_create_menu(){

	wp_enqueue_style( 'gmap_option_style', plugin_dir_url(__FILE__).'css/admin_option_page.css');
	wp_enqueue_script( 'gmap_option_script', plugin_dir_url(__FILE__).'js/admin_option_page.js',array('gmap'));
	?>
		<h2>Создать маркер</h2>
		<div class="map-preview"></div>
		<form>
			<input type='text' name='title' placeholder='Title'>
			<input type='text' name='lat' placeholder='Lattitude'>
			<input type='text' name='long' placeholder='Longitude'>
			<button id='btn' name='add_item'>Добавить маркер</button>
		</form>
	<?php
}