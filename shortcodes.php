<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $instance ) {
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode_Instance.php' );
		$instance->loaders()->add( 'shortcodes', [
			'instance' => 'Underpin_Shortcodes\Abstracts\Shortcode',
			'default'  => 'Underpin_Shortcodes\Factories\Shortcode_Instance',
		] );
} );