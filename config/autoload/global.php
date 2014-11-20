<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
	'rdn_require_js' => array(
		'library' => '//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.10/require.min.js',

		'config' => array(
			'baseUrl' => '/modules',

			'paths' => array(
				'App' => 'app/js'
			),

			'packages' => array(
				'App'
			),
		),
	),
);
