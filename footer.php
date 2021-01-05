		</section><!-- #main -->
		<footer role="contentinfo">
			<div class="footer-shade"></div>
			<div class="footer-con">
				<column class="col-2 col-sub-menu">
					<h3><?php the_field('about_led_ibond', 'options'); ?></h3>
					<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'primary') ); ?>
				</column>
				<column class="col-2 col-twitter">
					<h3><?php the_field('follow', 'options'); ?></h3>
					<?php
					if( have_rows('socail_media', 'options') ): ?>
					<div class="social-box">
						<div class="social-icons">
							<?php while ( have_rows('socail_media', 'options') ) : the_row(); ?>
								<a href="<?php the_sub_field('link'); ?>" target="_blank" rel="nofollow"><img src="<?php $icon = get_sub_field('icon'); echo $icon[url]; ?>" alt="<?php echo $icon[alt]; ?>"></a>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif;
					?>
					<?php /*?><div class="twitter-header">
						<img src="<?php $ikon = get_field('twitter_ikon','options'); echo $ikon[url]; ?>" alt="<?php $ikon[alt]; ?>">
						<h3><a href="<?php the_field('twitter_link','options'); ?>" target="_blank" rel="nofollow"><?php the_field('twitter_titel','options'); ?>&#64;ledibond</a></h3>
						
					</div>
					<div class="twitter-con">
						<div class="tweet"></div>
					</div>
					<p><a class="twitter-link" href="<?php the_field('twitter_link','options'); ?>" target="_blank" rel="nofollow"><?php the_field('twitter_link_text','options'); ?></a></p><?php */?>
					
				</column>
				<column class="col-2 col-adresse">
					<address itemscope itemtype="<?php bloginfo('url'); ?>">
						<h3>
							<a href="<?php bloginfo('url'); ?>" rel="index"><?php the_field('company_name','options'); ?></a><br>
						</h3>
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
                    
				</column>
			</div>
            				

		</footer><!-- footer -->
        <cookie>
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
        </cookie>
        <?php if ( get_field('subscription_popup') ) { ?>
            <div class="slide-con">
             
                <div class="pop-up-bg"></div>
                <div class="subscription-slide slide-obj pop-up" slidenum="<?php echo ++$slidenum; ?>"
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
	<script type="text/javascript">
		jQuery(document).ready(function($) {
            
            if(typeof(Storage)!=="undefined") {
                if (localStorage.cookietest == null) {
                    $('cookie').css('display','block');
                }
                if($('.pop-up').size() > 0) {
                    var pInc = parseInt($('.pop-up').attr('incubation'));
                    var dInc = new Date();
                    //console.log('incu'+pInc+' kill'+localStorage.incubation+' add'+(pInc+parseInt(localStorage.incubation)));
                    var popupBlock = localStorage.popupBlock;
                    
                    if(dInc.getTime()>(pInc+parseInt(localStorage.incubation))) {
                        popupBlock = false;
                        console.log('popupB');
                    }
                }
            }

            $('cookie .cookie-accept').click(function() {
                localStorage.cookietest=1;
                localStorage.allowcookies=1;
                $('cookie').fadeOut(1000);
            });	
            
            $('cookie .cookie-disallow').click(function() {
                localStorage.cookietest=1;
                localStorage.allowcookies=0;
                $('cookie').fadeOut(1000);
            });	
            
			
			// SLIDER
			
			if($('.slide-con').size() > 0 && $('res-btn').size() == 0) {
				var windowheight = $(window).height();
				var documentheight = 0;
				var slidenum = $('.slide-con .slide').size();
				var scrollpos =  $(window).scrollTop();
				var activeslide = 1;
				var slidestate = 0;
				var newslide = 0;
				var textshow = 0;
				var curoffset = 0;
				var curobj;
				
				scrollfunc(scrollpos);
				
				$( window ).scroll(function() {
					scrollpos = $(window).scrollTop();
					scrollfunc(scrollpos);
				});
				
				$( window ).resize(function() {
					windowheight = $(window).height();
					scrollfunc(scrollpos);
				});
				
				var texttick = 0;
				var slidetxtsize;
				$('.slide-text[slidetxtnum="0"]').delay(1000).fadeIn(1000);
				var myVar = setInterval(function(){ myTimer() }, 5000);

				function myTimer() {
					$('.slide').each(function() {
						if($(this).find('.slide-text').size() > 1) {
							slidetxtsize = $(this).find('.slide-text').size();
							$(this).find('.slide-text[slidetxtnum="'+(texttick%slidetxtsize)+'"]').fadeOut(1000);
							$(this).find('.slide-text[slidetxtnum="'+((1+texttick)%slidetxtsize)+'"]').delay(1000).fadeIn(1000);
							
						}
					});
					texttick++;
				}
				
				function scrollfunc(sp) {
					//$('main').css('height', windowheight*(.5+slidenum)+'px');
					documentheight = $(document).height();
					
					//activeslide = Math.floor(sp/windowheight);
					
					slidestate = Math.round((sp%windowheight)/windowheight*100);
					
					<?php /*?>if(newslide != activeslide) {
						$('.slide[slidenum="'+newslide+'"]').stop(true, true).fadeOut(1000);
						
						textshow = 0;
						newslide = activeslide;
						$('.slide[slidenum="'+activeslide+'"]').stop(true, true).fadeIn(1000);
					}
					
					if(slidestate > 2 && slidestate < 98 && textshow == 0) {
						$('.slide[slidenum="'+activeslide+'"] .slide-text').stop(true, true).fadeIn(1000);
						textshow = 1;
					}
					
					if(slidestate > 98 && textshow == 1) {
						$('.slide[slidenum="'+activeslide+'"] .slide-text').stop(true, true).fadeOut(1000);
						textshow = 0;
					}
					
					if(slidestate < 2 && textshow == 1) {
						$('.slide[slidenum="'+activeslide+'"] .slide-text').stop(true, true).fadeOut(1000);
						textshow = 0;
					}<?php */?>
					
                        /*$('.slide-obj').each(function() {
						if($(this).visible( true )) {
							activeslide = $(this).attr('slidenum');
							
						} else {
                        }
						
					});*/
					
					curobj = $('.slide-obj[slidenum="'+activeslide+'"]');
					curoffset = curobj.offset();
					
					
					
							
					//$('.mainlevel > p').text('cur:'+curoffset.top);
					//$('.mainlevel > p').text('cur:'+activeslide);
					
					
				//	$('.slide[slidenum="'+activeslide+'"]').css('top', (slidestate/-10) +'vh');	
				//	$('.slide[slidenum="'+activeslide+'"] .slide-text').css('margin-bottom', (slidestate/10) +'vh');
					
					/*$('p.p1').text(windowheight);
					$('p.p2').text('cur:'+activeslide);
					$('p.p3').text('sp:'+sp+' state:'+slidestate+'%');*/
					
				}
			}
			
			// NAV
			
			var newopenmenu = 0;
			var oldopenmenu = 0;
			var menuopen = false;
			var submenuheight = 0;
			var menuobj;
			var menubtnact = false;
			
			$('.res-btn').click(function() {
				$('.mainnav-con').toggleClass('mega-menu-open');
				$('.header-content').toggleClass('header-content-open');
			});
			
			$('.mainlevel > p.psubmenu').click(function() {
				if(menubtnact == false) {
					menubtnact = true;
                    
                    if($(this).hasClass('breaking')) {
                        newopenmenu = 7;
                        menuobj = $('p[menuitem="7"]').parent();
                    
                    } else {
                        newopenmenu = $(this).attr('menuitem');
                        menuobj = $(this).parent();
                    }
					

					if(newopenmenu == oldopenmenu) {
						$('.menuopen').removeClass('menuopen');
						menuobj.find('.sub-menu').animate({'height': '0px'}, 500, function() {
							menuopen = false;
							oldopenmenu = 0;
							menubtnact = false;
						});
						
						
					} else {
						if(menuopen == true) {
							$('.menuopen').removeClass('menuopen');
							menuobj.addClass('menuopen');
							$('p[menuitem="'+oldopenmenu+'"]').parent().find('.sub-menu').animate({'height': '0px'}, 250, function() {
								menuopen = true;
								oldopenmenu = newopenmenu;
								submenuheight = menuobj.find('.sub-menu-content').innerHeight()+menuobj.find('.sub-menu-end').innerHeight();
								menuobj.find('.sub-menu').animate({'height': submenuheight+'px'}, 250, function() {
									menubtnact = false;
								});	
							});
							
						} else {
							$('.menuopen').removeClass('menuopen');
							menuobj.addClass('menuopen');
							menuopen = true;
							oldopenmenu = newopenmenu;
							submenuheight = menuobj.find('.sub-menu-content').innerHeight()+menuobj.find('.sub-menu-end').innerHeight();
							menuobj.find('.sub-menu').animate({'height': submenuheight+'px'}, 250, function() {
								menubtnact = false;
							});
						}
					}
				}
			});
			
			
			// GALLERY
            
            if($('.gal-item[galnum="1"] .gal-slide-text').is('.text-white')) {
                $('.gal-item[galnum="1"]').parent().parent().addClass('white-gal');
            }
			
			if($('.gal-media-con').size() > 0) {
				var btnAct = 0;
				var curgalnum = 1;
				var newgalnum = 0;
				var galtotal = $('.gal-item').size();
                
                if($('.frontpage-slide').size() > 0) {
                    var galmyVar = setInterval(function(){ galTimer() }, 5000);
                }

				function galTimer() {
					if(btnAct == 0) {
						btnAct = 1;
						newgalnum = curgalnum + 1;
						if(newgalnum > galtotal) {
							newgalnum = 1;
						}
						galchange();
					}
				}
                
				$('.nav-btn-prev').click(function() {
                    clearInterval(galmyVar);
					if(btnAct == 0) {
						btnAct = 1;
						newgalnum = curgalnum - 1;
						if(newgalnum <= 0) {
							newgalnum = galtotal;
						}
						galchange();
					}
					
				});
				
				$('.nav-btn-next').click(function() {
                    clearInterval(galmyVar);
					if(btnAct == 0) {
						btnAct = 1;
						newgalnum = curgalnum + 1;
						if(newgalnum > galtotal) {
							newgalnum = 1;
						}
						galchange();
					}
					
				});
				
				$('.nav-bar-btn').click(function() {
                    clearInterval(galmyVar);
					if(btnAct == 0) {
						btnAct = 1;
						newgalnum = parseInt($(this).attr('galnum'));
						galchange();
					}
					
				});
				
				function galchange() {
                    $('.nav-bar-btn').removeClass('nav-bar-active');
					$('.gal-item[galnum="'+curgalnum+'"]').fadeOut(500, function() {
                        if($('.gal-item[galnum="'+newgalnum+'"] .gal-slide-text').is('.text-white')) {
                            $('.gal-item[galnum="'+newgalnum+'"]').parent().parent().addClass('white-gal');
                        } else {
                            $('.gal-item[galnum="'+newgalnum+'"]').parent().parent().removeClass('white-gal');
                        }
						$('.gal-item[galnum="'+newgalnum+'"]').fadeIn(500);
						$('.nav-bar-btn[galnum="'+newgalnum+'"]').addClass('nav-bar-active');
						curgalnum = newgalnum;
						btnAct = 0;
					});
				}
                
                
			}
            //&& !localStorage.popupBlock
            if($('.pop-up').size() > 0 && !popupBlock) {
                var pDelay = parseInt($('.pop-up').attr('delay'));
                $('.pop-up').delay(pDelay).fadeIn(2000);
                $('.pop-up-bg').delay(pDelay-500).fadeIn(2000);
                
                function popUpKill() {
                    var d = new Date();
                    localStorage.popupBlock = true;
                    localStorage.incubation = d.getTime();
                    $('.pop-up').fadeOut(1000);
                    $('.pop-up-bg').fadeOut(1000);
                }
                
                $('.pop-up-kill').click(function() {
                    popUpKill();
                });
                $('.pop-up-bg').click(function() {
                    popUpKill();
                });
            }
            
            if($('.wpcf7').size() > 0) {
                var pagetitle = $('.header-image-title-bar h1').text();
                $('input.hidden').val(pagetitle);
            }
			
            $('.hero-btn-header').click(function() {
                $('.hero-pop-up').fadeIn(1000);
                $('.hero-pop-up-bg').fadeIn(1000);
            });
            
            $('.hero-btn-content').click(function() {
                $(this).parents('.col-subscription').toggleClass('col-fold-out-show');
            });
            
            $('.hero-pop-up-kill').click(function() {
                $('.hero-pop-up').fadeOut(1000);
                $('.hero-pop-up-bg').fadeOut(1000);
            });
            $('.hero-pop-up-bg').click(function() {
                $('.hero-pop-up').fadeOut(1000);
                $('.hero-pop-up-bg').fadeOut(1000);
            });
			
		});
	</script>
</html>