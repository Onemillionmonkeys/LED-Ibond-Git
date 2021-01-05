<?php get_header(); ?>
	<main class="main-header-image">
		<div class="non-header-image">
			<div class="non-header-image-title-bar">
				<h1><?php printf( __( '%s'), '' . get_search_query() . '' ); ?></h1>
				<h2><?php the_field('search_page_title', 'options'); ?></h2>
			</div>
		</div>
		<article>
			<column class="col-6 col-list np nmb">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<column class="col-field-search col-2">
							<a href="<?php the_permalink(); ?>"><img src="<?php if(get_field('header_image')) { $header = get_field('header_image'); } else { $header = get_field('placeholder_thumb', 'options'); } echo $header[sizes][headerimagemicro]; ?>"></a>
			   				<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php the_field('excerpt'); ?>
								
							<?php 
								$posttype = get_post_type();
								$obj = get_post_type_object( $posttype );
								echo '['.$obj->labels->singular_name.']';
							?>
							</p>
						</column>
										

					<?php endwhile; ?>
				<?php else : ?>
				    <h2><?php _e( 'Nothing Found', 'boilerplate' ); ?></h2>
				
				<?php endif; ?>
					
			</column>
		</article>
	</main>




<?php get_footer(); ?>
