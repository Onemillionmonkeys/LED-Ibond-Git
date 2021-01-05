<?php 
/*
* Template Name: Landing
*/

get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php if(get_field('header_image')) { ?>
				<main class="main-header-image">
					<div class="header-image landing-header-image">
						<img src="<?php $header = get_field('header_image'); echo $header[sizes][headerimage]; ?>">
						<div class="header-image-title-bar <?php echo get_field('title_color'); ?>">
							<h1><?php the_title(); ?></h1>
							<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>
                            <?php if(get_field('hero_button_text')) { echo '<div class="hero-btn hero-btn-header">'.get_field('hero_button_text').'</div>'; } ?>
						</div>
					</div>
			<?php } else { ?>
				<main class="main-header-image">
					<div class="non-header-image">
						<div class="non-header-image-title-bar">
								<h1><?php the_title(); ?></h1>
								<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>

						</div>
					</div>
			<?php } ?>

			
			
			
			
			<article>
				
				<?php if(get_field('content_below_media')) { ?>
					<column class="col-6 col-list np nmb">
					<?php include ('content.php'); ?>
					</column>
				<?php } ?>
				
				
			</article>
		</main>
        <div class="slide-con col-subscription">
            <div class="hero-pop-up-bg"></div>
            <div class="hero-slide slide-obj hero-pop-up">
                <div class="slide-text">
                    <h1><?php the_field('pop_up_title'); ?></h1>

                </div>
                <div class="hero-pop-up-kill">X</div>
                <div class="subscription">
                    <div class="subscription-text">
                         <?php the_field('pop_up_text'); ?>
                    </div>
                    <?php echo (get_field('german')) ?  do_shortcode( '[contact-form-7 id="6138" title="Contact form Landing Deutch"]' ) : do_shortcode( '[contact-form-7 id="5267" title="Contact form Landing"]' ); ?>
            </div>
        </div>
                    
                    
                    
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
