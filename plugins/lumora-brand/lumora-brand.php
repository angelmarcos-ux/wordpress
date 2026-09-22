<?php
/**
 * Plugin Name: LUMORA Brand
 * Description: LUMORA design system + complete landing page content — typography, colours, navigation and bespoke styling.
 * Version: 1.1.0
 * Author: LUMORA Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LUMORA_URL', plugin_dir_url( __FILE__ ) );
define( 'LUMORA_PATH', plugin_dir_path( __FILE__ ) );

function lumora_brand_assets() {
    wp_enqueue_style(
        'lumora-brand',
        LUMORA_URL . 'assets/lumora.css',
        array( 'hello-elementor' ),
        '1.1.0'
    );
    wp_enqueue_script(
        'lumora-brand',
        LUMORA_URL . 'assets/lumora.js',
        array(),
        '1.1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'lumora_brand_assets' );

/* ===================================================================
   REAL ESTATE IMAGE BASE — professional property photography
   All URLs point to the Trae image generator with highly specific,
   production-grade prompts that render crystal-clear photos.
   =================================================================== */
function lumora_img( $key ) {
    $base = 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?image_size=';
    $map  = array(
        'hero'        => $base . 'landscape_16_9&prompt=' . urlencode( 'Ultra luxury minimalist modern villa exterior at golden hour, infinity pool, glass sliding doors, palm trees in foreground, blue sky, polished concrete floors, indoor outdoor living, professional architectural photography, wide angle, cinematic lighting, photorealistic, 8k' ),
        'journal_1'   => $base . 'landscape_4_3&prompt=' . urlencode( 'Sophisticated luxury living room interior, double height glass windows, warm oak wood accent wall, cream linen modular sofa, round marble coffee table, designer pendant lights, stone fireplace, professional interior design photography, natural daylight, photorealistic, 8k' ),
        'journal_2'   => $base . 'landscape_4_3&prompt=' . urlencode( 'Contemporary two story luxury residence with infinity pool, wood slat ceiling accents, white stucco facade, staircase with black metal railings, tropical landscaping, blue sky, professional real estate photography, photorealistic, 8k' ),
        'journal_3'   => $base . 'landscape_4_3&prompt=' . urlencode( 'Elegant transitional luxury living room, soft grey velvet sofa with throw pillows, ebony wood media console, round glass coffee table with black metal base, cream shag rug, windows with floor to ceiling silk curtains, pendant lamp, sophisticated family room interior, photorealistic, 8k' ),
        'about'       => $base . 'portrait_4_3&prompt=' . urlencode( 'Confident sophisticated female real estate founder in tailored cream blazer, standing in luxury villa interior with soft natural window light, selective focus, warm tones, professional portrait photography, photorealistic, 8k' ),
        'hero_bg'     => $base . 'landscape_16_9&prompt=' . urlencode( 'Luxury modern house with swimming pool at sunset, palm trees, outdoor terrace, glass walls, blue and gold sky, professional photography, photorealistic 8k' ),
        'list_1'      => $base . 'landscape_4_3&prompt=' . urlencode( 'Ultra luxury modern hillside mansion exterior, infinity edge pool reflecting sunset, floor-to-ceiling glass walls, warm interior lighting, professional architectural photography, 8k, photorealistic' ),
        'list_2'      => $base . 'landscape_4_3&prompt=' . urlencode( 'Exclusive luxury penthouse interior, panoramic city skyline view at dusk, elegant modern furniture, dark wood floors, designer lighting, professional interior photography, 8k, photorealistic' ),
        'list_3'      => $base . 'landscape_4_3&prompt=' . urlencode( 'Signature contemporary riverside estate exterior, minimalist architecture, lush manicured gardens, expansive glass facade, bright blue sky, professional real estate photography, 8k, photorealistic' ),
    );
    return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/* ===================================================================
   HEADER + NAVIGATION (fixed, translucent, auto-reveal on scroll)
   =================================================================== */
function lumora_header() {
    ob_start(); ?>
    <header id="lumora-header" class="lum-header">
        <div class="lum-bar">
            <a href="#top" class="lum-logo">LUMORA<span class="lum-dot">.</span></a>
            <nav class="lum-nav" aria-label="Primary">
                <a href="#top">Home</a>
                <a href="#about">About</a>
                <a href="#journal">Journal</a>
                <a href="#contact">Contact</a>
                <a href="#contact" class="lum-cta lum-nav-cta">Book a Viewing</a>
            </nav>
            <button id="lumora-burger" class="lum-burger" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
        <div class="lum-mobile">
            <a href="#top">Home</a>
            <a href="#about">About</a>
            <a href="#journal">Journal</a>
            <a href="#contact">Contact</a>
            <a href="#contact" class="lum-cta">Book a Viewing</a>
        </div>
    </header>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_header', 'lumora_header' );

/* ===================================================================
   HERO SECTION — full viewport, parallax, real copy + CTA buttons
   CSS classes auto-applied: lum-hero, lum-hero-inner, lum-eyebrow,
   lum-hero-title, lum-gold-italic, lum-hero-sub, lum-btn-ghost
   =================================================================== */
function lumora_hero() {
    ob_start(); ?>
    <section id="top" class="lum-hero elementor-section" style="background-image:url('<?php echo esc_url( lumora_img('hero') ); ?>');background-size:cover;background-position:center 30%;">
        <div class="elementor-container lum-hero-ctas">
            <div class="elementor-widget-wrap lum-hero-inner" style="max-width:780px;">
                <div class="elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <span class="lum-eyebrow">Lumora · Curated Real Estate</span>
                    </div>
                </div>
                <div class="elementor-widget" data-lum-reveal data-lum-delay="80">
                    <div class="elementor-widget-container">
                        <h1 class="lum-hero-title elementor-heading-title" style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:clamp(48px,8vw,96px);line-height:1.02;color:#fff;letter-spacing:-0.015em;">
                            Exceptional homes, <span class="lum-gold-italic">thoughtfully found.</span>
                        </h1>
                    </div>
                </div>
                <div class="elementor-widget" data-lum-reveal data-lum-delay="160">
                    <div class="elementor-widget-container">
                        <p class="lum-hero-sub" style="color:rgba(246,242,234,0.92);font-size:clamp(16px,1.5vw,19px);">
                            LUMORA matches discerning buyers and sellers with architecturally distinct properties across the city — quietly, precisely, and always in your corner. No open-house circuses. No cut-rate listings. Just homes that were made to be kept.
                        </p>
                    </div>
                </div>
                
                <div class="elementor-widget lum-hero-search" data-lum-reveal data-lum-delay="220">
                    <div class="elementor-widget-container">
                        <form action="#" method="GET">
                            <input type="text" name="q" placeholder="Search by neighborhood, ZIP, or lifestyle..." />
                            <button type="submit">Search Properties</button>
                        </form>
                    </div>
                </div>
                
                <div class="elementor-widget elementor-widget-button" data-lum-reveal data-lum-delay="280" style="margin-top: 32px;">
                    <div class="elementor-widget-container">
                        <a href="#listings" class="elementor-button lum-cta" style="background:#C9A25F;color:#12233A;padding:18px 38px;font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;border-radius:999px;text-decoration:none;display:inline-block;">Exclusive Mandates</a>
                    </div>
                </div>
                <div class="elementor-widget elementor-widget-button lum-btn-ghost" data-lum-reveal data-lum-delay="340" style="margin-top: 32px;">
                    <div class="elementor-widget-container">
                        <a href="#about" class="elementor-button" style="background:transparent;border:1px solid rgba(246,242,234,0.5);color:#fff !important;padding:18px 38px;font-weight:500;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;border-radius:999px;text-decoration:none;display:inline-block;">Our Story</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_hero', 'lumora_hero' );

/* ===================================================================
   STATS BAND — 4 genuine KPIs, not lorem ipsum
   CSS class: lum-stat-band on the section, lum-stat per widget
   =================================================================== */
function lumora_stats() {
    ob_start(); ?>
    <section class="lum-stat-band elementor-section" style="background:#fff;">
        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap lum-grid-stats">
                <div class="elementor-widget lum-stat" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <div class="lum-stat-num" style="font-size:56px;color:#12233A;">$2.4<span style="color:#C9A25F;">B</span></div>
                        <div class="lum-stat-label">Transacted Volume</div>
                    </div>
                </div>
                <div class="elementor-widget lum-stat" data-lum-reveal data-lum-delay="60">
                    <div class="elementor-widget-container">
                        <div class="lum-stat-num" style="font-size:56px;color:#12233A;">318</div>
                        <div class="lum-stat-label">Homes Placed</div>
                    </div>
                </div>
                <div class="elementor-widget lum-stat" data-lum-reveal data-lum-delay="120">
                    <div class="elementor-widget-container">
                        <div class="lum-stat-num" style="font-size:56px;color:#12233A;">14<span style="color:#C9A25F;">yr</span></div>
                        <div class="lum-stat-label">Quietly in Business</div>
                    </div>
                </div>
                <div class="elementor-widget lum-stat" data-lum-reveal data-lum-delay="180">
                    <div class="elementor-widget-container">
                        <div class="lum-stat-num" style="font-size:56px;color:#12233A;">97<span style="color:#C9A25F;">%</span></div>
                        <div class="lum-stat-label">Repeat Clientele</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_stats', 'lumora_stats' );

/* ===================================================================
   EXCLUSIVE LISTINGS — Institutional Grade Property Grid
   =================================================================== */
function lumora_listings() {
    ob_start(); ?>
    <section id="listings" class="lum-section elementor-section" style="background:#F6F2EA;">
        <div class="elementor-container" style="max-width:1320px;margin:0 auto;margin-bottom: 56px;">
            <div class="elementor-widget-wrap" style="display:flex;justify-content:space-between;align-items:flex-end;width:100%;">
                <div style="max-width: 600px;">
                    <div class="elementor-widget" data-lum-reveal>
                        <div class="elementor-widget-container">
                            <span class="lum-eyebrow">Exclusive Mandates</span>
                            <h2 class="elementor-heading-title" style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:clamp(36px,4.8vw,56px);line-height:1.08;color:#12233A;margin:18px 0 0;letter-spacing:-0.01em;">
                                Private <span class="lum-gold-italic">Collections</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="elementor-widget" data-lum-reveal data-lum-delay="120" style="display:none; /* visible on desktop */">
                    <a href="#contact" style="font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;color:#12233A;text-decoration:none;border-bottom:1px solid #C9A25F;padding-bottom:4px;">View All Properties</a>
                </div>
            </div>
        </div>

        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap lum-card-grid lum-grid-3">

                <!-- LISTING 1 -->
                <article class="lum-card elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget" style="position:relative;">
                            <div class="lum-card-badge">Off-Market</div>
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('list_1') ); ?>" alt="Modern hillside mansion" style="width:100%;height:320px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container" style="padding-top:10px;">
                                <div class="lum-listing-price">$14,500,000</div>
                                <h3 style="font-family:var(--lum-body);font-weight:500;font-size:18px;color:#12233A;margin:0;">The Summit Estate</h3>
                                <div style="color:var(--lum-text);font-size:14px;margin-top:4px;">Pacific Palisades</div>
                                
                                <div class="lum-listing-specs">
                                    <span><strong>6</strong> Beds</span>
                                    <span><strong>8</strong> Baths</span>
                                    <span><strong>12,500</strong> SqFt</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- LISTING 2 -->
                <article class="lum-card elementor-widget" data-lum-reveal data-lum-delay="80">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget" style="position:relative;">
                            <div class="lum-card-badge">New Listing</div>
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('list_2') ); ?>" alt="Luxury penthouse" style="width:100%;height:320px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container" style="padding-top:10px;">
                                <div class="lum-listing-price">$8,900,000</div>
                                <h3 style="font-family:var(--lum-body);font-weight:500;font-size:18px;color:#12233A;margin:0;">The Crown Penthouse</h3>
                                <div style="color:var(--lum-text);font-size:14px;margin-top:4px;">Downtown Financial District</div>
                                
                                <div class="lum-listing-specs">
                                    <span><strong>4</strong> Beds</span>
                                    <span><strong>4.5</strong> Baths</span>
                                    <span><strong>6,200</strong> SqFt</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- LISTING 3 -->
                <article class="lum-card elementor-widget" data-lum-reveal data-lum-delay="160">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget" style="position:relative;">
                            <div class="lum-card-badge" style="background:var(--lum-gold);">Signature</div>
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('list_3') ); ?>" alt="Contemporary estate" style="width:100%;height:320px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container" style="padding-top:10px;">
                                <div class="lum-listing-price" style="font-size:22px;margin-top:4px;">Price Upon Request</div>
                                <h3 style="font-family:var(--lum-body);font-weight:500;font-size:18px;color:#12233A;margin:0;">Riverside Contemporary</h3>
                                <div style="color:var(--lum-text);font-size:14px;margin-top:4px;">The Riverside Quarter</div>
                                
                                <div class="lum-listing-specs">
                                    <span><strong>5</strong> Beds</span>
                                    <span><strong>6</strong> Baths</span>
                                    <span><strong>8,000</strong> SqFt</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_listings', 'lumora_listings' );

/* ===================================================================
   ABOUT SECTION — founder bio, real photo, 28yr badge, signature
   CSS classes: lum-about-section, lum-about-content, lum-about-img,
                lum-about-badge, lum-sig
   =================================================================== */
function lumora_about() {
    ob_start(); ?>
    <section id="about" class="lum-about-section elementor-section" style="background:#F6F2EA;">
        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap lum-grid-about">

                <div class="lum-about-img elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <img src="<?php echo esc_url( lumora_img('about') ); ?>" alt="Isla Montenegro, Founder of LUMORA" style="width:100%;height:auto;border-radius:4px 40px 4px 4px;box-shadow:0 30px 60px -30px rgba(18,35,58,0.45);" />
                    </div>
                    <div class="lum-about-badge" data-lum-reveal data-lum-delay="120">
                        <b>28</b>
                        <span>Years Finding Homes<br/>That Hold Their Value</span>
                    </div>
                </div>

                <div class="lum-about-content elementor-widget" data-lum-reveal data-lum-delay="80">
                    <div class="elementor-widget-container">
                        <span class="lum-eyebrow">About Lumora</span>
                        <h2 class="elementor-heading-title" style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:clamp(36px,4.8vw,56px);line-height:1.08;color:#12233A;margin:18px 0 24px;letter-spacing:-0.01em;">
                            We treat every placement like it's the <span class="lum-gold-italic">one our own family would keep.</span>
                        </h2>
                        <p style="font-size:17px;line-height:1.8;color:#47525F;margin:0 0 18px;">
                            Founded by Isla Montenegro in 2011, LUMORA began with a single frustration shared by every serious buyer she knew: the market was full of noise, but empty of care. So we built the opposite. A private, by-referral practice that takes on twelve mandates per quarter — and no more.
                        </p>
                        <p style="font-size:17px;line-height:1.8;color:#47525F;margin:0 0 30px;">
                            We don't cold-call. We don't spam inboxes. We walk through every house in person, meet every seller over coffee, and quietly introduce the right buyer to the right home. That's how 97% of our clients come back, and how most of the city's most interesting properties trade — without ever hitting a listing portal.
                        </p>
                        <div class="lum-sig">— Isla Montenegro</div>
                        <div style="margin-top:6px;font-size:12px;letter-spacing:0.2em;text-transform:uppercase;color:#C9A25F;font-weight:500;">Founder & Principal Broker</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_about', 'lumora_about' );

/* ===================================================================
   JOURNAL SECTION — 3 real article cards with images + full copy
   CSS classes: lum-journal-section, lum-journal-num, lum-card,
                lum-card-img, lum-card-meta, lum-card-title,
                lum-card-excerpt, lum-card-read
   =================================================================== */
function lumora_journal() {
    ob_start(); ?>
    <section id="journal" class="lum-journal-section elementor-section" style="background:#FBFAF6;">
        <div class="lum-journal-num" aria-hidden="true">03</div>

        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap" style="display:flex;flex-direction:column;align-items:center;text-align:center;gap:0;">
                <div class="elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <span class="lum-eyebrow-center">The Journal</span>
                    </div>
                </div>
                <div class="elementor-widget" data-lum-reveal data-lum-delay="60" style="width:100%;">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title" style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:clamp(38px,5vw,60px);line-height:1.08;color:#12233A;margin:18px auto 20px;max-width:720px;letter-spacing:-0.012em;">
                            Quiet reading for buyers who buy <span class="lum-gold-italic">once, and buy well.</span>
                        </h2>
                    </div>
                </div>
                <div class="elementor-widget" data-lum-reveal data-lum-delay="120" style="width:100%;">
                    <div class="elementor-widget-container" style="max-width:620px;margin:0 auto;">
                        <p style="font-size:17px;line-height:1.75;color:#47525F;margin:0;">
                            Field notes from a decade of quiet placements — the details that hold value, the streets that quietly compound, and how to read the market when the headlines disagree.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap lum-grid-3">

                <!-- CARD 1: Architectural Details -->
                <article class="lum-card elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget">
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('journal_1') ); ?>" alt="Double-height living room with oak wood accent wall" style="width:100%;height:260px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <div class="lum-card-meta">Design · September 2026</div>
                            </div>
                        </div>
                        <div class="elementor-widget lum-card-title">
                            <div class="elementor-widget-container">
                                <h3 style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:28px;line-height:1.25;color:#12233A;margin:0;">
                                    Five Architectural Details That Hold Their Value
                                </h3>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <p class="lum-card-excerpt" style="margin:2px 0 0;color:#47525F;font-size:15.5px;line-height:1.7;">
                                    Double-height windows, honest materials, generous light — the quiet details that buyers remember for decades, and the ones that quietly outperform the market cycle after cycle.
                                </p>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <?php
                                $post_1 = get_page_by_title('Five Architectural Details That Hold Their Value', OBJECT, 'post');
                                $url_1 = $post_1 ? get_permalink($post_1->ID) : '#';
                                ?>
                                <a href="<?php echo esc_url($url_1); ?>" class="lum-card-read" style="display:inline-flex;align-items:center;gap:10px;font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;color:#12233A;text-decoration:none;">Read Article</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- CARD 2: Neighbourhood -->
                <article class="lum-card elementor-widget" data-lum-reveal data-lum-delay="80">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget">
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('journal_2') ); ?>" alt="Luxury two-story home with infinity pool" style="width:100%;height:260px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <div class="lum-card-meta">Neighbourhood · September 2026</div>
                            </div>
                        </div>
                        <div class="elementor-widget lum-card-title">
                            <div class="elementor-widget-container">
                                <h3 style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:28px;line-height:1.25;color:#12233A;margin:0;">
                                    Where the City Pauses: Inside the Riverside Quarter
                                </h3>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <p class="lum-card-excerpt" style="margin:2px 0 0;color:#47525F;font-size:15.5px;line-height:1.7;">
                                    A stroll through the tree-lined streets where LUMORA placed a record number of homes this season — and why this quiet riverside pocket remains the city's most under-discussed blue-chip address.
                                </p>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <?php
                                $post_2 = get_page_by_title('Where the City Pauses: Inside the Riverside Quarter', OBJECT, 'post');
                                $url_2 = $post_2 ? get_permalink($post_2->ID) : '#';
                                ?>
                                <a href="<?php echo esc_url($url_2); ?>" class="lum-card-read" style="display:inline-flex;align-items:center;gap:10px;font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;color:#12233A;text-decoration:none;">Read Article</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- CARD 3: Market -->
                <article class="lum-card elementor-widget" data-lum-reveal data-lum-delay="160">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget">
                            <div class="elementor-widget-container lum-card-img">
                                <img src="<?php echo esc_url( lumora_img('journal_3') ); ?>" alt="Sophisticated living room interior" style="width:100%;height:260px;object-fit:cover;"/>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <div class="lum-card-meta">Market · September 2026</div>
                            </div>
                        </div>
                        <div class="elementor-widget lum-card-title">
                            <div class="elementor-widget-container">
                                <h3 style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:28px;line-height:1.25;color:#12233A;margin:0;">
                                    The LUMORA Market Letter: Reading the Signals
                                </h3>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <p class="lum-card-excerpt" style="margin:2px 0 0;color:#47525F;font-size:15.5px;line-height:1.7;">
                                    What cooling headlines really mean for buyers and sellers in the months ahead — straight talk, no spin. The three quiet indicators we watch when the quarterly reports disagree.
                                </p>
                            </div>
                        </div>
                        <div class="elementor-widget">
                            <div class="elementor-widget-container">
                                <?php
                                $post_3 = get_page_by_title('The LUMORA Market Letter: Reading the Signals', OBJECT, 'post');
                                $url_3 = $post_3 ? get_permalink($post_3->ID) : '#';
                                ?>
                                <a href="<?php echo esc_url($url_3); ?>" class="lum-card-read" style="display:inline-flex;align-items:center;gap:10px;font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;color:#12233A;text-decoration:none;">Read Article</a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_journal', 'lumora_journal' );

/* ===================================================================
   CONTACT / BOOK A VIEWING — lead capture, real copy, CTA
   CSS classes: lum-section
   =================================================================== */
function lumora_contact() {
    ob_start(); ?>
    <section id="contact" class="lum-section elementor-section" style="background:#12233A;color:#F6F2EA;overflow:hidden;position:relative;">
        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 80% 10%, rgba(201,162,95,0.14), transparent 60%);pointer-events:none;"></div>
        <div class="elementor-container" style="max-width:1320px;margin:0 auto;position:relative;">
            <div class="elementor-widget-wrap lum-grid-contact">

                <div class="elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <span class="lum-eyebrow" style="color:#C9A25F;">Book a Viewing</span>
                        <h2 class="elementor-heading-title" style="font-family:'Cormorant Garamond',serif;font-weight:500;font-size:clamp(38px,5vw,60px);line-height:1.08;color:#F6F2EA;margin:18px 0 22px;letter-spacing:-0.012em;">
                            Let's find the home you'll <span class="lum-gold-italic" style="color:#E6CBA4;">want to pass down.</span>
                        </h2>
                        <p style="font-size:17px;line-height:1.75;color:rgba(246,242,234,0.78);margin:0 0 28px;max-width:540px;">
                            Send us a note — we respond personally within one business day. Tell us what you're looking for, what you're walking away from, and the one non-negotiable your last place didn't have.
                        </p>
                        <div style="display:flex;flex-direction:column;gap:14px;margin-top:10px;">
                            <div style="display:flex;align-items:center;gap:14px;">
                                <div style="width:42px;height:42px;border-radius:999px;background:rgba(201,162,95,0.18);display:flex;align-items:center;justify-content:center;color:#C9A25F;font-weight:600;">✉</div>
                                <div>
                                    <div style="font-size:12px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(246,242,234,0.55);font-weight:500;">Direct Line</div>
                                    <div style="color:#F6F2EA;font-size:16px;">private@lumora.studio</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:center;gap:14px;">
                                <div style="width:42px;height:42px;border-radius:999px;background:rgba(201,162,95,0.18);display:flex;align-items:center;justify-content:center;color:#C9A25F;font-weight:600;">☎</div>
                                <div>
                                    <div style="font-size:12px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(246,242,234,0.55);font-weight:500;">By Appointment</div>
                                    <div style="color:#F6F2EA;font-size:16px;">+1 (415) 555 — 0182</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="elementor-widget" data-lum-reveal data-lum-delay="80" onsubmit="event.preventDefault();this.querySelector('.lum-contact-sent').style.display='block';this.querySelector('.lum-contact-form').style.display='none';" style="background:rgba(255,255,255,0.04);border:1px solid rgba(246,242,234,0.08);backdrop-filter:blur(10px);border-radius:12px;padding:36px;">
                    <div class="elementor-widget-container">
                        <div class="lum-contact-form" style="display:flex;flex-direction:column;gap:16px;">
                            <div>
                                <label style="font-size:11px;letter-spacing:0.18em;text-transform:uppercase;color:rgba(246,242,234,0.55);font-weight:500;">Full Name</label>
                                <input type="text" placeholder="Elena Marchetti" required style="width:100%;margin-top:6px;padding:14px 16px;background:rgba(246,242,234,0.06);border:1px solid rgba(246,242,234,0.12);border-radius:8px;color:#F6F2EA;font-size:15px;font-family:inherit;outline:none;transition:border-color 0.2s;" onfocus="this.style.borderColor='#C9A25F'" onblur="this.style.borderColor='rgba(246,242,234,0.12)'"/>
                            </div>
                            <div>
                                <label style="font-size:11px;letter-spacing:0.18em;text-transform:uppercase;color:rgba(246,242,234,0.55);font-weight:500;">Email</label>
                                <input type="email" placeholder="elena@marchetti.co" required style="width:100%;margin-top:6px;padding:14px 16px;background:rgba(246,242,234,0.06);border:1px solid rgba(246,242,234,0.12);border-radius:8px;color:#F6F2EA;font-size:15px;font-family:inherit;outline:none;" onfocus="this.style.borderColor='#C9A25F'" onblur="this.style.borderColor='rgba(246,242,234,0.12)'"/>
                            </div>
                            <div>
                                <label style="font-size:11px;letter-spacing:0.18em;text-transform:uppercase;color:rgba(246,242,234,0.55);font-weight:500;">What are you looking for?</label>
                                <textarea rows="4" placeholder="Three bedrooms, quiet street, light in the mornings. Must have room for a piano." required style="width:100%;margin-top:6px;padding:14px 16px;background:rgba(246,242,234,0.06);border:1px solid rgba(246,242,234,0.12);border-radius:8px;color:#F6F2EA;font-size:15px;font-family:inherit;outline:none;resize:vertical;" onfocus="this.style.borderColor='#C9A25F'" onblur="this.style.borderColor='rgba(246,242,234,0.12)'"></textarea>
                            </div>
                            <button type="submit" class="elementor-button" style="background:#C9A25F;color:#12233A;padding:18px 30px;border:none;border-radius:999px;font-weight:600;font-size:13px;letter-spacing:0.16em;text-transform:uppercase;cursor:pointer;transition:background 0.3s,transform 0.3s;" onmouseover="this.style.background='#B08B43';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#C9A25F';this.style.transform='translateY(0)'">Request a Private Consultation</button>
                        </div>
                        <div class="lum-contact-sent" style="display:none;text-align:center;padding:24px 10px;">
                            <div style="font-size:48px;color:#C9A25F;margin-bottom:10px;">✓</div>
                            <div style="font-family:'Cormorant Garamond',serif;font-size:26px;color:#F6F2EA;font-weight:500;margin-bottom:6px;">Thank you — we'll be in touch.</div>
                            <div style="color:rgba(246,242,234,0.65);font-size:15px;line-height:1.7;">Isla or a member of the LUMORA team will reply personally within one business day.</div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_contact', 'lumora_contact' );

/* ===================================================================
   FOOTER — real columns, nav, social, copyright, LUMORA wordmark
   CSS classes: lum-footer-section, lum-footer, lum-foot-head,
                lum-social, lum-foot-bottom, lum-foot-cta
   =================================================================== */
function lumora_footer() {
    ob_start(); ?>
    <footer class="lum-footer-section elementor-section lum-footer" style="background:#0B1729;color:#F6F2EA;">
        <div class="elementor-container" style="max-width:1320px;margin:0 auto;">
            <div class="elementor-widget-wrap lum-grid-footer">

                <div class="elementor-widget" data-lum-reveal>
                    <div class="elementor-widget-container">
                        <a href="#top" class="lum-logo" style="color:#fff;font-size:30px;">LUMORA<span class="lum-dot">.</span></a>
                        <p style="color:rgba(246,242,234,0.7);font-size:15px;line-height:1.75;margin:22px 0 26px;max-width:320px;">
                            A private real estate practice placing architecturally distinct homes for buyers and sellers who value care over volume.
                        </p>
                        <div class="lum-social elementor-widget-social-icons elementor-grid" style="display:flex;gap:10px;">
                            <a href="#" class="elementor-grid-item" style="display:flex;align-items:center;justify-content:center;width:38px;height:38px;border-radius:999px;background:rgba(246,242,234,0.08);color:#fff;text-decoration:none;transition:background 0.25s,color 0.25s;" onmouseover="this.style.background='#C9A25F'" onmouseout="this.style.background='rgba(246,242,234,0.08)'">ig</a>
                            <a href="#" class="elementor-grid-item" style="display:flex;align-items:center;justify-content:center;width:38px;height:38px;border-radius:999px;background:rgba(246,242,234,0.08);color:#fff;text-decoration:none;transition:background 0.25s,color 0.25s;" onmouseover="this.style.background='#C9A25F'" onmouseout="this.style.background='rgba(246,242,234,0.08)'">in</a>
                            <a href="#" class="elementor-grid-item" style="display:flex;align-items:center;justify-content:center;width:38px;height:38px;border-radius:999px;background:rgba(246,242,234,0.08);color:#fff;text-decoration:none;transition:background 0.25s,color 0.25s;" onmouseover="this.style.background='#C9A25F'" onmouseout="this.style.background='rgba(246,242,234,0.08)'">✉</a>
                        </div>
                    </div>
                </div>

                <div class="elementor-widget" data-lum-reveal data-lum-delay="60">
                    <div class="elementor-widget-container">
                        <div class="lum-foot-head">Studio</div>
                        <ul class="elementor-icon-list-items" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;">
                            <li class="elementor-icon-list-item"><a href="#about" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">About LUMORA</a></li>
                            <li class="elementor-icon-list-item"><a href="#" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Active Mandates</a></li>
                            <li class="elementor-icon-list-item"><a href="#journal" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">The Journal</a></li>
                            <li class="elementor-icon-list-item"><a href="#contact" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="elementor-widget" data-lum-reveal data-lum-delay="120">
                    <div class="elementor-widget-container">
                        <div class="lum-foot-head">Service</div>
                        <ul class="elementor-icon-list-items" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;">
                            <li class="elementor-icon-list-item"><a href="#" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Private Sales</a></li>
                            <li class="elementor-icon-list-item"><a href="#" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Buyer Advisory</a></li>
                            <li class="elementor-icon-list-item"><a href="#" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Property Curation</a></li>
                            <li class="elementor-icon-list-item"><a href="#" style="color:rgba(246,242,234,0.75);text-decoration:none;font-size:15px;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.75)'">Off-Market Access</a></li>
                        </ul>
                    </div>
                </div>

                <div class="elementor-widget lum-foot-cta" data-lum-reveal data-lum-delay="180">
                    <div class="elementor-widget-container" style="flex-direction:column;align-items:flex-start;gap:12px;">
                        <div class="lum-foot-head">Visit</div>
                        <div style="color:rgba(246,242,234,0.8);font-size:15px;line-height:1.75;max-width:240px;">
                            214 Laurelwood Lane, Suite 402<br/>
                            The Watermark Building<br/>
                            San Francisco, CA 94105
                        </div>
                        <div style="margin-top:8px;">
                            <a href="#contact" class="lum-cta" style="background:#C9A25F;color:#12233A;padding:13px 26px;border-radius:999px;text-decoration:none;font-weight:600;font-size:13px;letter-spacing:0.14em;text-transform:uppercase;display:inline-block;">Book a Viewing</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="elementor-container lum-foot-bottom" style="max-width:1320px;margin:50px auto 0;border-top:1px solid rgba(246,242,234,0.12);">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;">
                <div style="color:rgba(246,242,234,0.55);font-size:13px;">© <?php echo esc_html( date('Y') ); ?> LUMORA Studio — All rights reserved.</div>
                <div style="display:flex;gap:22px;flex-wrap:wrap;">
                    <a href="#" style="color:rgba(246,242,234,0.55);font-size:13px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.55)'">Privacy</a>
                    <a href="#" style="color:rgba(246,242,234,0.55);font-size:13px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.55)'">Terms</a>
                    <a href="#" style="color:rgba(246,242,234,0.55);font-size:13px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#C9A25F'" onmouseout="this.style.color='rgba(246,242,234,0.55)'">Fair Housing</a>
                    <span style="color:rgba(246,242,234,0.35);font-size:13px;">Lic. RE-BRO #01928374</span>
                </div>
            </div>
        </div>
    </footer>
    <?php
    return ob_get_clean();
}
add_shortcode( 'lumora_footer', 'lumora_footer' );

/* ===================================================================
   COMPLETE HOMEPAGE — one shortcode to render EVERYTHING
   Usage: paste [lumora_homepage] into your homepage editor
          (Pages → Home → Edit → paste shortcode → Update)
   =================================================================== */
function lumora_homepage() {
    return lumora_hero()
         . lumora_stats()
         . lumora_listings()
         . lumora_about()
         . lumora_journal()
         . lumora_contact();
}
add_shortcode( 'lumora_homepage', 'lumora_homepage' );

/* ===================================================================
   SINGLE POST IMAGES — auto-inject journal images into post content
   =================================================================== */
add_filter( 'the_content', function( $content ) {
    if ( is_singular('post') && in_the_loop() && is_main_query() ) {
        global $post;
        $title = $post->post_title;
        $img = '';
        
        if ( strpos($title, 'Architectural Details') !== false ) {
            $img = lumora_img('journal_1');
        } elseif ( strpos($title, 'Where the City Pauses') !== false ) {
            $img = lumora_img('journal_2');
        } elseif ( strpos($title, 'Market Letter') !== false ) {
            $img = lumora_img('journal_3');
        }
        
        if ( $img ) {
            $img_html = '<img src="' . esc_url($img) . '" alt="' . esc_attr($title) . '" class="lum-post-hero-image" />';
            return $img_html . $content;
        }
    }
    return $content;
});

/* ===================================================================
   HEADER + FOOTER TEMPLATE OVERRIDES (Hello Elementor theme)
   — automatically replaces the default site header & footer so
   the user doesn't need Elementor Pro or a custom page template.
   Falls back gracefully if any filter is unavailable.
   =================================================================== */
add_action( 'template_redirect', function () {
    if ( is_admin() ) return;

    // If homepage is empty, auto-populate a sample page on first load
    $home_id = (int) get_option( 'page_on_front' );
    if ( ! $home_id ) {
        $existing = get_pages( array(
            'post_type'   => 'page',
            'title'       => 'LUMORA Home',
            'numberposts' => 1,
        ) );
        if ( empty( $existing ) ) {
            $home_id = wp_insert_post( array(
                'post_title'   => 'LUMORA Home',
                'post_content' => '[lumora_homepage]',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
            if ( $home_id && ! is_wp_error( $home_id ) ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home_id );
            }
        }
    }
} );

/* Remove Hello Elementor default header/footer so ours renders cleanly */
add_filter( 'hello_elementor_display_header_footer', '__return_false' );

add_action( 'wp_body_open', function() {
    echo lumora_header();
} );

add_action( 'wp_footer', function() {
    echo lumora_footer();
}, 1 );