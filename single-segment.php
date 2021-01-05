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
					<div class="non-header-image-title-bar">
							<h1><?php the_title(); ?></h1>
							<div></div>
							<?php if(get_field('byline')) { echo '<h2>'.get_field('byline').'</h2>'; } ?>
						
					</div>
			<?php } ?>

			
			
			
			
			<article>
				<column class="col-1 col-post-type-title">
					<div class="item-bar np">
						<h4><?php the_field('segment', 'options'); ?></h4>
					</div>
				</column>
			<column class="col-4 col-margin-r-1">

					<?php the_field('content_part_1'); ?>
					<?php if(get_field('selling_points')) { ?>
						
						<h3><?php the_field('selling_points_title'); ?></h3>
						
						<?php if( have_rows('selling_points') ): ?>
							<div class="col-bullets-con">
								<ul>
								<?php while ( have_rows('selling_points') ) : the_row(); ?>
									<li>
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
										<iframe id="ytplayer" type="text/html" width="100%" height="100%" data-category-consent="cookie_cat_marketing" 
src="" data-consent-src="https://www.youtube.com/embed/<?php the_sub_field('video_embed_code'); ?>?modestbranding=1&showinfo=0&rel=0" frameborder="0"></iframe>
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
					$cases = get_posts(array(
						'post_type' => 'case',
						'meta_query' => array(
							array(
								'key' => 'related_segments', // name of custom field
								'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => 'LIKE'
							)
						)
					));
				
					$products = get_posts(array(
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' => 'related_segments', // name of custom field
								'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => 'LIKE'
							)
						)
					));
				
					if((count($cases) + count($products)) > 1) { 
						$relcolcon = '4'; 
					} else { 
						$relcolcon = '2'; 
					}
				?>
				
				
					<column class="col-<?php echo $relcolcon; ?> np col-list-con">
						
						<?php 
							if( $cases ): 
							if((count($cases)) > 1) { 
								$relcol = '4'; 
							} else { 
								$relcol = '2'; 
							}
						?>
							<column class="col-<?php echo $relcol; ?> np col-list col-list-item">
								<div class="title-bar">
									<h2><?php the_field('related_cases', 'options'); ?></h2>
								</div>
								<?php foreach( $cases as $case ): ?>
									<column class="col-2">
										<a href="<?php echo get_permalink( $case->ID ); ?>"><img src="<?php $relimg = get_field('header_image', $case->ID); echo $relimg[sizes][headerimagesmall]; ?>"></a>
										<h3><a href="<?php echo get_permalink( $case->ID ); ?>"><?php echo get_the_title( $case->ID ); ?></a></h3>

									</column>
								<?php endforeach; ?>
							</column>
						<?php endif; ?>
						
						<?php 
							if( $products ): 
							if((count($products)) > 1) { 
								$relcol = '4'; 
							} else { 
								$relcol = '2'; 
							}
						?>
							<column class="col-<?php echo $relcol; ?> np col-list col-list-item">
								<div class="title-bar">
									<h2><?php the_field('related_products', 'options'); ?></h2>
								</div>
								<?php foreach( $products as $product ): ?>
									<column class="col-2">
										<a href="<?php echo get_permalink( $product->ID ); ?>"><img src="<?php $relimg = get_field('header_image', $product->ID); echo $relimg[sizes][headerimagesmall]; ?>"></a>
										<h3><a href="<?php echo get_permalink( $product->ID ); ?>"><?php echo get_the_title( $product->ID ); ?></a></h3>

									</column>
								<?php endforeach; ?>
							</column>
						<?php endif; ?>
						
						
						
						
						
						
					<?php /*?>	<?php 
						$posts = get_field('related_products');
						if( $posts ): ?>
							<div class="title-bar">
								<h2>Related Products</h2>
							</div>
							<column class="col-4 np col-list">
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
									<column class="col-2">
										<a href="<?php the_permalink(); ?>"><img src="<?php $relimg = get_field('header_image'); echo $relimg[sizes][headerimagesmall]; ?>"></a>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									</column>
								<?php endforeach; ?>
							</column>
						<?php wp_reset_postdata(); endif; ?><?php */?>
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
