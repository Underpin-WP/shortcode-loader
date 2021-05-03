# Underpin Shortcode Loader

Loader That assists with registering shortcodes to a WordPress website.

## Installation

### Using Composer

`composer require underpin/shortcode-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-shortcodes/shortcodes.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new shortcodes menus as-needed.

## Example

A very basic example could look something like this.

```php
// Register shortcode
underpin()->shortcodes()->add( 'shortcode-key', [
	'shortcode'                  => 'custom-shortcode',              // Required. Shortcode name.
	'defaults'                   => [ 'foo' => 'bar' ],              // Default atts. See shortcode_atts
	'shortcode_actions_callback' => function ( $parsed_atts ) {      // Required. Shortcode action.
		return $parsed_atts['key']; // 'value'
	},

] );

// Shortcode output examples
do_shortcode( '[custom-shortcode foo="baz"]' ); // baz
do_shortcode( '[custom-shortcode]' ); // bar
```

Alternatively, you can extend `Shortcode` and reference the extended class directly, like so:

```php
underpin()->shortcodes()->add('shortcode-key','Namespace\To\Class');
```