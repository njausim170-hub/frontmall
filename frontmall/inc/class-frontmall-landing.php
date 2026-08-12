<?php
/**
 * Frontmall Landing Pages.
 *
 * Keeps the sales-funnel landing template (page-frontmall-lp.php) and its
 * self-hosted hero images (/lp-images/) a PERMANENT part of the theme, so a
 * theme update no longer drops them. Both now ship inside the theme package;
 * there is nothing to upload by hand.
 *
 * On theme activation this class also re-attaches the "Frontmall Landing Page"
 * template to any existing funnel page that lost its template assignment during
 * an update. It NEVER creates, publishes or deletes pages on its own - it only
 * repairs pages the admin already made.
 *
 * @package Frontmall
 */

namespace Frontmall;

defined( 'ABSPATH' ) || exit;

final class Landing {

	private static ?Landing $instance = null;

	/** Landing template file, relative to the theme root. */
	private const TEMPLATE = 'page-frontmall-lp.php';

	/** Funnel page slugs powered by the landing template (see fmlp_funnels()). */
	private const FUNNEL_SLUGS = array(
		'lp-egg-incubators',
		'lp-car-wash',
		'lp-demolition-breakers',
		'lp-water-pumps',
		'lp-welding-machines',
		'lp-vacuum-cleaners',
	);

	public static function instance(): Landing {
		return self::$instance ??= new self();
	}

	private function __construct() {
		// Guarantee the template is always offered in the page editor, even if
		// template auto-discovery is ever disabled or cached.
		add_filter( 'theme_page_templates', array( $this, 'register_template' ) );

		// After a theme switch/update, repair funnel pages that lost the template.
		add_action( 'after_switch_theme', array( $this, 'heal_funnel_pages' ) );
	}

	/**
	 * Ensure "Frontmall Landing Page" is listed as an assignable page template.
	 *
	 * @param array<string,string> $templates Existing page templates.
	 * @return array<string,string>
	 */
	public function register_template( array $templates ): array {
		$templates[ self::TEMPLATE ] = __( 'Frontmall Landing Page', 'frontmall' );
		return $templates;
	}

	/**
	 * Re-attach the landing template to existing funnel pages after an update.
	 *
	 * Only touches pages that already exist at a known funnel slug and whose
	 * template has drifted away from the landing template. It does not create
	 * new pages, so an admin who runs only some funnels keeps full control.
	 */
	public function heal_funnel_pages(): void {
		foreach ( self::FUNNEL_SLUGS as $slug ) {
			$page = get_page_by_path( $slug );
			if ( \! $page instanceof \WP_Post || 'page' \!== $page->post_type ) {
				continue;
			}
			$current = (string) get_post_meta( $page->ID, '_wp_page_template', true );
			if ( self::TEMPLATE \!== $current ) {
				update_post_meta( $page->ID, '_wp_page_template', self::TEMPLATE );
			}
		}
	}
}
