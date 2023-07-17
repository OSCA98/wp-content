<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kitatrier-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>


	<header>
		<div id="header" class="section-wrap">
			<div class="content-wrap">
				<a href="/"><img id="logo" src="http://kitatrier2.local/wp-content/uploads/2023/07/logo.png"
						title="KITA Schneidershof" alt="KITA Schneidershof" /></a>
				<ul id="topmenu">
					<li><a href="/impressum" title="Impressum">Impressum</a></li>
					<li><a href="/datenschutz" title="Datenschutz">Datenschutz</a></li>
				</ul>
				<nav id="mobile_nav">
					<!--100vh-->
					<script>
						function openNav() {
							var div = document.getElementById("mobile_inaktiv");

							div.setAttribute("id", "mobile_aktiv");

							document.getElementById("openNav").classList.remove("openNavON");
							document.getElementById("openNav").classList.add("openNavOFF");

							document.getElementById("closeNav").classList.remove("closeNavOFF");
							document.getElementById("closeNav").classList.add("closeNavON");
						}
						function closeNav() {
							var div = document.getElementById("mobile_aktiv");

							div.setAttribute("id", "mobile_inaktiv");

							document.getElementById("openNav").classList.remove("openNavOFF");
							document.getElementById("openNav").classList.add("openNavON");

							document.getElementById("closeNav").classList.remove("closeNavON");
							document.getElementById("closeNav").classList.add("closeNavOFF");
						}
					</script>
					<a id="openNav" class="openNavON" onclick="openNav();">MENÜ</a>
					<a id="closeNav" class="closeNavOFF" onclick="closeNav();">CLOSE</a>
					<div id="mobile_inaktiv" class="mobile">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
							)
						);
						?>
					</div>
				</nav>

			</div>

		</div>
		<div class="navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
					'depth' => 1,
					// Zeige nur Menüseiten ohne Untermenüs
				)
			); ?>
		</div>
		<div class="subnavi">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id' => 'sub-menu1',

				)
			);

			?>
			<script>
				document.addEventListener("DOMContentLoaded", function () {

					var all_submenus = document.getElementById('sub-menu1');
					//var current_submenu =all_submenus.querySelectorAll(".sub-menu");

					//all_submenus=all_submenus.find(element=>element.classList.contains('current-menu-item'));
					//console.log(all_submenus.find(element=>element.classList.contains('current-menu-item')));
					//alert(all_submenus.innerHTML);
					var current_submenu;
					for (var i = 0; i < all_submenus.children.length; i++) {
						//console.log(all_submenus.children[i].classList);
						all_submenus.children[i].firstChild.remove();

						if (all_submenus.children[i].classList.contains('current-menu-item')) {
							current_submenu = all_submenus.children[i];
							break;
						}
					}
					// bezieht sich auf seiten wie Impressum, Datenschutz, usw. die nicht im Menü vorhanden sind
					if (typeof current_submenu === 'undefined') {
						//alert('impressum datenschutz');
						all_submenus.replaceWith('');
					} else {
						if (current_submenu.textContent.trim() === '') {
							//alert('leer');
							all_submenus.remove();
						}
						all_submenus.replaceWith(current_submenu);
					}
					//all_submenus.replaceWith(current_submenu);
					//console.log('current_submenu__________ ',current_submenu.innerHTML);


					/*if(element.classList.contains('current-menu-parent')){
						alert('current-menu-parent');
						//element.remove();
					}*/
				});
			</script>

		</div>
	</header>