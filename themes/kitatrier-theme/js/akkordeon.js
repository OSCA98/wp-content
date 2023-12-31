/**
 * Renderfunction
 * https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 * https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/
 */
const renderAkkordeonblock = () => {
	const el = window.wp.element.createElement;
	const { registerBlockType } = window.wp.blocks;
	const { RichText } = window.wp.blockEditor;

	registerBlockType( 'my/akkordeon', {
		title: 'Akkordeon',
		icon: 'editor-insertmore',
		category: 'layout',
		attributes: {
			header: {
				type: 'string',
				source: 'html',
				selector: '.akkordeon-header',
			},
			text: {
				type: 'string',
				source: 'html',
				selector: '.akkordeon-text',
			},
		},
		edit: myEdit,
		save: mySave,
	} );

	// what's rendered in admin
	function myEdit( props ) {
		const atts = props.attributes;
		return el('div', {
			children: [
				el( RichText, {
					tagName: 'div',
					className: 'akkordeon-header',
					value: atts.header,
					// Listener when the RichText is changed.
					onChange: ( value ) => {
						props.setAttributes( { header: value } );
					},
				}),
				/* TextSection */
				el( RichText, {
					tagName: 'p',
					className: 'akkordeon-text',
					value: atts.text,
					// Listener when the RichText is changed.
					onChange: ( value ) => {
						props.setAttributes( { text: value } );
					},
				})
			]
		});
	}

	// what's saved in database and rendered in frontend
	function mySave( props ) {
		const atts = props.attributes;
		return el( 'div', {
			children: [
				el(RichText.Content, {
					tagName: 'div',
					className: 'akkordeon-header',
					value: atts.header,
				}),
				el(RichText.Content, {
					tagName: 'p',
					className: 'akkordeon-text',
					value: atts.text,
				})
			]
		})
	}
};

//Invoke
renderAkkordeonblock();
