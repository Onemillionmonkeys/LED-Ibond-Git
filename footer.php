    </div><!-- #main -->
		<footer>
			<div class="footer-shade"></div>
			<div class="footer-con">
				<div class="column col-2 col-sub-menu">
					<p class="h3"><?php the_field('about_led_ibond', 'options'); ?></p>
					<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'primary') ); ?>
				</div>
				<div class="column col-2 col-twitter">
					<p class="h3"><?php the_field('follow', 'options'); ?></p>
					<?php
					if( have_rows('socail_media', 'options') ): ?>
					<div class="social-box">
						<div class="social-icons">
							<?php while ( have_rows('socail_media', 'options') ) : the_row(); ?>
								<a href="<?php the_sub_field('link'); ?>" target="_blank" rel="nofollow"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $icon = get_sub_field('icon'); echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></a>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif;
					?>
					<?php /*?><div class="twitter-header">
						<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $ikon = get_field('twitter_ikon','options'); echo $ikon['url']; ?>" alt="<?php $ikon['alt']; ?>">
						<h3><a href="<?php the_field('twitter_link','options'); ?>" target="_blank" rel="nofollow"><?php the_field('twitter_titel','options'); ?>&#64;ledibond</a></h3>
						
					</div>
					<div class="twitter-con">
						<div class="tweet"></div>
					</div>
					<p><a class="twitter-link" href="<?php the_field('twitter_link','options'); ?>" target="_blank" rel="nofollow"><?php the_field('twitter_link_text','options'); ?></a></p><?php */?>
					
				</div>
				<div class="column col-2 col-adresse">
					<address itemscope itemtype="<?php bloginfo('url'); ?>">
						<p class="h3">
							<a href="<?php bloginfo('url'); ?>" rel="index"><?php the_field('company_name','options'); ?></a><br>
						</p>
						<p>
							<span itemprop="streetAddress"><?php the_field('streetname','options'); ?></span><br>
							<span itemprop="addressLocality"><?php the_field('zip','options'); ?></span>&nbsp;
							<span itemprop="addressLocality"><?php the_field('city','options'); ?></span><br>
							<span itemprop="addressCountry"><?php the_field('country','options'); ?></span><br>
							<?php the_field('email_string','options'); ?>&nbsp;<a href="mailto:<?php echo antispambot(get_field('email','options'), 1); ?>" itemprop="email"><?php echo antispambot(get_field('email','options')); ?></a><br>
							<?php the_field('phone_string','options'); ?>&nbsp;<span itemprop="telephone"><?php the_field('phone','options'); ?></span><br>
							<?php if(get_field('cvr', 'options')) { ?><?php the_field('cvr_string', 'options'); ?>&nbsp;<span><?php the_field('cvr', 'options'); ?></span><?php } ?>
						</p>                                  
					</address>
                    
				</div>
			</div>
            				

		</footer><!-- footer -->
        <div class="cookie">
            <div class="cookie-con">
                <div class="cookie-text">
                    <?php the_field('cookie_text','options'); ?>
                </div>
                <div class="cookie-buttons">
                    <div class="cookie-disallow">
                        <p><?php the_field('cookie_disallow_button_text', 'options'); ?></p>
                    </div>
                    <div class="cookie-accept">
                        <p><?php the_field('cookie_accept_button_text', 'options'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php if ( get_field('subscription_popup') ) { ?>
            <div class="slide-con">
             
                <div class="pop-up-bg"></div>
                <div class="subscription-slide slide-obj pop-up" data-slidenum="<?php echo ++$slidenum; ?>"
                <?php
                    echo 'delay="';
                       if(get_field('sub_delay', 'options')) { echo get_field('sub_delay', 'options'); } else { echo '2000'; } 
                    echo '"';
                ?>
                <?php
                    echo 'incubation="';
                       if(get_field('sub_incubation', 'options')) { echo get_field('sub_incubation', 'options'); } else { echo '86400000'; } 
                    echo '"';
                ?>

                >

                    <div class="slide-text">
                        <?php if(get_field('sub_title', 'options')) { ?><h1><?php the_field('sub_title', 'options'); ?></h1><?php } ?>

                    </div>
                    <div class="pop-up-kill">X</div>
                    <div class="subscription">
                        <div class="subscription-text">
                             <?php the_field('sub_text', 'options'); ?>
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
            </div>
        <?php } ?>


		<?php wp_footer(); ?>
	</body>
</html>