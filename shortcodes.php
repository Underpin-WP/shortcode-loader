<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $file ) {
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Shortcode_Instance.php' );
		Underpin\underpin()->get( $file )->loaders()->add( 'shortcodes', [
			'instance' => 'Underpin_Shortcodes\Abstracts\Shortcode',
			'default'  => 'Underpin_Shortcodes\Factories\Shortcode_Instance',
		] );
} );