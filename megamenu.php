<div class="mainnav-con">
	<nav class="mainnav">
		<?php if( have_rows('megamenu', 'options') ): ?>
				<?php $menunum = 0; ?>		
				<?php while ( have_rows('megamenu', 'options') ) : the_row(); ?>
                    <?php if(get_sub_field('main_menu_is_link')) : ?>
                        <div class="mainlevel">
                            <p class="plink" menuitem="<?php echo ++$menunum; ?>"><?php the_sub_field('main_menu_item'); ?></p>
                        </div>
                    <?php else : ?>
                        <div class="mainlevel">
                            <p class="psubmenu" menuitem="<?php echo ++$menunum; ?>"><?php the_sub_field('main_menu_item'); ?></p>

                            <?php if( have_rows('sublevel_content') ): ?>
                                <div class="sub-menu">
                                    <div class="sub-menu-content-wrapper">
                                        <div class="sub-menu-content">

                                            <?php 
                                                while ( have_rows('sublevel_content') ) : the_row();
                                            ?>
                                                <?php if( get_row_layout() == 'text_content' ): ?>
                                                    <?php if(get_sub_field('wrapper_start')) { echo '<column class="wrapper-col col-'.get_sub_field('wrapper_width').'">'; } ?>
                                                        <column class="col-<?php the_sub_field('width'); ?> col-menu-txt <?php if(get_sub_field('align_text_to_the_right')) { echo 'align-right'; } ?>">
                                                            <?php 
                                                                if(get_sub_field('title') && !get_sub_field('links_check') && !get_sub_field('custom_links')) { 
                                                                    echo '<h2>'.get_sub_field('title').'</h2>'; 
                                                                } else if(get_sub_field('title')) {
                                                                    echo '<p class="link-title">'.get_sub_field('title').'</p>';
                                                                }
                                                            ?>

                                                            <?php if(get_sub_field('content')) { echo '<div class="col-menu-txt-content">'.get_sub_field('content').'</div>'; } ?>

                                                            <?php if(get_sub_field('links_check')) { ?>
                                                                <?php 
                                                                $relposts = get_sub_field('links');
                                                                if( $relposts || get_sub_field('custem_links_fields')): ?>

                                                                    <?php foreach( $relposts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                                                                        <div class="megamenu-link">
                                                                            <p><a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title( $p->ID ); ?></a></p>
                                                                        </div>

                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                            <?php if( get_sub_field('custom_links')) { ?>
                                                                <?php if( have_rows('custem_links_fields')): while ( have_rows('custem_links_fields') ) : the_row(); ?>

                                                                    <div class="megamenu-link megamenu-link-download">
                                                                        <p><a href="<?php echo get_sub_field('custom_links_url'); ?>" target="_blank"><?php echo get_sub_field('custom_link_text'); ?></a></p>
                                                                    </div>

                                                                <?php endwhile; endif; ?>
                                                            <?php } ?>

                                                        </column>
                                                    <?php if(get_sub_field('wrapper_end')) { echo '</column>'; } ?>
                                                <?php elseif( get_row_layout() == 'list_content' ): ?>
                                                    <column class="col-<?php the_sub_field('width'); ?> col-menu-list np">
                                                        <?php $contenttype = get_sub_field('content_type'); $items_per_row = get_sub_field('items_per_row'); ?>
                                                        <div class="list-content-con">
                                                            <?php if(get_sub_field('curated_list')) { ?>
                                                                <?php 

                                                                $relposts = get_sub_field($contenttype.'_curated');

                                                                if( $relposts ): ?>
                                                                    <?php foreach( $relposts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                                                                        <column class="list-col-<?php echo $items_per_row; ?>">
                                                                            <?php if(get_field('header_image', $p->ID)) { ?>
                                                                                <a href="<?php the_permalink() ?>"><img src="<?php $img = get_field('header_image', $p->ID); echo $img[sizes][headerimagemicro]; ?>"></a>
                                                                            <?php } elseif(get_field('thumbnail', $p->ID)) { ?>
                                                                                <a href="<?php the_permalink() ?>"><img src="<?php $img = get_field('thumbnail', $p->ID); echo $img[sizes][headerimagemicro]; ?>"></a>
                                                                            <?php } ?>
                                                                            <h3><a href="<?php the_permalink() ?>"><?php echo get_the_title( $p->ID ); ?></a></h3>
                                                                            <p><?php the_field('excerpt', $p->ID); ?></p>
                                                                        </column>	
                                                                    <?php endforeach; ?>

                                                                <?php endif; ?>

                                                            <?php } else { ?>

                                                            <?php 

                                                                $guides = get_posts(array(
                                                                        'post_type' => $contenttype,
                                                                        'post_status' => 'publish',
                                                                        'posts_per_page' => -1,

                                                                    ));
                                                            ?>
                                                                <?php if( $guides ): ?>
                                                                    <?php foreach( $guides as $guide ): ?>
                                                                        <column class="list-col-<?php echo $items_per_row; ?> <?php if(get_sub_field('center_aligned_titles')) { echo 'center'; } ?>">
                                                                            <?php if(get_field('header_image', $guide->ID)) { ?>
                                                                                <a href="<?php echo get_the_permalink($guide->ID); ?>"><img src="<?php $img = get_field('header_image', $guide->ID); echo $img[sizes][headerimagemicro]; ?>"></a>
                                                                            <?php } elseif(get_field('thumbnail', $guide->ID)) { ?>
                                                                                <a href="<?php echo get_the_permalink($guide->ID); ?>"><img src="<?php $img = get_field('thumbnail', $guide->ID); echo $img[sizes][headerimagemicro]; ?>"></a>
                                                                            <?php } ?>
                                                                            <h3><a href="<?php echo get_the_permalink($guide->ID); ?>"><?php echo get_the_title($guide->ID); ?></a></h3>
                                                                            <p><?php the_field('excerpt', $guide->ID); ?></p>
                                                                        </column>	
                                                                    <?php endforeach; ?>

                                                                <?php endif; ?>


                                                            <?php } ?>
                                                        </div>
                                                    </column>

                                                <?php endif; ?>
                                            <?php
                                                endwhile;
                                            ?>

                                        </div>
                                    </div>
                                    <div class="sub-menu-end">
                                        <div class="sub-menu-end-filler"></div>
                                        <div class="sub-menu-end-cut"></div>
                                    </div>
                                </div>
                            <?php endif; ?>	
                        </div>
                    <?php endif; ?>
				<?php endwhile; ?>

		<?php endif; ?>

	</nav>
</div>