<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php if ( ! empty( $post->post_parent ) ) : ?>
					
				<?php endif; ?>
				
<?php endwhile; ?>
<?php get_footer(); ?>
