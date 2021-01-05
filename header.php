<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> 
        <?php if(is_front_page()) { echo ' – '.get_bloginfo('description'); } else { wp_title('–', true, 'left'); } ?></title>
		<link href="<?php bloginfo('url'); ?>" rel="canonical" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/layout.css?v=6" type='text/css'>
		<link href="https://ledibond.com/favicon.ico?v=2" rel="shortcut icon">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<script type="text/javascript" src="https://ledibond.com/wp-includes/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="https://ledibond.com/wp-includes/js/jquery-visible-master/jquery.visible.js"></script>
		<script type="text/javascript" src="https://www.youtube.com/player_api"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
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
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-75008330-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-75008330-1');
        </script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDV97D8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
		<div class="headerbar<?php if(get_page_template_slug() == 'page-landing.php' ) { echo ' landing-page'; } ?>">
			<div class="header-shade shade"></div>
            
			<header role="banner">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="header-logo" src="<?php $logo = get_field('main_logo', 'options'); echo $logo[url]; ?>"><img class="header-logo-res" src="<?php $logo = get_field('main_logo_res', 'options'); echo $logo[url]; ?>"></a>
			</header>
			<?php if(!get_field('landing_page') ) { ?>
                <div class="header-content">
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
                    <?php /*?><p class="p1">p1</p>
                        <p class="p2">p2</p>
                        <p class="p3">p3</p><?php */?>
                </div>
                <div class="res-btn">Menu</div>
                <?php include('megsup.php'); ?>
			<?php } ?>
			
		</div>
		<section id="content" role="main"<?php if(get_page_template_slug() == 'page-landing.php' ) { echo ' class="landing-page"'; } ?>>
