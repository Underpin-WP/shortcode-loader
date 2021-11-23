<?php
/**
 * Registers a shortcode
 *
 * @since   1.0.0
 * @package Underpin\Abstracts
 */


namespace Underpin\Shortcodes\Abstracts;

use Underpin\Loaders\Logger;
use Underpin\Traits\Feature_Extension;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Shortcode
 *
 * @since   1.0.0
 * @package Underpin\Abstracts
 */
abstract class Shortcode {
	use Feature_Extension;

	/**
	 * The shortcode attributes, parsed by shortcode atts.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	protected $atts = [];

	/**
	 * The default shortcode att values.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	protected $defaults = [];

	/**
	 * The name of this shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $shortcode;

	/**
	 * The actions this shortcode should take when called.
	 *
	 * @since 1.0.0
	 * @param array $atts Parsed shortcode attributes.
	 *
	 * @return mixed The shortcode action result.
	 */
	public abstract function shortcode_actions( $atts );

	/**
	 * @inheritDoc
	 */
	public function do_actions() {
		add_shortcode( $this->shortcode, [ $this, 'shortcode' ] );

		Logger::log(
			'notice',
			'shortcode_added',
			'A shortcode has been added',
			['ref' => $this->shortcode]
		);
	}

	/**
	 * The actual shortcode callback. Sets shortcode atts to the class so other methods can access the arguments.
	 *
	 * @since 1.0.0
	 *
	 * @param array $atts The shortcode attributes
	 * @return mixed The shortcode action result.
	 */
	public function shortcode( $atts ) {
		$atts = shortcode_atts( $this->defaults, $atts );

		return $this->shortcode_actions( $atts );
	}

	public function __get( $key ) {
		if ( isset( $this->$key ) ) {
			return $this->$key;
		} else {
			return new \WP_Error( 'post_template_param_not_set', 'The batch task key ' . $key . ' could not be found.' );
		}
	}

}