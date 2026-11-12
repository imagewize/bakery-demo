<?php
/**
 * Title: Bakkerij Lindeboom — Homepage
 * Slug: lindeboom/homepage
 * Categories: featured
 * Description: The Bakkerij Lindeboom homepage — hero, taarten, workshop, over ons, bestelformulier and contact — composed from Aludra blocks.
 *
 * @package Lindeboom
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!-- ===== Hero: core/cover met volledig uitlopende foto en tekst erover (gap: geen aludra-blok heeft een full-bleed foto) ===== -->
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/img/tabitha-turner-Ns2aJ5OXKds-unsplash.jpg' ) ); ?>","alt":"Croissants en pains au chocolat op een houten plank, met een deegroller, garde, eieren, boter en chocolade, van boven gefotografeerd","dimRatio":0,"minHeight":70,"minHeightUnit":"vh","align":"full","className":"lindeboom-hero","anchor":"hero"} -->
<div class="wp-block-cover alignfull lindeboom-hero" style="min-height:70vh" id="hero">
<img class="wp-block-cover__image-background" alt="Croissants en pains au chocolat op een houten plank, met een deegroller, garde, eieren, boter en chocolade, van boven gefotografeerd" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/tabitha-turner-Ns2aJ5OXKds-unsplash.jpg' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
<div class="wp-block-cover__inner-container">
<!-- wp:paragraph {"className":"lindeboom-hero__kicker","textColor":"base"} -->
<p class="lindeboom-hero__kicker has-base-color has-text-color">Familiebakkerij in Utrecht — sinds 1987</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size">Elke ochtend vers, al bijna veertig jaar.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lindeboom-hero__lead","textColor":"base"} -->
<p class="lindeboom-hero__lead has-base-color has-text-color">Brood, taarten en gebak, gebakken door twaalf mensen die je bij naam kennen.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"lindeboom-hero__actions","layout":{"type":"flex"}} -->
<div class="wp-block-buttons lindeboom-hero__actions"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Bestel een taart</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"contrast","textColor":"base","className":"lindeboom-btn--inverse"} -->
<div class="wp-block-button lindeboom-btn--inverse"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Kom langs in de winkel</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"lindeboom-hero__caption"} -->
<p class="lindeboom-hero__caption">Croissants en pains au chocolat</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- ===== Taarten: aludra/feature-cards (gekopieerd uit section-capabilities.php, inhoud vervangen) ===== -->
<!-- wp:aludra/feature-cards {"anchor":"taarten"} -->
<div class="wp-block-aludra-feature-cards alignfull" id="taarten"><div class="feature-cards__inner"><!-- wp:group {"className":"feature-cards__header","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group feature-cards__header"><!-- wp:heading -->
<h2 class="wp-block-heading">Onze taarten</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lindeboom-cakes__intro"} -->
<p class="lindeboom-cakes__intro">We bakken ze zelf, met boter in plaats van margarine. Bestel ze minimaal twee dagen vooruit; voor verse vruchtjes reken je drie dagen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-cards__grid","layout":{"type":"default"}} -->
<div class="wp-block-group feature-cards__grid"><!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","aspectRatio":"4/5","scale":"cover"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/katie-rosario-QNyRp21hb5I-unsplash.jpg' ) ); ?>" alt="Roze driptaart met een ijseshoorntje bovenop en een gesneden punt ernaast" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Feestdriptaart</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Luchtige vanillecake met botercrème onder een roze chocoladedrup. Voor 8 tot 12 personen.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lindeboom-cake__meta"} -->
<p class="lindeboom-cake__meta"><span class="lindeboom-cake__price">vanaf € 39,50</span> <a href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Bestel deze taart</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","aspectRatio":"4/5","scale":"cover"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/heather-barnes-WbZesfqwR-A-unsplash.jpg' ) ); ?>" alt="Gestapelde macarons in roze, lila en groen" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Macarons</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Elke week nieuwe smaken uit de winkel; deze week citroen, framboos en pistache.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lindeboom-cake__meta"} -->
<p class="lindeboom-cake__meta"><span class="lindeboom-cake__price">per 6 € 12,50</span> <a href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Bestel macarons</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","aspectRatio":"4/5","scale":"cover"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/deva-williamson-S2jw81lfrG0-unsplash.jpg' ) ); ?>" alt="Cupcakes met roze frosting en verse aardbeien, met een gouden vork" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Aardbeiencupcakes</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Zachte vanillecake met aardbeienbotercrème en een verse aardbei erbovenop.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lindeboom-cake__meta"} -->
<p class="lindeboom-cake__meta"><span class="lindeboom-cake__price">per 6 € 15,00</span> <a href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Bestel deze taart</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group feature-card"><!-- wp:group {"className":"feature-card__icon-wrap","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group feature-card__icon-wrap"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","aspectRatio":"4/5","scale":"cover"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/mockup-graphics-OdE9bKLNhQs-unsplash.jpg' ) ); ?>" alt="Gesneden punt aardbeientaart op een witte ondergrond" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Aardbeientaart</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Krokante boterbodem met vanillecrème, slagroom en verse aardbeien van de week.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lindeboom-cake__meta"} -->
<p class="lindeboom-cake__meta"><span class="lindeboom-cake__price">vanaf € 32,00</span> <a href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Bestel deze taart</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lindeboom-cakes__note"} -->
<p class="lindeboom-cakes__note">Grotere taarten of een eigen ontwerp? Schrijf het in het bericht bij je bestelling; we bellen je erover mee.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:aludra/feature-cards -->

<!-- ===== Workshop: aludra/split-section + aludra/service-blocks (gekopieerd uit section-split.php) ===== -->
<!-- wp:aludra/split-section {"label":"","heading":"","lead":"","mediaWidth":46,"tint":true,"anchor":"werkshop"} -->
<div class="wp-block-aludra-split-section alignfull is-tinted" id="werkshop" style="margin-top:0;margin-bottom:0"><div class="split-section__shell"><div class="split-section__header"><p class="split-section__label"></p><h2 class="split-section__heading"></h2><p class="split-section__lead"></p></div><div class="split-section__panes" style="--aludra-split-media:46%"><!-- wp:group {"className":"split-section__media"} -->
<div class="wp-block-group split-section__media"><!-- wp:image {"sizeSlug":"full","className":"lindeboom-workshop__foto"} -->
<figure class="wp-block-image size-full lindeboom-workshop__foto"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/nadya-spetnitskaya-tOYiQxF9-Ys-unsplash.jpg' ) ); ?>" alt="Handen die deeg kneden op een met bloem bestoven werkblad, met een deegroller erachter"/><figcaption class="wp-element-caption">Handen in het deeg</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"split-section__content"} -->
<div class="wp-block-group split-section__content"><!-- wp:heading {"level":2,"className":"lindeboom-workshop__title"} -->
<h2 class="wp-block-heading lindeboom-workshop__title">Bakworkshop op zaterdag</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lindeboom-workshop__intro"} -->
<p class="lindeboom-workshop__intro">Eens per maand kneden we samen met maximaal tien gasten een deeg tot brood. Je gaat naar huis met je eigen desembrood en het recept erbij.</p>
<!-- /wp:paragraph -->

<!-- wp:aludra/service-blocks -->
<div class="wp-block-aludra-service-blocks alignwide" style="margin-top:0;margin-bottom:0"><div class="service-blocks__inner"><!-- wp:group {"className":"service-blocks__list"} -->
<div class="wp-block-group service-blocks__list"><!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">01</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"service-block__title"} -->
<p class="service-block__title">Wanneer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">Eerste zaterdag van de maand, 09.30 – 13.00 uur</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">02</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"service-block__title"} -->
<p class="service-block__title">Groep</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">Maximaal 10 deelnemers, vanaf 12 jaar</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">03</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"service-block__title"} -->
<p class="service-block__title">Prijs</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc">€ 45 per persoon, inclusief koffie, lunch en brood</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/service-blocks -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/#bestellen' ) ); ?>">Vraag naar de eerstvolgende datum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div></div>
<!-- /wp:aludra/split-section -->

<!-- ===== Over ons: aludra/about (gekopieerd uit section-about.php) ===== -->
<!-- wp:aludra/about {"anchor":"over-ons"} -->
<div class="wp-block-aludra-about alignfull" id="over-ons" style="margin-top:0;margin-bottom:0"><div class="about-section__content"><!-- wp:image {"sizeSlug":"full","aspectRatio":"4/3","scale":"cover","className":"lindeboom-about__foto"} -->
<figure class="wp-block-image size-full lindeboom-about__foto"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/alan-aprilio-FJyjcrEBsMo-unsplash.jpg' ) ); ?>" alt="Desembrood met een gekartelde snee op een houten plank" style="aspect-ratio:4/3;object-fit:cover"/><figcaption class="wp-element-caption">Desembrood</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lindeboom-about__text","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group lindeboom-about__text"><!-- wp:heading {"level":2,"className":"about-section__title"} -->
<h2 class="wp-block-heading about-section__title">Over Lindeboom</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"about-section__lead"} -->
<p class="about-section__lead">In 1987 stak Wim Lindeboom de eerste oven aan, op de hoek van de Nachtegaalstraat. Nu staat er elke ochtend om vier uur al een team van twaalf mensen te bakken: dochters, kleinkinderen en een paar buurtgenoten.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"about-section__closing"} -->
<p class="about-section__closing">Ons desembrood rijst twee dagen op eigen gisting, en wat om vier uur uit de oven komt, is om zes uur in de kast. Daarna rijden we brood en gebak langs de kantines en kantoren in Utrecht-Oost.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/about -->

<!-- ===== Bestellen: aludra/contact-section (gekopieerd uit section-contact.php; formulier = Contact Form 7) ===== -->
<!-- wp:aludra/contact-section {"anchor":"bestellen"} -->
<div class="wp-block-aludra-contact-section alignfull" id="bestellen" style="margin-top:0;margin-bottom:0"><div class="contact-section__inner"><!-- wp:group {"className":"contact-section__intro","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__intro"><!-- wp:heading {"className":"contact-section__heading"} -->
<h2 class="wp-block-heading contact-section__heading">Bestel een taart</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-section__sub"} -->
<p class="contact-section__sub">Vul het formulier in en je hoort binnen één werkdag van ons. Liever direct praten? Bel <a href="tel:+31302518240">030 251 82 40</a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-section__card","layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__card"><!-- wp:shortcode -->
[contact-form-7 id="6" title="Bestel een taart"]
<!-- /wp:shortcode -->

<!-- wp:paragraph {"className":"lindeboom-order__response","fontSize":"small"} -->
<p class="lindeboom-order__response has-small-font-size">Je krijgt een bevestiging van ons op e-mail, en bij spoed bellen we je liever even.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/contact-section -->

<!-- ===== Contact: aludra/icon-grid (gekopieerd uit section-icon-grid.php) ===== -->
<!-- wp:aludra/icon-grid {"align":"","anchor":"contact"} -->
<div class="wp-block-aludra-icon-grid" id="contact"><div class="icon-grid__inner"><!-- wp:heading {"level":2,"className":"icon-grid__title"} -->
<h2 class="wp-block-heading icon-grid__title">Kom langs in de winkel</h2>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"full","className":"lindeboom-contact__foto"} -->
<figure class="wp-block-image size-full lindeboom-contact__foto"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/do-nhu--CC1HQ0O8YY-unsplash.jpg' ) ); ?>" alt="Winkelgevel met patisseriebord bij avond, met daaronder de verlichte keuken waar gebakken wordt"/><figcaption class="wp-element-caption">Onze winkel, &rsquo;s avonds voor het sluiten</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"icon-grid__grid"} -->
<div class="wp-block-group icon-grid__grid"><!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-map.svg' ) ); ?>" alt="Adres"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Nachtegaalstraat 41, 3581 AC Utrecht</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-chat.svg' ) ); ?>" alt="Telefoon"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><a href="tel:+31302518240">030 251 82 40</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-mail.svg' ) ); ?>" alt="E-mail"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><a href="mailto:hallo@bakkerijlindeboom.nl">hallo@bakkerijlindeboom.nl</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-link.svg' ) ); ?>" alt="Route"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><a href="https://maps.google.com/?q=Nachtegaalstraat+41,+Utrecht">Route plannen</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) ); ?>" alt="Openingstijden"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Dinsdag t/m vrijdag</strong> 07.00 – 18.00</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) ); ?>" alt="Openingstijden"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Zaterdag</strong> 07.00 – 17.00</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"icon-grid__item"} -->
<div class="wp-block-group icon-grid__item"><!-- wp:group {"className":"icon-grid__icon"} -->
<div class="wp-block-group icon-grid__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) ); ?>" alt="Openingstijden"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"icon-grid__text"} -->
<p class="icon-grid__text"><strong>Zondag en maandag</strong> gesloten</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/icon-grid -->
