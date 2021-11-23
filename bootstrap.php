<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observers\Loader( 'shortcodes', [
	'instance' => 'Underpin\Shortcodes\Abstracts\Shortcode',
	'default'  => 'Underpin\Shortcodes\Factories\Shortcode_Instance',
] ) );