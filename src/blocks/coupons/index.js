import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import './style.css';

registerBlockType( 'test-woo-extensibility/coupons', {
	edit: Edit,
	save: () => null,
} );
