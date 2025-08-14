/**
 * WordPress dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

// Add any a new entry point by extending the webpack config.
module.exports = [
	...defaultConfig,
	{
		...defaultConfig[ 0 ],
		entry: {
			'hide-button': './src/hide-button/view.js',
		},
	},
];
