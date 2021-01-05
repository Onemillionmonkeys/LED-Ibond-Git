<?php 
/*
* Template Name: Downloads
*/

get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<main class="main-header-image">
			<div class="non-header-image">
				<div class="non-header-image-title-bar">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			
			<article>
				<column class="col-6 col-list np">
					<?php 
						$contenttype = array('product', 'case');
						$contenttitle = array(get_field('products', 'options'), get_field('case', 'options'));
						for($x = 0; $x < sizeof($contenttype); $x++) {
					?>
						<?php 	
							$args = array(
								'post_type' => $contenttype[$x],
								'posts_per_page' => -1
							);

							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) : 
						?>
							<column class="col-6 nmb">
								<h2><?php echo $contenttitle[$x]; ?></h2>
							</column>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php if( have_rows('downloads') ): ?>
									<column class="download-col col-2">
										<div class="title-bar np">
											<h3><?php the_title(); ?></h3>
										</div>
										<?php while ( have_rows('downloads') ) : the_row(); ?>
											<div class="download">
												<?php $file = get_sub_field('file'); ?>
												<a href="<?php echo $file['url']; ?>" download rel="nofollow"><?php the_sub_field('title'); ?><?php if(get_sub_field('filetype')) { ?> <span>&#40;<?php the_sub_field('filetype'); ?>&#41;</span><?php } ?></a>
											</div>
										<?php endwhile; ?>
									</column>
								<?php endif; ?>
							<?php endwhile; wp_reset_postdata(); ?>
						<?php endif; ?>
					<?php } ?>
				</column>
			</article>
		</main>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
