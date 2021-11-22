<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observer( 'shortcodes', [
	'update' => function ( Underpin $plugin, $args ) {
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode_Instance.php' );
		$plugin->loaders()->add( 'shortcodes', [
			'instance' => 'Underpin_Shortcodes\Abstracts\Shortcode',
			'default'  => 'Underpin_Shortcodes\Factories\Shortcode_Instance',
		] );
	},
] ) );