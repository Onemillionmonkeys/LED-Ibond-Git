<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php if(get_field('header_image')) { ?>
				<main class="main-header-image">
					<div class="header-image">
						<img src="<?php $header = get_field('header_image'); echo $header[sizes][headerimage]; ?>">
						<div class="header-image-title-bar <?php echo get_field('title_color'); ?> <?php if(get_field('title_background')) { echo 'txt-bg'; } ?>">
							<h1><?php the_title(); ?></h1>
							<div></div>
							<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>
                            
						</div>
					</div>
			<?php } else { ?>
				<main>		
			<?php } ?>

			
			
			
			
			<article>
				<column class="col-1 col-post-type-title">
					<div class="item-bar np">
						<h4><?php the_field('case', 'options'); ?></h4>
					</div>
				</column>
				<column class="col-4 col-presentation">
					<?php the_field('content_part_1'); ?>
					<?php if(get_field('selling_points')) { ?>
						<div class="item-bar np">
							<h3><?php the_field('selling_points_title'); ?></h3>
						</div>
						<?php if( have_rows('selling_points') ): ?>
							<div class="col-bullets-con">
								<ul>
								<?php while ( have_rows('selling_points') ) : the_row(); ?>
									<li>
										<b><?php the_sub_field('point_title'); ?></b><br>
										<?php the_sub_field('point'); ?>	
									</li>
								<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
					
					<?php } ?>
				</column>
				<?php
				if( have_rows('media') ): $galnum = 0;
				?>
					<column class="col-6 col-media-gallery">
						<div class="gal-media-con">
							<?php while ( have_rows('media') ) : the_row(); ?>
								<div class="gal-item" galnum="<?php echo ++$galnum; ?>">
									<?php if(get_sub_field('media_type') == 'image') { ?>
										<img src="<?php $image = get_sub_field('image'); echo $image[sizes][galimage]; ?>">
										<?php if(get_sub_field('media_title')) { ?>
											<div class="gal-item-text <?php the_sub_field('media_description_colour'); ?>">
												<h3><?php the_sub_field('media_title'); ?></h3>
												<?php if(get_sub_field('media_description')) { ?>
													<p><?php the_sub_field('media_description'); ?></p>
												<?php } ?>
											</div>
										<?php } ?>
									<?php } else { ?>
										<iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_sub_field('video_embed_code'); ?>?modestbranding=1&showinfo=0&rel=0" frameborder="0"></iframe>
									<?php } ?>
								</div>
							<?php endwhile; ?>
						</div>
						<?php if(count(get_field('media')) > 0) { ?>
							<div class="nav-btn nav-btn-prev"></div>
							<div class="nav-btn nav-btn-next"></div>
							<div class="nav-bar">
								<?php for($x = 1; $x <= $galnum; $x++) { ?>
									<div class="nav-bar-btn <?php if($x == 1) { echo 'nav-bar-active'; } ?>" galnum="<?php echo $x; ?>"></div>
								<?php } ?>
							</div>
						<?php } ?>
					</column>
					
					
				<?php
				endif;
				?>
				
				
				<?php if(get_field('content_below_media')) { ?>
					<column class="col-6 col-list np nmb">
					<?php include ('content.php'); ?>
					</column>
				<?php } ?>
				
					
				<?php 
					$segments = get_field('related_segments');
					$products = get_field('related_products');
					
					if((count($segments) + count($products)) > 1) { 
						$relcolcon = '4'; 
					} else { 
						$relcolcon = '2'; 
					}
				?>
				<column class="col-<?php echo $relcolcon; ?> np col-list-con">
					<?php 
						if( $segments ):
						if((count($segments)) > 1) { 
							$relcol = '4'; 
						} else { 
							$relcol = '2'; 
						}
					?>
						<column class="col-<?php echo $relcol; ?> np col-list">
							<div class="title-bar">
								<h2><?php the_field('related_segment', 'options'); ?></h2>
							</div>
							<?php foreach( $segments as $post): // variable must be called $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
								<column class="col-2 col-list-item">
									<a href="<?php the_permalink(); ?>"><img src="<?php $relimg = get_field('header_image'); echo $relimg[sizes][headerimagesmall]; ?>"></a>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								</column>
							<?php endforeach; ?>
						</column>
					<?php wp_reset_postdata(); endif; ?>
						
					<?php 
						if( $products ): 
						if((count($products)) > 1) { 
							$relcol = '4'; 
						} else { 
							$relcol = '2'; 
						}
					?>
						
						<column class="col-<?php echo $relcol; ?> np col-list">
							<div class="title-bar">
								<h2><?php the_field('related_products', 'options'); ?></h2>
							</div>
							<?php foreach( $products as $post): // variable must be called $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
								<column class="col-2 col-list-item">
									<a href="<?php the_permalink(); ?>"><img src="<?php $relimg = get_field('header_image'); echo $relimg[sizes][headerimagesmall]; ?>"></a>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</column>
							<?php endforeach; ?>
						</column>
					<?php wp_reset_postdata(); endif; ?>
				</column>
				
				
				<?php
				if( have_rows('downloads') ): ?>
					<column class="download-col col-2">
						<div class="title-bar np">
							<h2><?php the_field('downloads', 'options'); ?></h2>
						</div>
							<?php while ( have_rows('downloads') ) : the_row(); ?>
								<div class="download">
									<?php $file = get_sub_field('file'); ?>
									<a href="<?php echo $file['url']; ?>" download rel="nofollow"><?php the_sub_field('title'); ?><?php if(get_sub_field('filetype')) { ?> <span>&#40;<?php the_sub_field('filetype'); ?>&#41;</span><?php } ?></a>
								</div>
							<?php endwhile; ?>

					</column>
				<?php 
				endif;
				?>
				
			</article>
		</main>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
