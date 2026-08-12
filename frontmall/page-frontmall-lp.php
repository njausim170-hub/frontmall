<?php
/**
 * Template Name: Frontmall Landing Page
 *
 * ONE template powers all 6 Frontmall sales funnels. It auto-selects the
 * right funnel from the WordPress page slug (e.g. "lp-car-wash").
 *
 * PRODUCTS: each funnel shows the LATEST 6 published products in its
 * category (newest first). If the category slug does not match your store,
 * it automatically falls back to the explicit SKU list for that funnel.
 *
 * HOW TO USE
 *   1. This template ships with the theme (Frontmall theme root); do not re-upload it manually.
 *   2. The 6 hero images ship with the theme in  <theme>/lp-images/
 *        hero-lp-car-wash.jpg, hero-lp-egg-incubators.jpg,
 *        hero-lp-demolition-breakers.jpg, hero-lp-water-pumps.jpg,
 *        hero-lp-welding-machines.jpg, hero-lp-vacuum-cleaners.jpg
 *   3. Set the correct product category slug for each funnel below (the
 *      'category' value). Then create a Page per funnel, set its slug to
 *      match a key below, and set Template = "Frontmall Landing Page".
 *
 * SAFE: read-only. No writes to the database, no external calls.
 *
 * @package Frontmall
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* =========================================================================
 * 1. CONFIG  (edit these)
 * ====================================================================== */

define( 'FMLP_WA_NUMBER', '254741262053' );   // WhatsApp, international format, no +
define( 'FMLP_PHONE',     '0741262053' );      // Display / click-to-call number
define( 'FMLP_GREEN',     '#1a9c4c' );         // Brand green
define( 'FMLP_ORANGE',    '#f47a1f' );         // Brand orange
define( 'FMLP_PER_PAGE',  6 );                 // How many products to show per funnel

/**
 * Funnel definitions, keyed by page slug.
 *   'category' = the WooCommerce product category SLUG to pull the latest
 *                6 products from. Find it in Products > Categories (Slug col).
 *   'skus'     = fallback list used only if the category returns nothing.
 */
function fmlp_funnels() {
	return array(

		'lp-egg-incubators' => array(
			'eyebrow'    => 'Hatch More. Lose Fewer.',
			'headline'   => 'Automatic Egg Incubators That Actually Hatch',
			'subhead'    => 'Digital temperature & humidity control, auto turning, and a clear hatch window. From backyard batches to serious poultry income.',
			'grid_title' => 'Pick the Incubator That Fits You',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'egg-incubators',
			'benefits'   => array(
				'Automatic egg turning - no manual work',
				'Digital temperature & humidity display',
				'High hatch rate with stable heating',
				'Clear viewing window to watch progress',
			),
			'skus'       => array( 'FMK-0038', 'FMK-322080', 'FMK-0039', 'FMK-0040', 'FMK-0041', 'FMK-0042', 'FMK-0043', 'FMK-0044' ),
			'faqs'       => array(
				array( 'Do incubators work with Kenyan power?', 'Yes. All units run on standard 240V mains. We can advise on a backup power option if your area has frequent outages.' ),
				array( 'How many eggs can I hatch?', 'Capacity is shown on each product. We stock small home units through to large commercial trays.' ),
				array( 'Is delivery really free?', 'Yes - free countrywide delivery. Nairobi orders can also pay on delivery.' ),
			),
		),

		'lp-car-wash' => array(
			'eyebrow'    => 'Commercial-Grade Cleaning Power',
			'headline'   => 'High-Pressure Car Wash Machines Built to Earn',
			'subhead'    => 'Strong, steady pressure for cars, mats, walls and yards. Perfect for car wash businesses and serious home use.',
			'grid_title' => 'Pick Your Car Wash Machine',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'car-wash-equipment',
			'benefits'   => array(
				'Strong, stable pressure for tough dirt',
				'Copper motor for long working life',
				'Great for car wash business income',
				'Complete with gun, hose and nozzles',
			),
			'skus'       => array( 'FMK-0001', 'FMK-0002', 'FMK-0003', 'FMK-0004', 'FMK-0005', 'FMK-0390', 'FMK-0164', 'FMK-0475' ),
			'faqs'       => array(
				array( 'Can I use it for a car wash business?', 'Yes. These are built for repeated daily use - ideal for a commercial car wash.' ),
				array( 'What comes in the box?', 'The machine, spray gun, high-pressure hose and standard nozzles. Details are on each product page.' ),
				array( 'Do you deliver countrywide?', 'Yes - free countrywide delivery, with pay-on-delivery available in Nairobi.' ),
			),
		),

		'lp-demolition-breakers' => array(
			'eyebrow'    => 'Break Concrete the Easy Way',
			'headline'   => 'Demolition Breakers That Cut Through Concrete',
			'subhead'    => 'Heavy-duty breaking power for construction, renovation and site work. Rugged build, strong impact, all-day performance.',
			'grid_title' => 'Pick Your Demolition Breaker',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'demolition-breakers',
			'benefits'   => array(
				'High impact energy for fast breaking',
				'Rugged build for site conditions',
				'Comfortable grip, less vibration',
				'Chisels included - ready to work',
			),
			'skus'       => array( 'FMK-0006', 'FMK-0007', 'FMK-0008', 'FMK-0009', 'FMK-0010', 'FMK-0461', 'FMK-0460', 'FMK-0253' ),
			'faqs'       => array(
				array( 'Are chisels included?', 'Yes - standard chisels are included. Check each product page for the exact set.' ),
				array( 'Is it strong enough for concrete slabs?', 'Yes. These are demolition-grade breakers made for concrete, rock and hard surfaces.' ),
				array( 'What warranty do I get?', 'A 1-year warranty plus free after-sales support.' ),
			),
		),

		'lp-water-pumps' => array(
			'eyebrow'    => 'Move Water Where You Need It',
			'headline'   => 'Water Pumps for Farms, Homes & Sites',
			'subhead'    => 'Petrol and electric pumps for irrigation, drainage and water supply. Reliable flow, easy starting, strong lift.',
			'grid_title' => 'Pick the Right Water Pump',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'water-pumps',
			'benefits'   => array(
				'Strong flow for irrigation & drainage',
				'Easy starting, fuel-efficient engines',
				'Durable build for daily farm use',
				'Right size for your acreage & lift',
			),
			'skus'       => array( 'FMK-0011', 'FMK-0012', 'FMK-0013', 'FMK-0014', 'FMK-0015', 'FMK-0016', 'FMK-0017', 'FMK-0018' ),
			'faqs'       => array(
				array( 'Which pump size do I need?', 'It depends on your acreage, water source and lift height. Message us on WhatsApp and we will recommend the right one.' ),
				array( 'Petrol or electric?', 'We stock both. Petrol suits farms without reliable power; electric suits homes and fixed installations.' ),
				array( 'Do you deliver upcountry?', 'Yes - free countrywide delivery to all major towns.' ),
			),
		),

		'lp-welding-machines' => array(
			'eyebrow'    => 'Weld Anywhere, Anytime',
			'headline'   => 'Inverter Welding Machines That Just Work',
			'subhead'    => 'Lightweight inverter welders with stable arc and easy striking. Perfect for fabrication, repairs and site jobs.',
			'grid_title' => 'Pick Your Welding Machine',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'welding-machines',
			'benefits'   => array(
				'Stable arc, easy striking every time',
				'Lightweight - carry it to any job',
				'Handles common rod sizes with ease',
				'Complete with cables and holder',
			),
			'skus'       => array( 'FMK-0022', 'FMK-0023', 'FMK-0024', 'FMK-0025', 'FMK-0463', 'FMK-0462', 'FMK-0458', 'FMK-0457' ),
			'faqs'       => array(
				array( 'What can I weld with it?', 'Standard steel fabrication and repairs. Check the amperage on each product for the rod sizes it handles.' ),
				array( 'Does it come with accessories?', 'Yes - welding cables and electrode holder are included. See each product page for specifics.' ),
				array( 'Is there a warranty?', 'Yes - 1-year warranty and free after-sales support.' ),
			),
		),

		'lp-vacuum-cleaners' => array(
			'eyebrow'    => 'Wet & Dry Cleaning Power',
			'headline'   => 'Heavy-Duty Vacuum Cleaners for Home & Business',
			'subhead'    => 'Powerful suction for dust, debris and spills. Wet and dry models for homes, offices, car washes and workshops.',
			'grid_title' => 'Pick Your Vacuum Cleaner',
			'grid_sub'   => 'All prices include a 1-year warranty and countrywide delivery.',
			'category'   => 'vacuum-cleaners',
			'benefits'   => array(
				'Strong suction for wet and dry mess',
				'Large tank - fewer emptying stops',
				'Tough build for commercial use',
				'Full nozzle set included',
			),
			'skus'       => array( 'FMK-0035', 'FMK-0036', 'FMK-0037', 'FMK-0537', 'FMK-0343', 'FMK-0206', 'FMK-0205', 'FMK-0091' ),
			'faqs'       => array(
				array( 'Can it pick up water?', 'Yes - these are wet & dry vacuums, so they handle both spills and dust.' ),
				array( 'Is it good for a car wash?', 'Absolutely. The large tank and strong suction make it ideal for car wash and workshop use.' ),
				array( 'Do you deliver countrywide?', 'Yes - free countrywide delivery, with pay-on-delivery available in Nairobi.' ),
			),
		),

	);
}

/* Shared comparison rows (Frontmall vs ordinary shops). */
function fmlp_compare_rows() {
	return array(
		'Quality products, warranty where applicable',
		'1-year warranty included',
		'Free countrywide delivery',
		'Pay on delivery in Nairobi',
		'Free expert advice before you buy',
		'Free after-sales support',
	);
}

/* =========================================================================
 * 2. HELPERS
 * ====================================================================== */

/** Build a WhatsApp click-to-chat link with a pre-filled message. */
function fmlp_wa_link( $message ) {
	return 'https://wa.me/' . FMLP_WA_NUMBER . '?text=' . rawurlencode( $message );
}

/** Format a price as KSh with thousands separators. */
function fmlp_money( $amount ) {
	return 'KSh ' . number_format( (float) $amount, 0, '.', ',' );
}

/** Green check icon. */
function fmlp_check() {
	return '<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>';
}

/** Red cross icon. */
function fmlp_x() {
	return '<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" d="M6 6l12 12M18 6 6 18"/></svg>';
}

/**
 * Resolve the products to display for a funnel.
 * Primary: the latest FMLP_PER_PAGE published products in the funnel's
 * category (newest first). Fallback: the explicit SKU list (first N).
 * Order preserved; non-visible / missing items skipped.
 */
function fmlp_resolve_products( $funnel ) {
	$limit = (int) FMLP_PER_PAGE;
	$out   = array();

	// Primary: latest N by category.
	if ( ! empty( $funnel['category'] ) && function_exists( 'wc_get_products' ) ) {
		$found = wc_get_products( array(
			'status'     => 'publish',
			'limit'      => $limit,
			'orderby'    => 'date',
			'order'      => 'DESC',
			'category'   => array( $funnel['category'] ),
			'visibility' => 'visible',
		) );
		foreach ( (array) $found as $product ) {
			if ( $product && $product->is_visible() ) {
				$out[] = $product;
			}
		}
		if ( ! empty( $out ) ) {
			return $out;
		}
	}

	// Fallback: explicit SKUs (first N).
	if ( function_exists( 'wc_get_product_id_by_sku' ) && ! empty( $funnel['skus'] ) ) {
		foreach ( (array) $funnel['skus'] as $sku ) {
			if ( count( $out ) >= $limit ) {
				break;
			}
			$sku = trim( (string) $sku );
			if ( '' === $sku ) {
				continue;
			}
			$id = wc_get_product_id_by_sku( $sku );
			if ( ! $id ) {
				continue;
			}
			$product = wc_get_product( $id );
			if ( $product && $product->is_visible() ) {
				$out[] = $product;
			}
		}
	}
	return $out;
}

/* =========================================================================
 * 3. RESOLVE CURRENT FUNNEL
 * ====================================================================== */

$fmlp_all   = fmlp_funnels();
$fmlp_slug  = get_post_field( 'post_name', get_queried_object_id() );
$fmlp_key   = array_key_exists( $fmlp_slug, $fmlp_all ) ? $fmlp_slug : 'lp-car-wash';
$FMLP       = $fmlp_all[ $fmlp_key ];

$fmlp_products = fmlp_resolve_products( $FMLP );

/* Lowest live price, for the "From KSh X" hero label. */
$fmlp_min = 0;
foreach ( $fmlp_products as $fmlp_p ) {
	$fmlp_pr = (float) $fmlp_p->get_price();
	if ( $fmlp_pr > 0 && ( 0 === $fmlp_min || $fmlp_pr < $fmlp_min ) ) {
		$fmlp_min = $fmlp_pr;
	}
}

/* Hero image (self-hosted in theme /lp-images/). Empty string if missing. */
$fmlp_hero_file = 'lp-images/hero-' . $fmlp_key . '.jpg';
$fmlp_hero_img  = file_exists( trailingslashit( get_stylesheet_directory() ) . $fmlp_hero_file )
	? trailingslashit( get_stylesheet_directory_uri() ) . $fmlp_hero_file
	: '';

$fmlp_wa_hero = fmlp_wa_link( 'Hi Frontmall, I saw your ' . $FMLP['headline'] . ' page and I would like to order / get prices.' );

get_header();
?>

<style>
/* ---- Frontmall LP (scoped to .fmlp) ---- */
.fmlp{--g:<?php echo esc_html( FMLP_GREEN ); ?>;--o:<?php echo esc_html( FMLP_ORANGE ); ?>;--ink:#12261a;--muted:#5b6b60;--line:#e7ece8;--bg:#f6f8f6;--dark:#0d3d22;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;color:var(--ink);line-height:1.55}
.fmlp *{box-sizing:border-box}
.fmlp img{max-width:100%;height:auto;display:block}
.fmlp-wrap{max-width:1140px;margin:0 auto;padding:0 18px}
.fmlp a{color:inherit}
.fmlp h1,.fmlp h2,.fmlp h3{line-height:1.15;margin:0 0 .4em}

/* Buttons */
.fmlp-btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;font-weight:800;text-decoration:none;border-radius:12px;padding:15px 22px;font-size:16px;border:0;cursor:pointer;transition:transform .06s ease,box-shadow .2s ease}
.fmlp-btn:active{transform:translateY(1px)}
.fmlp-btn-wa{background:#25D366;color:#fff !important;box-shadow:0 8px 20px rgba(37,211,102,.28)}
/* Call button: solid dark-green with FORCED white text so no theme CSS can wash it out */
.fmlp-btn-call{background:var(--dark) !important;color:#fff !important;border:0}
.fmlp-btn-call:hover,.fmlp-btn-call:focus,.fmlp-btn-call:visited{color:#fff !important}
.fmlp-btn-call svg{fill:#fff !important}
.fmlp-btn-org{background:var(--o);color:#fff !important;box-shadow:0 8px 20px rgba(244,122,31,.28)}
.fmlp-btn-block{width:100%}
.fmlp-btn svg{width:20px;height:20px;fill:currentColor}

/* Hero */
.fmlp-hero{background:linear-gradient(160deg,#0f5a30 0%,var(--g) 60%,#178a45 100%);color:#fff;padding:34px 0 40px}
.fmlp-hero-grid{display:flex;flex-direction:column;gap:22px}
.fmlp-hero-media{order:-1;position:relative}
.fmlp-hero-media img{width:100%;border-radius:18px;box-shadow:0 24px 50px rgba(0,0,0,.28);object-fit:cover;aspect-ratio:4/3}
.fmlp-hero-tag{position:absolute;left:14px;bottom:14px;background:var(--o);color:#fff;font-weight:800;font-size:13px;padding:8px 13px;border-radius:999px;box-shadow:0 6px 16px rgba(0,0,0,.25)}
.fmlp-hero-copy{text-align:center}
.fmlp-eyebrow{display:inline-block;background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.28);padding:6px 14px;border-radius:999px;font-weight:700;font-size:13px;letter-spacing:.02em;margin-bottom:14px;color:#fff}
.fmlp-hero h1{font-size:30px;font-weight:900;letter-spacing:-.01em;color:#fff}
.fmlp-hero p.sub{font-size:16px;opacity:.94;margin:0 auto 16px;max-width:560px}
.fmlp-price-from{font-size:15px;font-weight:700;margin-bottom:16px}
.fmlp-price-from strong{font-size:22px;color:#ffe08a}
.fmlp-cta{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-bottom:14px}
.fmlp-hero-trust{display:flex;flex-wrap:wrap;gap:8px 18px;justify-content:center;font-size:13.5px;opacity:.95}
.fmlp-hero-trust span{display:inline-flex;align-items:center;gap:6px}
.fmlp-hero-trust svg{fill:#ffe08a}
.fmlp-count{display:inline-flex;align-items:center;gap:8px;background:rgba(0,0,0,.18);border-radius:10px;padding:8px 12px;font-size:13.5px;font-weight:700;margin-bottom:14px}
.fmlp-count b{color:#ffe08a}

@media(min-width:860px){
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-hero-grid{flex-direction:row;align-items:center;gap:34px}
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-hero-copy{flex:1.05;text-align:left}
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-hero-media{flex:.95;order:0}
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-hero p.sub{margin-left:0}
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-cta{justify-content:flex-start}
	.fmlp-hero:not(.fmlp-hero--noimg) .fmlp-hero-trust{justify-content:flex-start}
	.fmlp-hero h1{font-size:40px}
}

/* Stats bar */
.fmlp-stats{background:#0d3d22;color:#fff}
.fmlp-stats-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:rgba(255,255,255,.12)}
.fmlp-stat{background:#0d3d22;padding:16px 12px;text-align:center}
.fmlp-stat b{display:block;font-size:18px;font-weight:900;color:#ffe08a}
.fmlp-stat span{font-size:12.5px;opacity:.9}
@media(min-width:760px){.fmlp-stats-grid{grid-template-columns:repeat(4,1fr)}.fmlp-stat b{font-size:20px}}

/* Sections */
.fmlp-sec{padding:42px 0}
.fmlp-sec.alt{background:var(--bg)}
.fmlp-h{text-align:center;max-width:640px;margin:0 auto 26px}
.fmlp-h h2{font-size:26px;font-weight:900}
.fmlp-h p{color:var(--muted);margin:0}
@media(min-width:760px){.fmlp-h h2{font-size:30px}}

/* Product grid */
.fmlp-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px}
@media(min-width:820px){.fmlp-grid{grid-template-columns:repeat(3,1fr);gap:22px}}
.fmlp-card{background:#fff;border:1px solid var(--line);border-radius:16px;overflow:hidden;display:flex;flex-direction:column;transition:box-shadow .2s ease,transform .2s ease}
.fmlp-card:hover{box-shadow:0 16px 36px rgba(13,61,34,.12);transform:translateY(-3px)}
.fmlp-thumb{position:relative;background:#fff;padding:14px;aspect-ratio:1/1;display:flex;align-items:center;justify-content:center}
.fmlp-thumb img{max-height:100%;width:auto;object-fit:contain}
.fmlp-disc{position:absolute;top:10px;left:10px;background:var(--o);color:#fff;font-weight:800;font-size:12px;padding:5px 9px;border-radius:8px}
.fmlp-cardbody{padding:14px;display:flex;flex-direction:column;gap:10px;flex:1}
.fmlp-name{font-weight:700;font-size:15px;min-height:2.6em;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;color:var(--ink)}
.fmlp-price{display:flex;align-items:baseline;gap:8px;flex-wrap:wrap}
.fmlp-now{font-size:19px;font-weight:900;color:var(--g)}
.fmlp-was{font-size:13px;color:#9aa89f;text-decoration:line-through}
.fmlp-card .fmlp-btn{margin-top:auto;padding:12px 14px;font-size:14.5px}
.fmlp-view{text-align:center;font-size:12.5px;color:var(--muted);text-decoration:underline}
.fmlp-empty{text-align:center;color:var(--muted);background:#fff;border:1px dashed var(--line);border-radius:14px;padding:30px}

/* Benefits */
.fmlp-benefits{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
@media(min-width:820px){.fmlp-benefits{grid-template-columns:repeat(4,1fr)}}
.fmlp-benefit{background:#fff;border:1px solid var(--line);border-radius:14px;padding:18px 16px;text-align:center}
.fmlp-benefit .ic{width:44px;height:44px;border-radius:12px;background:rgba(26,156,76,.12);color:var(--g);display:inline-flex;align-items:center;justify-content:center;margin-bottom:10px}
.fmlp-benefit .ic svg{width:24px;height:24px}
.fmlp-benefit p{margin:0;font-weight:600;font-size:14px}

/* Comparison table */
.fmlp-compare{max-width:760px;margin:0 auto;background:#fff;border:1px solid var(--line);border-radius:16px;overflow:hidden}
.fmlp-crow{display:grid;grid-template-columns:1fr 120px 120px;align-items:center;border-bottom:1px solid var(--line)}
.fmlp-crow:last-child{border-bottom:0}
.fmlp-crow>div{padding:13px 14px;font-size:14px}
.fmlp-crow .feat{font-weight:600}
.fmlp-crow .yes,.fmlp-crow .no{text-align:center;display:flex;align-items:center;justify-content:center}
.fmlp-crow .yes{color:var(--g)}
.fmlp-crow .no{color:#d24a3d}
.fmlp-chead{background:#0d3d22;color:#fff;font-weight:800}
.fmlp-chead .us{color:#ffe08a;text-align:center}
.fmlp-chead .them{text-align:center;opacity:.85}
.fmlp-chead>div{font-size:13.5px}
@media(max-width:520px){.fmlp-crow{grid-template-columns:1fr 64px 64px}.fmlp-crow>div{padding:11px 8px;font-size:12.8px}}

/* FAQ */
.fmlp-faqs{max-width:760px;margin:0 auto;display:flex;flex-direction:column;gap:10px}
.fmlp-faq{background:#fff;border:1px solid var(--line);border-radius:12px;padding:16px 18px}
.fmlp-faq summary{font-weight:700;cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:12px}
.fmlp-faq summary::-webkit-details-marker{display:none}
.fmlp-faq summary::after{content:"+";font-size:22px;line-height:1;color:var(--g)}
.fmlp-faq[open] summary::after{content:"\2013"}
.fmlp-faq p{margin:12px 0 0;color:var(--muted)}

/* Order form */
.fmlp-order{background:linear-gradient(160deg,#0f5a30,#178a45);color:#fff}
.fmlp-formcard{max-width:620px;margin:0 auto;background:#fff;color:var(--ink);border-radius:18px;padding:26px 22px;box-shadow:0 24px 60px rgba(0,0,0,.25)}
.fmlp-formcard h2{font-size:24px;font-weight:900;text-align:center}
.fmlp-formcard .lead{text-align:center;color:var(--muted);margin:0 0 18px}
.fmlp-field{margin-bottom:13px}
.fmlp-field label{display:block;font-weight:700;font-size:13.5px;margin-bottom:6px}
.fmlp-field input,.fmlp-field select,.fmlp-field textarea{width:100%;padding:13px 14px;border:1.5px solid var(--line);border-radius:11px;font-size:15px;font-family:inherit;background:#fff;color:var(--ink)}
.fmlp-field textarea{min-height:74px;resize:vertical}
.fmlp-note{text-align:center;font-size:12.5px;color:var(--muted);margin-top:12px}

/* Sticky mobile bar */
.fmlp-sticky{position:fixed;left:0;right:0;bottom:0;z-index:9999;background:#fff;border-top:1px solid var(--line);box-shadow:0 -6px 18px rgba(0,0,0,.08);padding:9px 12px;display:flex;gap:10px}
.fmlp-sticky .fmlp-btn{flex:1;padding:13px;font-size:15px}
.fmlp-spacer{height:76px}
@media(min-width:820px){.fmlp-sticky,.fmlp-spacer{display:none}}
</style>

<div class="fmlp">

	<!-- HERO -->
	<section class="fmlp-hero<?php echo $fmlp_hero_img ? '' : ' fmlp-hero--noimg'; ?>">
		<div class="fmlp-wrap">
			<div class="fmlp-hero-grid">

				<?php if ( $fmlp_hero_img ) : ?>
					<div class="fmlp-hero-media">
						<img src="<?php echo esc_url( $fmlp_hero_img ); ?>" alt="<?php echo esc_attr( $FMLP['headline'] ); ?>" width="1024" height="768">
						<span class="fmlp-hero-tag">Pay on Delivery in Nairobi</span>
					</div>
				<?php endif; ?>

				<div class="fmlp-hero-copy">
					<span class="fmlp-eyebrow"><?php echo esc_html( $FMLP['eyebrow'] ); ?></span>
					<h1><?php echo esc_html( $FMLP['headline'] ); ?></h1>
					<p class="sub"><?php echo esc_html( $FMLP['subhead'] ); ?></p>

					<?php if ( $fmlp_min > 0 ) : ?>
						<div class="fmlp-price-from">Starting from <strong><?php echo esc_html( fmlp_money( $fmlp_min ) ); ?></strong></div>
					<?php endif; ?>

					<div class="fmlp-count">Limited stock this week - <b>order today</b> for fastest delivery</div>

					<div class="fmlp-cta">
						<a class="fmlp-btn fmlp-btn-wa" href="<?php echo esc_url( $fmlp_wa_hero ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 3.9A10 10 0 0 0 3.6 16.4L2 22l5.8-1.5A10 10 0 1 0 20 3.9Zm-8 16.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3.4.9.9-3.3-.2-.3A8.3 8.3 0 1 1 12 20.1Zm4.6-6.1c-.3-.1-1.5-.7-1.7-.8s-.4-.1-.6.2-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-2-1.2 7.4 7.4 0 0 1-1.4-1.7c-.1-.3 0-.4.1-.5l.4-.5.3-.5v-.4l-.8-1.9c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 2.9 2.9 0 0 0-.9 2.2 5 5 0 0 0 1.1 2.7 11.5 11.5 0 0 0 4.4 3.9 5 5 0 0 0 3 .6 2.6 2.6 0 0 0 1.7-1.2 2.1 2.1 0 0 0 .1-1.2c0-.1-.2-.2-.5-.3Z"/></svg>
							Order on WhatsApp
						</a>
						<a class="fmlp-btn fmlp-btn-call" href="tel:<?php echo esc_attr( FMLP_PHONE ); ?>">
							<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15.5 15.5 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11.4 11.4 0 0 0 3.6.6 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .6 3.6 1 1 0 0 1-.2 1Z"/></svg>
							Call <?php echo esc_html( FMLP_PHONE ); ?>
						</a>
					</div>

					<div class="fmlp-hero-trust">
						<span><?php echo fmlp_check(); ?> Free countrywide delivery</span>
						<span><?php echo fmlp_check(); ?> 1-year warranty</span>
						<span><?php echo fmlp_check(); ?> Quality products</span>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- STATS BAR -->
	<section class="fmlp-stats">
		<div class="fmlp-wrap" style="padding:0">
			<div class="fmlp-stats-grid">
				<div class="fmlp-stat"><b>1-2 Days</b><span>Countrywide delivery</span></div>
				<div class="fmlp-stat"><b>1 Year</b><span>Warranty included</span></div>
				<div class="fmlp-stat"><b>Quality</b><span>Products with warranty support</span></div>
				<div class="fmlp-stat"><b>KSh 0</b><span>Deposit - pay on delivery*</span></div>
			</div>
		</div>
	</section>

	<!-- PRODUCTS -->
	<section class="fmlp-sec">
		<div class="fmlp-wrap">
			<div class="fmlp-h">
				<h2><?php echo esc_html( $FMLP['grid_title'] ); ?></h2>
				<p><?php echo esc_html( $FMLP['grid_sub'] ); ?></p>
			</div>

			<?php if ( empty( $fmlp_products ) ) : ?>
				<div class="fmlp-empty">Products are loading. If this persists, set the correct category slug for this funnel (or publish the products).</div>
			<?php else : ?>
				<div class="fmlp-grid">
					<?php
					foreach ( $fmlp_products as $product ) :
						$pid       = $product->get_id();
						$name      = $product->get_name();
						$permalink = get_permalink( $pid );
						$price     = (float) $product->get_price();
						$regular   = (float) $product->get_regular_price();
						$img       = $product->get_image( 'woocommerce_thumbnail' );
						$has_sale  = ( $regular > 0 && $price > 0 && $price < $regular );
						$disc      = $has_sale ? round( ( ( $regular - $price ) / $regular ) * 100 ) : 0;
						$wa        = fmlp_wa_link( 'Hi Frontmall, I want to order: ' . $name . ' (' . fmlp_money( $price ) . '). Product: ' . $permalink );
						?>
						<div class="fmlp-card">
							<a class="fmlp-thumb" href="<?php echo esc_url( $permalink ); ?>">
								<?php
								if ( $has_sale && $disc > 0 ) {
									echo '<span class="fmlp-disc">-' . esc_html( $disc ) . '%</span>';
								}
								echo wp_kses_post( $img );
								?>
							</a>
							<div class="fmlp-cardbody">
								<div class="fmlp-name"><?php echo esc_html( $name ); ?></div>
								<div class="fmlp-price">
									<?php if ( $price > 0 ) : ?>
										<span class="fmlp-now"><?php echo esc_html( fmlp_money( $price ) ); ?></span>
										<?php if ( $has_sale ) : ?>
											<span class="fmlp-was"><?php echo esc_html( fmlp_money( $regular ) ); ?></span>
										<?php endif; ?>
									<?php else : ?>
										<span class="fmlp-now">Ask price</span>
									<?php endif; ?>
								</div>
								<a class="fmlp-btn fmlp-btn-wa" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
									<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 3.9A10 10 0 0 0 3.6 16.4L2 22l5.8-1.5A10 10 0 1 0 20 3.9Zm-8 16.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3.4.9.9-3.3-.2-.3A8.3 8.3 0 1 1 12 20.1Zm4.6-6.1c-.3-.1-1.5-.7-1.7-.8s-.4-.1-.6.2-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-2-1.2 7.4 7.4 0 0 1-1.4-1.7c-.1-.3 0-.4.1-.5l.4-.5.3-.5v-.4l-.8-1.9c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 2.9 2.9 0 0 0-.9 2.2 5 5 0 0 0 1.1 2.7 11.5 11.5 0 0 0 4.4 3.9 5 5 0 0 0 3 .6 2.6 2.6 0 0 0 1.7-1.2 2.1 2.1 0 0 0 .1-1.2c0-.1-.2-.2-.5-.3Z"/></svg>
									Order on WhatsApp
								</a>
								<a class="fmlp-view" href="<?php echo esc_url( $permalink ); ?>">View full details</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- WHY BUY / BENEFITS -->
	<section class="fmlp-sec alt">
		<div class="fmlp-wrap">
			<div class="fmlp-h">
				<h2>Why This Is the Right Choice</h2>
				<p>Built for Kenyan conditions and backed by real support.</p>
			</div>
			<div class="fmlp-benefits">
				<?php foreach ( $FMLP['benefits'] as $benefit ) : ?>
					<div class="fmlp-benefit">
						<span class="ic"><?php echo fmlp_check(); ?></span>
						<p><?php echo esc_html( $benefit ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- COMPARISON -->
	<section class="fmlp-sec">
		<div class="fmlp-wrap">
			<div class="fmlp-h">
				<h2>Why Buy From Frontmall Kenya?</h2>
				<p>Here is how we compare to ordinary shops.</p>
			</div>
			<div class="fmlp-compare">
				<div class="fmlp-crow fmlp-chead">
					<div class="feat">What you get</div>
					<div class="us">Frontmall</div>
					<div class="them">Ordinary shops</div>
				</div>
				<?php foreach ( fmlp_compare_rows() as $row ) : ?>
					<div class="fmlp-crow">
						<div class="feat"><?php echo esc_html( $row ); ?></div>
						<div class="yes"><?php echo fmlp_check(); ?></div>
						<div class="no"><?php echo fmlp_x(); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="fmlp-sec alt">
		<div class="fmlp-wrap">
			<div class="fmlp-h"><h2>Common Questions</h2></div>
			<div class="fmlp-faqs">
				<?php foreach ( $FMLP['faqs'] as $faq ) : ?>
					<details class="fmlp-faq">
						<summary><?php echo esc_html( $faq[0] ); ?></summary>
						<p><?php echo esc_html( $faq[1] ); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ORDER FORM -->
	<section class="fmlp-sec fmlp-order">
		<div class="fmlp-wrap">
			<div class="fmlp-formcard">
				<h2>Order in 30 Seconds</h2>
				<p class="lead">Leave your details and we will call you back to confirm. Or tap WhatsApp for an instant reply.</p>
				<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" onsubmit="return fmlpOrder(event)">
					<div class="fmlp-field">
						<label for="fmlp-name">Your name</label>
						<input id="fmlp-name" name="fmlp_name" type="text" required placeholder="e.g. John Kamau">
					</div>
					<div class="fmlp-field">
						<label for="fmlp-phone">Phone number</label>
						<input id="fmlp-phone" name="fmlp_phone" type="tel" required placeholder="e.g. 07XX XXX XXX">
					</div>
					<div class="fmlp-field">
						<label for="fmlp-product">What do you want to order?</label>
						<select id="fmlp-product" name="fmlp_product">
							<option value=""><?php echo esc_attr( $FMLP['grid_title'] ); ?> - choose or type below</option>
							<?php foreach ( $fmlp_products as $product ) : ?>
								<option value="<?php echo esc_attr( $product->get_name() ); ?>"><?php echo esc_html( $product->get_name() ); ?></option>
							<?php endforeach; ?>
							<option value="Not sure - need advice">Not sure - I need advice</option>
						</select>
					</div>
					<div class="fmlp-field">
						<label for="fmlp-msg">Delivery location / notes (optional)</label>
						<textarea id="fmlp-msg" name="fmlp_msg" placeholder="Town / estate, and anything else we should know"></textarea>
					</div>
					<button type="submit" class="fmlp-btn fmlp-btn-org fmlp-btn-block">Send My Order Request</button>
					<p class="fmlp-note">*Pay on delivery available in Nairobi. Countrywide orders confirmed by phone.</p>
				</form>
			</div>
		</div>
	</section>

	<div class="fmlp-spacer"></div>

	<!-- STICKY MOBILE BAR -->
	<div class="fmlp-sticky">
		<a class="fmlp-btn fmlp-btn-wa" href="<?php echo esc_url( $fmlp_wa_hero ); ?>" target="_blank" rel="noopener">WhatsApp</a>
		<a class="fmlp-btn fmlp-btn-call" href="tel:<?php echo esc_attr( FMLP_PHONE ); ?>">Call Now</a>
	</div>

</div>

<script>
/* Order form -> WhatsApp handoff (no server-side handler required). */
function fmlpOrder( e ) {
	e.preventDefault();
	var f = e.target;
	var name = ( f.fmlp_name.value || '' ).trim();
	var phone = ( f.fmlp_phone.value || '' ).trim();
	var prod = ( f.fmlp_product.value || '' ).trim();
	var msg = ( f.fmlp_msg.value || '' ).trim();
	var text = 'Hi Frontmall, I would like to order.%0A'
		+ 'Name: ' + encodeURIComponent( name ) + '%0A'
		+ 'Phone: ' + encodeURIComponent( phone ) + '%0A'
		+ 'Item: ' + encodeURIComponent( prod || 'Need advice' );
	if ( msg ) {
		text += '%0ANotes: ' + encodeURIComponent( msg );
	}
	window.open( 'https://wa.me/<?php echo esc_js( FMLP_WA_NUMBER ); ?>?text=' + text, '_blank' );
	return false;
}
</script>

<?php
get_footer();
