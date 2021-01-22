<?php 
/*
* Template Name: List
*/

get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php if(get_field('header_image')) { ?>
				<main class="main-header-image">
					<div class="header-image">
						<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $header = get_field('header_image'); echo $header['sizes']['headerimage']; ?>"
							alt="<?php if ($header['alt']) {echo $header['alt'];}else{echo $header['title'];} ?>">
						<div class="header-image-title-bar <?php echo get_field('title_color'); ?>">
							<h1><?php the_title(); ?></h1>
							<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>
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
			<div class="column col-6 col-list np">
				
				<?php
				$contenttype = get_field('list_items');
				$args = array(
					'post_type' => $contenttype,
					'posts_per_page' => -1
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="column col-2 col-list-item col-field-search">
						<?php if(get_field('header_image')) { ?>
							<a href="<?php the_permalink(); ?>"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_field('header_image'); echo $img['sizes']['headerimagemicro']; ?>"
								alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>"></a>
						<?php } elseif(get_field('thumbnail')) { ?>
							<a href="<?php the_permalink(); ?>"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_field('thumbnail'); echo $img['sizes']['headerimagemicro']; ?>"
								alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>"></a>
						<?php } ?>
						
						
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php if($contenttype == 'post') { ?>
							&#91;<?php the_date(); ?>&#93;
						<?php } ?>
						<?php if(get_field('excerpt')) { ?>
							<?php the_field('excerpt'); ?>
						<?php } elseif(get_field('byline')) { ?>
							<?php the_field('byline'); ?>
						<?php } ?>
						</p>
					</div>	
				<?php endwhile; wp_reset_postdata(); endif; ?>
			</div>
				
				
				
			</article>
		</main>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
