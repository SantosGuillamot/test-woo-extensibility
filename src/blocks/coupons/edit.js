import { useBlockProps } from '@wordpress/block-editor';

const Edit = () => {
	return (
		<div { ...useBlockProps() }>
			<span>Coupons Edit</span>
		</div>
	);
};

export default Edit;
