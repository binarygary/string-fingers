<?php
/*
Plugin Name: String Fingers
Description: Chord lookup
Author:      Binary Gary
Version:     1.0
*/

require_once trailingslashit( __DIR__ ) . 'vendor/autoload.php';

// Start the core plugin
add_action( 'plugins_loaded', function () {
	string_fingers()->init();
}, 1, 0 );

function string_fingers() {
	return \String\Fingers\Core::instance( new Pimple\Container( [ 'plugin_file' => __FILE__ ] ) );
}
