	const akkordeonElement = document.querySelectorAll('.wp-block-my-akkordeon');
	akkordeonElement.forEach(element => {
		// Get the Header
		element.children[0].addEventListener('click', () => {
			// Get the body
			const content = element.children[1];
			content.style.display = content.style.display === 'block' ? 'none' : 'block';
		});
	});