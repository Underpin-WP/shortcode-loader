<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observers\Loader( 'shortcodes', [
	'abstraction_class' => 'Underpin\Shortcodes\Abstracts\Shortcode',
	'default_factory'  => 'Underpin\Shortcodes\Factories\Shortcode_Instance',
] ) );