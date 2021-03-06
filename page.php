<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php if(get_field('header_image')) { ?>
				<main class="main-header-image">
					<div class="header-image">
						<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $header = get_field('header_image'); echo $header['sizes']['headerimage']; ?>"
							alt="<?php if ($header['alt']) {echo $header['alt'];}else{echo $header['title'];} ?>">
						<div class="header-image-title-bar <?php echo get_field('title_color'); ?>">
							<h1><?php if (get_field('title_overwrite')) { the_field('title_overwrite'); } else { the_title(); }; ?></h1>
							<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>
						</div>
					</div>
			<?php } else { ?>
				<main class="main-header-image">
					<div class="non-header-image">
						<div class="non-header-image-title-bar">
								<h1><?php if (get_field('title_overwrite')) { the_field('title_overwrite'); } else { the_title(); }; ?></h1>
								<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>

						</div>
					</div>
			<?php } ?>
			<article>
				<?php if(get_field('content_below_media')) { ?>
					<div class="column col-6 col-list np nmb">
						<?php include ('content.php'); ?>
					</div>
				<?php } ?>				
			</article>
		</main>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
