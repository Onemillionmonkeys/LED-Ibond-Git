					<?php /*?><div class="column col-4 col-margin-r-1 col-margin-l-1">
						<?php the_field('content_part_2'); ?>
					</div>
<?php */?>

<?php
if( have_rows('content_below_media') ):
	while ( have_rows('content_below_media') ) : the_row(); 
?>
	<?php if( get_row_layout() == 'text_field' ): ?>

        <div class="column col-text col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> col-text-col-<?php the_sub_field('text_columns'); ?>">
			<?php if(get_sub_field('image_over_text')) { ?>
                <img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_sub_field('image_over_text'); echo $img['sizes']['large']; ?>"
                    alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>">
			<?php } ?>
            <?php if(get_sub_field('field_title')) { ?>
				<h3 class="text-field-title<?php if(get_sub_field('align_title_right')) { echo ' align-right'; } ?> <?php if(get_sub_field('align_title_center')) { echo ' align-center'; } ?>"><?php the_sub_field('field_title'); ?></h3>
			<?php } ?>
			<?php the_sub_field('text'); ?>
		</div>
	<?php elseif( get_row_layout() == 'profile_field' ): ?>
		<div class="column col-profile col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> <?php if(get_sub_field('align_content_top')) : echo 'align-top'; endif; ?>">
            <?php if(get_sub_field('profile_image')) { ?>
			<div class="profile-image">
				<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $por = get_sub_field('profile_image'); echo $por['url']; ?>"
                    alt="<?php if ($por['alt']) {echo $por['alt'];}else{echo $por['title'];} ?>">
			</div>
            <?php } ?>
			<div class="profile-content">
				<h3><?php the_sub_field('name'); ?></h3>
				<p><b><?php the_sub_field('title'); ?></b></p>
				<?php the_sub_field('text'); ?>
				<p>
					<?php if(get_sub_field('phone')) { ?><?php the_field('phone_string', 'options'); ?> <?php the_sub_field('phone'); ?><br><?php } ?>
					<?php if(get_sub_field('email')) { ?><?php the_field('email_string', 'options'); ?> <a href="mailto:<?php echo antispambot(get_sub_field('email'), 1); ?>" itemprop="email"><?php echo antispambot(get_sub_field('email')); ?></a><?php } ?>
				</p>
				<?php if( have_rows('social_connection') ): ?>
					<div class="social-connections">
						<?php while ( have_rows('social_connection') ) : the_row(); ?>
						<a href="<?php echo get_sub_field('link'); ?>" target="_blank" rel="nofollow"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $icon = get_field(get_sub_field('social_media'), 'options'); echo $icon['url']; ?>"
                            alt="<?php if ($icon['alt']) {echo $icon['alt'];}else{echo $icon['title'];} ?>"></a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php elseif( get_row_layout() == 'map_field' ): ?>
		<div class="column col-field-map col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?>">

				<?php if( have_rows('map_markers') ): ?>
					<div class="acf-map">
						<?php while ( have_rows('map_markers') ) : the_row(); ?>
							<?php $location = get_sub_field('marker'); if( !empty($location) ): ?>

								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
									<h4><?php the_sub_field('marker_title'); ?></h4>
									<?php if(get_sub_field('marker_text')) { echo '<p>'.get_sub_field('marker_text').'</p>'; } ?>
								</div>

							<?php endif; ?>
							

						<?php endwhile; ?>
					</div>
					
				<?php endif; ?>
			
			
			
			
		</div>

	<?php elseif( get_row_layout() == 'image_field' ): ?>
		<div class="column col-field-image col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> <?php if(get_sub_field('adjust_height_of_image')) { echo 'col-image-full-height'; } ?>">
        	<img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_sub_field('content_image'); echo $img['sizes']['large']; ?>"
                alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>">
		</div>
	<?php elseif( get_row_layout() == 'video_field' ): ?>
		<div class="column col-field-video col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> ">
            <?php if(get_sub_field('title')) { ?>
            <div class="title-bar np">
                <h2><?php the_sub_field('title'); ?></h2>
            </div>
            <?php } ?>
        	<iframe id="ytplayer" type="text/html" width="100%" height="100%" data-category-consent="cookie_cat_marketing" src="" data-consent-src="https://www.youtube.com/embed/<?php the_sub_field('video_embed_id'); ?>?modestbranding=1&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
    <?php elseif( get_row_layout() == 'download_field' ): ?>
            <div class="column download-col col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> "> 
                <div class="title-bar np">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                    <?php while ( have_rows('downloads') ) : the_row(); ?>
                        <div class="download">
                            <?php $file = get_sub_field('file'); ?>
                            <a href="<?php echo $file['url']; ?>" download rel="nofollow"><?php the_sub_field('title'); ?><?php if(get_sub_field('filetype')) { ?> <span>&#40;<?php the_sub_field('filetype'); ?>&#41;</span><?php } ?></a>
                        </div>
                    <?php endwhile; ?>

            </div>
    <?php elseif( get_row_layout() == 'related_content_field' ): ?>
            <div class="column download-col col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> "> 
                <div class="title-bar np">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                    <?php $relposts = get_sub_field('related_content'); ?>
                        <?php if( $relposts ): foreach( $relposts as $p ): ?>
                        <div class="links">
                            <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
                        </div>
                    <?php endforeach; endif; ?>

            </div>

    <?php elseif( get_row_layout() == 'investor_news_field' ): ?>
        
            <?php

                $cur_lan = ICL_LANGUAGE_CODE;
                if($cur_lan == 'da') {
                    $xmlURL = "https://publish.ne.cision.com/papi/NewsFeed/EFCE995D67784304965ACBEA8B9F2288?format=xml";
                    $xmlExtra = "https://publish.ne.cision.com/papi/NewsFeed/A30FD1BA310C453AA386C2019B04A14C?format=xml&EndDate=2020-06-01";
                } else {
                    $xmlURL = "https://publish.ne.cision.com/papi/NewsFeed/A30FD1BA310C453AA386C2019B04A14C?format=xml";
                }
                
                $xmlDatas = simplexml_load_file($xmlURL); 
                $xmlDatasE = simplexml_load_file($xmlExtra); 
                
                $press = array();
                
                foreach($xmlDatas->Releases->PressRelease as $n) {
                    array_push($press, $n);
                }

                if($cur_lan == 'da') {
                    foreach($xmlDatasE->Releases->PressRelease as $n) {
                        array_push($press, $n);
                    }
                }
                
                
                
                

                if($_GET['ips'] == null) {
                    $pressStart = 0;
				} else {
                    $pressStart = $_GET['ips'];
                }

                $pressNum = 0;
                $pressMax = 12;
                $pressPages = ceil(count($press)/$pressMax);

                
            ?>
            <?php 
                if(count($press) == $pressMax) {
                    //echo $_SERVER['HTTP_HOST']. explode('?', $_SERVER['REQUEST_URI'], 2)[0];
                    
                    echo '<div class="column col-media-gallery np col-'.get_sub_field('width').' col-margin-r-'.get_sub_field('margin_right').' col-margin-l-'.get_sub_field('margin_left').'">';
                        echo '<div class="nav-bar">';
				            for($x = 1; $x <= $pressPages; $x++) {
                                $from = ($x-1)*$pressMax + 1;
                                if($x == $pressPages) {
                                    $to = count($press);
                                } else {
                                    $to = $from + $pressMax - 1;
                                }
                                
                                echo '<div class="nav-bar-btn">'.$from.'-'.$to.'</div>';
				            }
							echo '</div>';
                    
                    echo '</div>';
                }
            
            ?>
            
          <div class="column col-list np col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> ">  
            <?php
                foreach($press as $n) :
                    if($pressNum >= $pressStart && $pressNum < ($pressStart + $pressMax)) : ?>
                    <div class="column col-2 col-list-item col-field-search">
                        <?php 
                            $i = $n->Images->ReleaseImage;
                            if(isset( $i->UrlTo400x400ArResized)) {
                                echo '<a href="'. $n->CisionWireUrl.'" target="_blank" rel="nofollow"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="'.$i->UrlTo400x400ArResized.'" alt="'.$n->Description.'"></a>';
                            } else {
                                $thumb = get_field('placeholder_thumb','options');
                                 echo '<a href="'. $n->CisionWireUrl.'" target="_blank" rel="nofollow"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="'.$thumb['sizes']['headerimagemicro'].'" alt="'.$n->Description.'"></a>';
                            };
                            if ( is_user_logged_in() ) { 
                                //var_dump($n);
                            }
                        ?>
                        <p><a href="<?php echo $n->CisionWireUrl; ?>" target="_blank" rel="nofollow"><?php echo $n->Title; ?></a>

                            &#91;<?php $d = $n->PublishDate; 
                            echo substr($d, 8, 2).'/'.substr($d, 5, 2).'/'.substr($d, 0, 4);?>&#93;

                            <?php echo $n->Intro; ?>

                        </p>
                    </div>
            <?php 
                    endif;
                $pressNum++;
                endforeach;
            ?>
            </div>    
            <?php elseif( get_row_layout() == 'calendar_field' ): ?>
                <div class="column col-calendar np col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> ">
                <?php
                $year = 1999;    
                    
                if( have_rows('calendar_events') ):
                    while ( have_rows('calendar_events') ) : the_row();
                        $date_string = get_sub_field('date');
                        $date = DateTime::createFromFormat('Ymd', $date_string);
                        if($date->format('Y') != $year) {
                            $year = $date->format('Y');
                            echo '<div class="title-bar"><h2>'.$year.'</h2></div>';
                        }
                        
                        echo '<div class="cal-con">';
                            echo '<div class="date-con">';
                                $cur_lan = ICL_LANGUAGE_CODE;
                                if($cur_lan == 'da') {
                                echo '<p>'.$date->format('j').'</p>';
                                echo '<p>'.$date->format('M').'</p>';    
                                } else {
                                echo '<p>'.$date->format('j').'<span>'.$date->format('S').'</span></p>';
                                echo '<p>'.$date->format('M').'</p>';    
                                };
                                
                            echo '</div>';
                        echo get_sub_field('title');
                        echo '</div>';
                    endwhile;
                endif;
                ?>
                </div>
        <?php elseif( get_row_layout() == 'investor_news_signup_field' ): ?>
            <div class="column col-subscription np col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> ">
                <div class="title-bar">
                    <h2><?php the_field('sub_title', 'options'); ?></h2>

                </div>
                <div class="subscription">
                    <div class="subscription-text">
                        <p><?php the_field('sub_text', 'options'); ?></p>
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
        <?php elseif( get_row_layout() == 'contact_form_field' ): ?>
            <div class="column col-subscription np col-<?php the_sub_field('width'); ?> col-margin-r-<?php the_sub_field('margin_right'); ?> col-margin-l-<?php the_sub_field('margin_left'); ?> ">
                <div class="title-bar">
                    <h2><?php the_field('contact_form_title', 'options'); ?></h2>

                </div>
                <div class="subscription">
                    <div class="subscription-text">
                        <p><?php the_field('contact_form_text', 'options'); ?></p>
                    </div>
                    
                    <?php if(get_sub_field('contact_form') == '5267') {
                    
                        echo do_shortcode( '[contact-form-7 id="5267" title="Contact form Landing"]' );
                    } else {
                        echo do_shortcode( '[contact-form-7 id="4876" title="Contact form 1"]' );
                    } ?>
                    
                </div>
            </div>
        <?php endif; ?>
<?php
    endwhile;
endif;
?>
<?php include('mapscript.php'); ?>