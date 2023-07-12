<?php
/**
 * kitatrier-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kitatrier-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/****************************************************
 * Selbst erstellte Funktionen
 ****************************************************/

/*
 * Weiterleiten zum ersten Kindseite
 */
function weiterleitung_zum_ersten_kindseite()
{
	global $post;
	// Überprüfe, ob die Seite ein Elternelement hat
	/*if ($post->post_parent !== 0) {
																															   return;
																														   }*/

	// Überprüfe, ob die Seite über Unterseiten verfügt, Argument child_of' => $post->ID, gibt true oder false zurück
	$child_pages = get_pages(
		array(
			'child_of' => $post->ID,
			// Suche nach Unterseiten der aktuellen Seite
			'post_status' => 'publish',
			// Suche nur nach veröffentlichten Seiten
			'sort_column' => 'menu_order',
			// Sortiere nach Reihenfolge
			'post_type' => 'page',
			'numberposts' => 1 // Suche nach maximal einer Unterseite
		)
	);

	if (!empty($child_pages)) {
		// Weiterleitung zur ersten Unterseite
		$first_child_url = get_permalink($child_pages[0]->ID); // Hole die Permalink-URL der ersten Unterseite
		wp_redirect($first_child_url); // Weiterleitung zur ersten Unterseite
		exit; // Beende die Ausführung des Skripts
	}
}
//add_action('template_redirect','weiterleitung_zum_ersten_kindseite');

function erzeuge_menu()
{
	// Wurzelseite
	$root_page = get_option('Home');

	// Ausgabe der übergeordneten Seiten
	if (!empty($ancestors)) {
		echo "<br>Elternseiten: ";
		foreach ($ancestors as $ancestor_id) {
			$ancestor = get_post($ancestor_id);
			echo $ancestor->post_title . " > ";
		}
	}

	// Für Menü styling(aktuelle Seite)
	$current_page = get_queried_object();
	$ancestors = get_post_ancestors($current_page->ID);

	// Ausgabe der aktuellen Seite
	//echo "Aktuelle Seite: " . $current_page->post_title;
	$parent_page_id = null;
	$parent_page = null;
	// Ausgabe der übergeordneten Seite, wenn vorhanden
	if (!empty($ancestors)) {
		$parent_page_id = end($ancestors);
		$parent_page = get_post($parent_page_id);

		//echo "<br>Elternseite: " . $parent_page->post_title;
	}

	// Überprüfen, ob die Wurzelseite gültig ist
	if ($root_page) {
		// Kinderseiten der Wurzelseite
		$child_pages = get_children(
			array(
				'child_of' => $root_page,
				'post_status' => 'publish',
				'orderby' => 'menu_order',
				'post_type' => 'page',
				'depth' => 1 // Begrenzung auf direkte Unterseiten
			)
		);

		// Überprüfe, ob es Kinderseiten gibt
		if ($child_pages) {
			// Umkehren der Reihenfolge der Kinderseiten
			$child_pages = array_reverse($child_pages);

			// Ausgabe der Links der Kinderseiten
			echo '<ul>';
			foreach ($child_pages as $child_page) {
				if ($child_page->post_title !== "Impressum" && $child_page->post_title !== "Datenschutz") {
					$child_page_link = get_permalink($child_page->ID);
					$child_page_title = $child_page->post_title;

					//echo $parent_page->post_title.'-----'.$child_page->post_title.'<br>';
					if (!empty($ancestors) && $parent_page->post_title === $child_page->post_title) {
						echo '<li><a class="activeMenu" href="' . $child_page_link . '">' . $child_page_title . '</a></li>';
					} elseif ($current_page->ID === $child_page->ID) {
						echo '<li><a class="activeMenu" href="' . $child_page_link . '">' . $child_page_title . '</a></li>';
					} else {
						echo '<li><a href="' . $child_page_link . '">' . $child_page_title . '</a></li>';
					}

				}
			}
			echo '</ul>';

		}
	}
}

function erzeuge_untermenu()
{
	global $post;
	$parent_id = $post->post_parent;

	if ($parent_id) {
		$parent = get_post($parent_id);
		$grandparent = $parent->post_parent;
		//echo $grandparent;

		// Für Menü styling(aktuelle Seite)
		$current_page = get_queried_object();

		if ($grandparent == false) { // Überprüfe, ob die Wurzelseite Großeltern sind
			$subpages = get_children(
				array(
					'post_parent' => $parent_id,
					'post_type' => 'page',
					'orderby' => 'menu_order',
					'order' => 'ASC',
				)
			);

			if ($subpages) {
				echo '<ul>';

				foreach ($subpages as $subpage) {
					if ($current_page->ID===$subpage->ID) {
						echo '<li><a class="activeSubMenu" href="' . get_permalink($subpage->ID) . '">' . $subpage->post_title . '</a></li>';
					} else {
						echo '<li><a href="' . get_permalink($subpage->ID) . '">' . $subpage->post_title . '</a></li>';
					}

				}

				echo '</ul>';
			}
		}
	}
}
function erzeuge_footer()
{
	// Wurzelseite
	$root_page = get_option('Home');

	// Überprüfen, ob die Wurzelseite gültig ist
	if ($root_page) {
		// Anzahl aller Seiten, wichtig für html gestaltung
		$anzahl = 0;
		$child_pages_Anzahl = get_pages();
		$anzahl += count($child_pages_Anzahl);

		// Es existieren 3 Spalten
		$anzahl_1durch3 = (int) ($anzahl / 3);
		//echo (int)$anzahl_1durch3;

		/*echo $anzahl.'<br>';
															  foreach($child_pages_Anzahl as $k){
																  echo $k->post_title.'<br>';
															  }*/

		// Kinderseiten der Wurzelseite
		$child_pages = get_children(
			array(
				'child_of' => $root_page,
				'post_status' => 'publish',
				'orderby' => 'menu_order',
				'post_type' => 'page',
				'depth' => 1 // Begrenzung auf direkte Unterseiten
			)
		);
		// div-blöcke um die Seiten
		$divCount = 0;
		// Überprüfe, ob es Kinderseiten gibt
		if ($child_pages) {
			// Umkehren der Reihenfolge der Kinderseiten
			$child_pages = array_reverse($child_pages);

			// Ausgabe der Links der Kinderseiten
			echo '<div>';
			echo '<ul>';
			foreach ($child_pages as $child_page) {
				$divCount++;
				echo '<li>';
				$child_page_link = get_permalink($child_page->ID);
				$child_page_title = $child_page->post_title;
				echo '<a href="' . $child_page_link . '">' . $child_page_title . '</a>';

				// Jeweilige dazugehörige Unterseiten
				$subpages = get_children(
					array(
						'post_parent' => $child_page->ID,
						'post_type' => 'page',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					)
				);


				if ($subpages) {
					echo '<ul>';
					foreach ($subpages as $subpage) {
						$divCount++;
						echo '<li><a href="' . get_permalink($subpage->ID) . '">' . $subpage->post_title . '</a></li>';
					}
					echo '</ul>';
					if ($divCount >= $anzahl_1durch3) {
						echo '</ul>';
						echo '</div>';
						echo '<div>';
						echo '<ul>';
						$divCount = 0;
					}
				}
				echo '</li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}
}


function erzeuge_html_pdf_inhalt()
{
	// Abhängig vom Namen

	// Hole die ID des aktuellen Beitrags
	$post_id = get_the_ID();

	// Rufe die individuellen Felder des Beitrags ab
	$meta_fields = get_post_meta($post_id);
	// natsort sortiert nummerisch, ksort nach keys
	ksort($meta_fields);
	$liste_html_inhalt = array();

	// Durchlaufe die individuellen Felder und füge die passenden HTML-Ausgaben in $liste_html_inhalt hinzu
	foreach ($meta_fields as $key => $values) {
		//echo $key;
		//echo '<br>--------------------<br>';
		foreach ($values as $value) {
			if (preg_match('/^[0-9] Download/', $key)) {
				// Erzeuge link
				if (preg_match('/\(link:.*\)\{.*\}/', $value)) {
					$ziel = '/\(link:(.*)\)\{(.*)\}/';
					$ersetzen = '<a href="$1" class="download" target="_blank">$2</a>';

					$value = preg_replace($ziel, $ersetzen, $value);
					//echo '<br>-------------<br>';
					//echo $temp2;
					//echo '<br>-------------';
					//echo '\n'.$value;
				}
				array_push($liste_html_inhalt, '<p>' . $value . '</p>');
			}

		}
	}

	// Gebe Array per echo aus
	foreach ($liste_html_inhalt as $key => $html) {
		//echo $key;
		echo $html;
		//echo '------------------------------------<br>';
	}
}

/*Erzeuge globle variabeln*/
function kita_info()
{
	// Frage Media-Daten ab
	$media_query = new WP_Query(
		array(
			'post_type' => 'attachment',
			'post_status' => 'inherit',
			'posts_per_page' => -1,
		)
	);
	$listMedia = array();
	foreach ($media_query->posts as $post2) {
		$listMedia[] = wp_get_attachment_url($post2->ID);
	}
	global $logo;
	$matchLogo = '/.*KitaLogo\.png$/';

	global $schneidershof;
	$matchSchneidershof = '/.*Schneidershof\.txt$/';

	global $imTreff;
	$imTreffMatch = '/.*ImTreff\.txt$/';

	foreach ($listMedia as $ele) {
		//echo $ele;
		if (preg_match($matchLogo, $ele, $matches)) {
			$logo = $matches[0];
		} elseif (preg_match($matchSchneidershof, $ele, $matches)) {
			$schneidershof = $matches[0];
		} elseif (preg_match($imTreffMatch, $ele, $matches)) {
			$imTreff = $matches[0];
		}
		//echo '<br>---------------------<br>';
	}
	//echo $logo . '<br>';
	//echo $schneidershof . '<br>';
	//echo $imTreff . '<br>';

}
add_action('init', 'kita_info');

function erzeuge_Kitainfo($input_string)
{
	if ($input_string == true) {
		$url = $input_string;
		$input = file_get_contents($url);

		$head = true;
		echo '<b>';
		for ($i = 0; $i < strlen($input); $i++) {

			if (ord($input[$i]) == 13) {
				echo '<br>';
				if ($head) {
					echo '</b>';
					$head = false;
				}
			} else {
				echo $input[$i];
			}
		}
	}
}
/**
 * Ende Eigene Funktionen
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kitatrier_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kitatrier-theme, use a find and replace
		* to change 'kitatrier-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kitatrier-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kitatrier-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kitatrier_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kitatrier_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kitatrier_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kitatrier_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'kitatrier_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kitatrier_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kitatrier-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kitatrier-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kitatrier_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kitatrier_theme_scripts() {
	wp_enqueue_style( 'kitatrier-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kitatrier-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kitatrier-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kitatrier_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

