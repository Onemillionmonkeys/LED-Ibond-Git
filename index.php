<?php get_header(); ?>
	<main>
		<div class="slide-con">
			<?php $slidenum = -1; ?>
			<?php /*?><?php while ( have_rows('front_slides', 'options') ) : the_row(); ?>
				<div class="slide" data-slidenum="<?php echo ++$slidenum; ?>">
					<div class="img">
						<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $slideimg = get_sub_field('main_image'); echo $slideimg['url']; ?>">
					</div>
					<div class="slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?>">
						<?php if(get_sub_field('title')) { ?><h1><?php the_sub_field('title'); ?></h1><?php } ?>
						<?php if(get_sub_field('content')) { ?><p><?php the_sub_field('content'); ?></p><?php } ?>
					</div>
					
				</div>
			<?php endwhile; ?><?php */?>
			
			<?php if( have_rows('frontpage_slides', 'options') ): while ( have_rows('frontpage_slides', 'options') ) : the_row(); ?>

					<?php if( get_row_layout() == 'fullscreen_image' ): ?>

						<div class="slide slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
							<div class="img">
								<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $slideimg = get_sub_field('image'); echo $slideimg['sizes']['frontpageimage']; ?>"
                                    alt="<?php if ($slideimg['alt']) {echo $slideimg['alt'];}else{echo $slideimg['title'];} ?>">
							</div>
							<?php /*?><div class="slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?>">
								<?php if(get_sub_field('title')) { ?><h1><?php the_sub_field('title'); ?></h1><?php } ?>
								<?php if(get_sub_field('content')) { ?><p><?php the_sub_field('content'); ?></p><?php } ?>
							</div><?php */?>
							<?php if( have_rows('texts')) : $txtnum = 0; while ( have_rows('texts') ) : the_row(); ?>
								<div class="slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?> <?php if(get_sub_field('text_background')) { echo 'txt-bg'; } ?>" slidetxtnum="<?php echo $txtnum++; ?>">
									<?php if(get_sub_field('title')) { ?>
										<?php if(get_sub_field('optional_link')) { ?>
											<h1><a href="<?php the_sub_field('optional_link'); ?>"><?php the_sub_field('title'); ?></a></h1>
										<?php } else { ?>
											<h1><?php the_sub_field('title'); ?></h1>
										<?php } ?>
									<?php } ?>
									<?php if(get_sub_field('content')) { ?>
										<?php if(get_sub_field('optional_link')) { ?>
											<p><a href="<?php the_sub_field('optional_link'); ?>"><?php the_sub_field('content'); ?></a></p>
										<?php } else { ?>
											<p><?php the_sub_field('content'); ?></p>
										<?php } ?>
									<?php } ?>
								</div>
							<?php endwhile; endif; ?>
							

						</div>
                    <?php elseif( get_row_layout() == 'frontpage_slider' ): ?>
                        
                            <div class="frontpage-slide col-media-gallery slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
                                <div class="gal-media-con">
                                    <?php $galnum = 0; while ( have_rows('slides') ) : the_row(); ?>
                                        <div class="gal-item" data-galnum="<?php echo ++$galnum; ?>">
                                            <img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $image = get_sub_field('slider_image'); echo $image['sizes']['galimage']; ?>"
                                                alt="<?php if ($image['alt']) {echo $image['alt'];}else{echo $image['title'];} ?>">
                                            <?php if(get_sub_field('title')) : ?>
                                                <div class="gal-slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?> <?php if(get_sub_field('text_background')) { echo 'txt-bg'; } ?>">
                                                    <?php if(get_sub_field('title')) { ?>
                                                        <?php if(get_sub_field('optional_link')) { ?>
                                                            <h1><a href="<?php the_sub_field('optional_link'); ?>"><?php the_sub_field('title'); ?></a></h1>
                                                        <?php } else { ?>
                                                            <h1><?php the_sub_field('title'); ?></h1>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if(get_sub_field('content')) { ?>
                                                        <?php if(get_sub_field('optional_link')) { ?>
                                                            <p><a href="<?php the_sub_field('optional_link'); ?>"><?php the_sub_field('content'); ?></a></p>
                                                        <?php } else { ?>
                                                            <p><?php the_sub_field('content'); ?></p>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($image['caption'] != '') { echo '<p class="figcaption">'.$image['caption'].'</p>'; } ?>
        								</div>
                                    <?php endwhile; ?>
                                </div>
                                <?php if($galnum > 1) { ?>
                                    <div class="nav-btn nav-btn-prev">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 16 32" style="enable-background:new 0 0 16 32;" xml:space="preserve">
                                            <polyline class="st0" points="15,30 1,16 15,2 "/>
                                        </svg>
                                    </div>
                                    <div class="nav-btn nav-btn-next">
                                        <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 16 32" style="enable-background:new 0 0 16 32;" xml:space="preserve">
                                        
                                            <polyline class="st0" points="1,30 15,16 1,2 "/>
                                        </svg>

                                    </div>
                                    <div class="nav-bar">
                                        <?php for($x = 1; $x <= $galnum; $x++) { ?>
                                            <div class="nav-bar-btn <?php if($x == 1) { echo 'nav-bar-active'; } ?>" data-galnum="<?php echo $x; ?>"></div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
            
                        
					<?php elseif( get_row_layout() == 'information_bar' ): ?>
						<div class="info-slide slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
							<div class="slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?>">
								<?php if(get_sub_field('title')) { ?><h1><?php the_sub_field('title'); ?></h1><?php } ?>
								<?php if(get_sub_field('content')) { ?><p><?php the_sub_field('content'); ?></p><?php } ?>
							</div>
						</div>
					<?php elseif( get_row_layout() == 'icons' ): ?>
						<div class="icon-slide slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
							<div class="slide-text <?php the_sub_field('text_colour'); ?> <?php the_sub_field('text_position'); ?>">
								<?php if(get_sub_field('title')) { ?><h1><?php the_sub_field('title'); ?></h1><?php } ?>
								<?php the_sub_field('icons_content'); ?>
							</div>
							<div class="icon-divs">
								<?php if( have_rows('icon')) : while ( have_rows('icon') ) : the_row(); ?>
									<div class="icon-div">
										<a href="<?php the_sub_field('link'); ?>"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $icon = get_sub_field('icon_image'); echo $icon['sizes']['headerimagemicro']; ?>"
                                            alt="<?php if ($icon['alt']) {echo $icon['alt'];}else{echo $icon['title'];} ?>"></a>
										<h3><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></h3>
										<p><?php the_sub_field('icon_content'); ?></p>
									</div>
								<?php endwhile; endif; ?>
							</div>
							
						</div>
                    <?php elseif( get_row_layout() == 'frontpage_breaking_news' ): ?>
                        
                            <div class="breaking-bar mainlevel">
                                <div class="breaking-icon">
                                    <div class="breaking-dot"></div>
                                    <div class="breaking-radio r1"></div>
                                    <div class="breaking-radio r2"></div>
                                    <div class="breaking-radio r3"></div>
                                    <div class="breaking-radio r4"></div>
                                </div>
                                <?php if( have_rows('breaking_news')) : while ( have_rows('breaking_news') ) : the_row(); ?>
                                    <?php if(wp_is_mobile()) { ?>
                                        <?php echo '<p class="breaking"><a href="'.get_sub_field('link').'"><strong>Breaking:</strong> '.get_sub_field('text').'</a></p>'; ?>
                                    <?php } else { ?>
                                        <?php echo '<p class="breaking"><strong>Breaking:</strong> '.get_sub_field('text').'</p>'; ?>
                                    <?php } ?>
                                <?php endwhile; endif; ?>
                            </div>
                    <?php elseif( get_row_layout() == 'frontpage_subscription' ): ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <div class="subscription-slide slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
                                
                                <div class="slide-text">
                                    <?php if(get_sub_field('title')) { ?><h1><?php the_sub_field('title'); ?></h1><?php } ?>
                                    
                                </div>
                                <div class="subscription">
                                    <div class="subscription-text">
                                         <?php the_sub_field('text'); ?>
                                    </div>
                                    <form method="post" name="PageForm" action="//publish.ne.cision.com/Subscription/Subscribe">
                                        <input type="hidden" name="subscriptionUniqueIdentifier" value="babbd7e430">
                                        <input type="hidden" name="redirectUrlSubscriptionSuccess" value="https://ledibond.com/thanks/">
                                        <input type="hidden" name="Replylanguage" value="en">
                                        <div class="mail form-group">
                                            <label for="name"><?php the_field('name', 'options'); ?></label>
                                            <input type="text" name="Name" placeholder="<?php the_field('name', 'options'); ?>" class="form-control" id="name">
                                            <label for="Email"><?php the_field('your_email', 'options'); ?></label>
                                            <input type="text" name="Email" placeholder="<?php the_field('your_email', 'options'); ?>" class="form-control" id="email">
                                            <div class="g-recaptcha" data-size="normal" data-sitekey="6LeM66cZAAAAALZYo89bi8xbPej3J-4nrh8aNXY8"></div>
                                            <input type="submit" value="Submit">
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="subscription-slide slide-obj" data-slidenum="<?php echo ++$slidenum; ?>">
                                <div class="slide-text">
                                    <?php if(get_sub_field('title')) { ?><h1>Want to get in touch?</h1><?php } ?>
                                </div>
                                <div class="subscription">
                                    <div class="subscription-text">
                                        <p>Please leave your details in this form and we will contact you shortly.</p>
                                    </div>
                                    <?php echo do_shortcode( '[contact-form-7 id="4876" title="Contact form 1"]' ); ?>
                                    
                                </div>
                            </div>
                        <?php } ?>
					<?php endif; ?>
			

			<?php endwhile; endif; ?>
			
            
                
                
            
            
			
			
		</div>
		
	</main>
<?php get_footer(); ?>
