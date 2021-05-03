<?php

namespace Underpin_Shortcodes\Factories;

use Underpin\Traits\Instance_Setter;
use Underpin_Shortcodes\Abstracts\Shortcode;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Shortcode_Instance extends Shortcode {

	use Instance_Setter;

	protected $shortcode_actions_callback;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

	public function shortcode_actions( $atts ) {
		return $this->set_callable( $this->shortcode_actions_callback, $atts );
	}

}