<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?><?php if(is_front_page()) { echo ' – '.get_bloginfo('description'); } else { wp_title('–', true, 'left'); } ?></title>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/layout.css?v=2">
		<link href="/favicon.ico?v=2" rel="shortcut icon">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<script src="/wp-includes/js/jquery/jquery.js"></script>
		<script src="/wp-includes/js/jquery-visible-master/jquery.visible.js"></script>
		<script src="https://www.youtube.com/player_api" defer></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<script src="https://use.typekit.net/khp5iyp.js"></script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TDV97D8');</script>
        <!-- End Google Tag Manager -->
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script async defer src="https://www.googletagmanager.com/gtag/js?id=UA-75008330-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-75008330-1');
        </script>
		
		<?php wp_head(); ?>

		<?php if (get_post_type() === 'product') : ?>
			<script type=application/ld+json>
				{
					"@context": "https://schema.org/",
					"@type": "Product",
					"name": "<?php echo str_replace('®', '', get_the_title()); ?>",
					"image": [
						<?php 
							$i = 0;
							while ( have_rows('media') ) {
								the_row();
								if (get_sub_field('media_type') == 'image') {
									$image = get_sub_field('image');
									if ($i > 0) {
										echo ',';
									}
									echo '"' . $image['sizes']['galimage'] . '"';
									$i++;
								}
							}
						?>
					],
					"description": "<?php if( have_rows('content_below_media') ) {
						while ( have_rows('content_below_media') ) {
							the_row(); 
							if( get_row_layout() == 'text_field' ) {
        						echo str_replace(array("\r", "\n"), '', strip_tags(get_sub_field('text')));
							}
						}
					} ?>",
					"brand": {
						"@type": "Thing",
						"name": "LED iBOND"
					},
					"review": {
						"@type": "Review",
						"reviewRating": {
							"@type": "Rating",
							"ratingValue": "5",
							"bestRating": "5"
						},
						"author": {
							"@type": "person",
							"givenName": "Julie",
							"familyName": "Thestrup"
						}
					},
					"aggregateRating": {
						"@type": "AggregateRating",
						"ratingValue": "5",
						"reviewCount": "13"
					},
					"offers": {
						"@type": "Offer",
						"url": "<?php the_permalink(); ?>",
						"availability": "https://schema.org/InStock"
					}
				}
			</script> 
		<?php endif; ?>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "Organization",
				"address": {
					"@type": "PostalAddress",
					"addressLocality": "Hørsholm, Denmark",
					"postalCode": "2970",
					"streetAddress": "Agern Allé 5A"
				},
				"email": "info@ledibond.com",
				"name": "LED iBond",
				"telephone": "(+45) 70707855"
			}
		</script>
	</head>
	<body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDV97D8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
		<div class="headerbar<?php if(get_page_template_slug() == 'page-landing.php' || get_field('landing_page') ) { echo ' landing-page'; } ?>">
			<div class="header-shade shade"></div>
			<header>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img class="lazy header-logo" alt="Led iBond logo" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $logo = get_field('main_logo', 'options'); echo $logo['url']; ?>">
					<img class="lazy header-logo-res" alt="Led iBond logo" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $logo = get_field('main_logo_res', 'options'); echo $logo['url']; ?>">
				</a>
			</header>
			<?php if(!get_field('landing_page') ) { ?>
                <a href="#menu" class="res-btn">Menu</a>
                <div class="header-content" id="menu">
					<a href="#" class="close-menu">X</a>
                    <div class="lan-select">
                        <?php
                        $cur_lan = ICL_LANGUAGE_CODE;
                        $languages = icl_get_languages('skip_missing=0&orderby=custom');
                        foreach((array)$languages as $lang): 
                        ?>
                            <a rel="alternate" hreflang="<?php echo $lang['language_code']; ?>" href="<?php echo $lang['url']; ?>" class="lang_sel_sel <?php if($cur_lan == $lang['tag']) { echo 'cur-lan'; } ?>"><?php echo $lang['tag']; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="search-lan">
                        <?php echo get_search_form( $echo ); ?>
                    </div>
					<?php include('megsup.php'); ?>
                </div>
			<?php } ?>
			
		</div>
		<div id="content" role="main"<?php if(get_page_template_slug() == 'page-landing.php' || get_field('landing_page')) { echo ' class="landing-page"'; } ?>>
