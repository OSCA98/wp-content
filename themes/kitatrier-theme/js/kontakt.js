/**
 * Renderfunction
 */
const renderKontaktblock = () => {
	const el = wp.element.createElement;
	const { registerBlockType } = wp.blocks;
	const { RichText } = wp.blockEditor;

	registerBlockType('my/kontakt', {
		title: 'Kontakt',
		icon: 'editor-insertmore',
		category: 'layout',
		attributes: {
			listItems: {
				type: 'array',
				source: 'children',
				selector: 'ul.kontakt',
			},
		},
		styles: [
			{
				name: 'default',
				label: 'Standard',
				isDefault: true,
			},
			{
				name: 'fancy',
				label: 'Fancy Style',
			},
		],
		edit: myEdit,
		save: mySave,
	});

	// What's rendered in the admin editor
	function myEdit(props) {
		const atts = props.attributes;

		const onListChange = (newList) => {
			props.setAttributes({ listItems: newList });
		};

		return el('div', {
			children: [
				el(RichText, {
					tagName: 'ul',
					className: 'kontakt',
					multiline: 'li',
					value: atts.listItems,
					onChange: onListChange,
				}),
			],
		});
	}

	// What's saved in the database and rendered on the frontend
	function mySave(props) {
		const atts = props.attributes;

		return el('ul', { className: 'kontakt' }, atts.listItems.map(item => el('li', null, item)));
	}
};

// Invoke the render function
wp.domReady(() => {
  renderKontaktblock();
});
