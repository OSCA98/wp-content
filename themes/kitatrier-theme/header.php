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
					'walker' => new AWP_Menu_Walker(),
				)
			);

			?>
			<script>
				// Der Code wird ausgeführt, sobald die Seite geladen wurde
				document.addEventListener("DOMContentLoaded", function () {

					var submenu = document.getElementById('sub-menu1');
					var submenu_ul = submenu.querySelectorAll(".sub-menu");

					submenu_ul.forEach(submenu_ul_each => {
						var current_erhalten = false;
						var submenu_ul_li = submenu_ul_each.querySelectorAll(".menu-item");

						submenu_ul_li.forEach(submenu_ul_li => {
							if (submenu_ul_li.classList.contains('current-menu-item')) {
								//var element = submenu_ul_li;
								//element.parentNode.remove();
								//alert(submenu_ul_li.classList);
								current_erhalten = true;
							}
						});
						if (!current_erhalten) {
							submenu_ul_each.remove();
						}
					});

					if (submenu.textContent.trim() === '') {
						//alert('leer');
						submenu.remove();
					}
				});
			</script>





		</div>
	</header>