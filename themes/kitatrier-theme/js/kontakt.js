/**
 * Renderfunction
 */
const renderKontaktblock = () => {
	const el = window.wp.element.createElement;
	const { registerBlockType } = window.wp.blocks;
	const { RichText } = window.wp.blockEditor;

	registerBlockType('my/kontakt', {
		title: 'Kontakt',
		icon: 'editor-insertmore',
		category: 'layout',
		attributes: {
			listItems: {
				type: 'array',
				default: [], // Initialize the listItems attribute as an empty array
			},
		},
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

		// Filter out empty list items before saving
		const filteredListItems = atts.listItems.filter(item => item !== '');

		return el('ul', { className: 'kontakt' }, filteredListItems.map(item => el('li', null, item)));
	}
};

renderKontaktblock();
