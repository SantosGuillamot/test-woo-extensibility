/**
 * External dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

// Stores are locked to prevent 3PD usage until the API is stable.
const universalLock =
	'I acknowledge that using a private store means my plugin will inevitably break on the next store release.';

store(
	'woocommerce/add-to-cart-with-options',
	{
		state: {
			get isButtonHidden() {
				const { selectedAttributes } = getContext();
				// Hide the button if the selected variation is medium size.
				const isMediumSizeSelected = selectedAttributes.some(
					( obj ) =>
						obj.attribute === 'attribute_pa_size' &&
						obj.value === 'medium'
				);
				return isMediumSizeSelected;
			},
		},
	},
	{ lock: universalLock }
);
