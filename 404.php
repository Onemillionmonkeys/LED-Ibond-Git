<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); 
$products = get_posts(array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
));
?>
    <article id="post-0" class="post error404 not-found" role="main">
        <div class="error404-header" style="background-image: url(<?php the_field('hero_background_image', 'option'); ?>)">
            <h1>
                <span><?php _e( '404 error', 'boilerplate' ); ?></span><br>
                <span><?php _e( 'Page not found', 'boilerplate' ); ?></span>
            </h1>
        </div>
        <div class="error404-container">
            <p><?php echo sprintf( 
                __( 'We couldn\'t locate the requested URL. Please go back to the <a href="%1$s">home page</a> or navigate straight to one of our products.', 'boilerplate' ),
                get_home_url() );
            ?></p>
            <div class="column error404-products">
                <?php foreach ($products as $prod) : ?>
                    <div class="error404-products__single">
                        <a href="<?php echo get_the_permalink($prod->ID); ?>">
                            <?php if(get_field('header_image', $prod->ID)) {
                                $img = get_field('header_image', $prod->ID);
                            } elseif (get_field('thumbnail', $prod->ID)) {
                                $img = get_field('thumbnail', $prod->ID);
                            } 
                            $src = $img['sizes']['headerimagemicro'];
                            ?>
                            <img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php echo $src; ?>"
                                alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>">
                            <span><?php echo get_the_title($prod->ID); ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
<?php get_footer(); ?>