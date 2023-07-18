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
	//footer anpassen
	document.addEventListener("DOMContentLoaded", function () {

		// Selektiere die ersten li von den jeweiligen untermenüs
		var listItems = document.querySelectorAll('footer div.menu ul > li > ul >li:first-child');

		listItems.forEach(function (item) {
			// Überprüfe, ob ein über-übergeordnetes Element existiert
			if (item.parentNode.parentNode) {
				var grandparentElement = item.parentNode.parentNode;
				//console.log('ELTERN: ',grandparentElement);
				//console.log(grandparentElement.firstChild,'-------------',item.firstChild);

				// Ersetze Obermenü <a> href, mit dem ersten Untermenü <a> href
				grandparentElement.firstChild.setAttribute('href', item.firstChild.getAttribute('href'));
			}
		});
	});

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

</html>