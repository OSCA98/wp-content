<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kitatrier-theme
 */

?>

<footer>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footer-menu',
		)
	);
	?>
	<div class="topbutton" onclick="scrollToTop()">
		<img src="wp-content\themes\kitatrier-theme\assets\img\top.png">
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<script>
	//top button
	// JavaScript-Code
	function scrollToTop() {
		// Scrollt zur oberen Position der Seite
		window.scrollTo({
			top: 0,
			behavior: 'smooth' // Fügt einen animierten Übergang hinzu
		});
	}
</script>

</body>

<script script>
	const akkordeonElement = document.querySelectorAll('.akkordeon');
	console.log(akkordeonElement);
	akkordeonElement.forEach(element => {
		element.addEventListener('click', () => {

			const content = element.children[1];
			content.style.display = content.style.display === 'block' ? 'none' : 'block';
		});
	});
</script>

</html>