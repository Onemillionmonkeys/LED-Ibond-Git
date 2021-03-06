<nav class="mainnav-con">
	<div class="mainnav" role="menu">
        <?php
        $menunum = 0; 
        if( have_rows('mega_menu_items', 'options') ): 
            while ( have_rows('mega_menu_items', 'options') ) : 
                the_row();
        ?>
            <?php if( get_row_layout() == 'main_menu_item' ): ?>
                <?php if(get_sub_field('link')) { ?>
                    <div class="mainlevel" role="menuitem" data-menuitem="<?php echo ++$menunum; ?>">
                        <p class="plink"><a href="<?php echo get_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a></p>
                    </div>
                 <?php } else {
                    $close = true; 
                ?>
                    <div class="mainlevel" role="menuitem" data-menuitem="<?php echo ++$menunum; ?>">
                        <p class="psubmenu"><?php the_sub_field('text'); ?></p>
                 <?php } ?>
            <?php elseif( get_row_layout() == 'manchet' ): ?>
                <?php 
                    if(get_sub_field('menu_start')) { 
                        echo '<div class="sub-menu"><div class="sub-menu-wrapper"><div class="sub-menu-content-wrapper"><div class="sub-menu-content">'; 
                    }
                ?>
                    <div class="column col-<?php the_sub_field('width'); ?> col-menu-txt">
                        <?php  echo '<h2>'.get_sub_field('manchet_title').'</h2>'; ?>
                        <?php if(get_sub_field('manchet_content')) { echo '<div class="col-menu-txt-content">'.get_sub_field('manchet_content').'</div>'; } ?>
                    </div>
                <?php 
                    if(get_sub_field('menu_stop')) {
                        echo '</div></div><div class="sub-menu-end"><div class="sub-menu-end-filler"></div><div class="sub-menu-end-cut"></div></div></div></div></div>'; 
                    }
                ?>
            <?php elseif( get_row_layout() == 'list' ): ?>
                <?php $contenttype = get_sub_field('content_type'); $items_per_row = get_sub_field('items_per_row'); ?>
                <?php 
                    if(get_sub_field('menu_start')) { 
                        echo '<div class="sub-menu"><div class="sub-menu-wrapper"><div class="sub-menu-content-wrapper"><div class="sub-menu-content">';
                    }
                ?>
                    <div class="column col-<?php the_sub_field('width'); ?> col-menu-list np">
                        <div class="list-content-con">
                        <?php 
                            $guides = get_posts(array(
                                    'post_type' => $contenttype,
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,

                                ));
                        ?>
                            <?php if( $guides ): ?>
                                <?php foreach( $guides as $guide ): ?>
                                    <div class="column list-col-<?php echo $items_per_row; ?> <?php if(get_sub_field('center_aligned_titles')) { echo 'center'; } ?>">
                                        <?php if(get_field('header_image', $guide->ID)) { ?>
                                            <div style="display: none;"><?php print_r(get_field('header_image', $guide->ID)); ?></div>
                                            <a href="<?php echo get_the_permalink($guide->ID); ?>">
                                                <img class="lazy" src="<?php echo 
                                                    get_stylesheet_directory_uri(); ?>/images/placeholder.png" 
                                                    data-src="<?php $img = get_field('header_image', $guide->ID); echo $img['sizes']['headerimagemicro']; ?>"
                                                    alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>">
                                            </a>
                                        <?php } elseif(get_field('thumbnail', $guide->ID)) { ?>
                                            <a href="<?php echo get_the_permalink($guide->ID); ?>">
                                                <img class="lazy" src="<?php echo 
                                                    get_stylesheet_directory_uri(); ?>/images/placeholder.png" 
                                                    data-src="<?php $img = get_field('thumbnail', $guide->ID); echo $img['sizes']['headerimagemicro']; ?>"
                                                    alt="<?php if ($img['alt']) {echo $img['alt'];}else{echo $img['title'];} ?>">
                                            </a>
                                        <?php } ?>
                                        <h3><a href="<?php echo get_the_permalink($guide->ID); ?>"><?php echo get_the_title($guide->ID); ?></a></h3>
                                        <p><?php the_field('excerpt', $guide->ID); ?></p>
                                    </div>	
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                    if(get_sub_field('menu_stop')) {
                        echo '</div></div><div class="sub-menu-end"><div class="sub-menu-end-filler"></div><div class="sub-menu-end-cut"></div></div></div></div></div>';
                    } 
                ?>
            <?php elseif( get_row_layout() == 'curated_list' ): ?>
                <?php  $items_per_row = get_sub_field('items_per_row'); ?>
                <?php if(get_sub_field('menu_start')) { echo '<div class="sub-menu"><div class="sub-menu-wrapper"><div class="sub-menu-content-wrapper"><div class="sub-menu-content">'; } ?>
                    <div class="column col-<?php the_sub_field('width'); ?> col-menu-list np">
                        <div class="list-content-con">
                            <?php 
                            $relposts = get_sub_field('curated_items');

                            if( $relposts ): ?>
                                <?php foreach( $relposts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                                    <div class="column list-col-<?php echo $items_per_row; ?>">
                                        <?php if(get_field('header_image', $p->ID)) { ?>
                                            <a href="<?php the_permalink() ?>"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_field('header_image', $p->ID); echo $img['sizes']['headerimagemicro']; ?>"></a>
                                        <?php } elseif(get_field('thumbnail', $p->ID)) { ?>
                                            <a href="<?php the_permalink() ?>"><img class="lazy" src="<?php echo 
get_stylesheet_directory_uri(); ?>/images/placeholder.png" data-src="<?php $img = get_field('thumbnail', $p->ID); echo $img['sizes']['headerimagemicro']; ?>"></a>
                                        <?php } ?>
                                        <h3><a href="<?php the_permalink() ?>"><?php echo get_the_title( $p->ID ); ?></a></h3>
                                        <p><?php the_field('excerpt', $p->ID); ?></p>
                                    </div>	
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                    if(get_sub_field('menu_stop')) {
                        echo '</div></div><div class="sub-menu-end"><div class="sub-menu-end-filler"></div><div class="sub-menu-end-cut"></div></div></div></div></div>';
                    }
                ?>
            <?php elseif( get_row_layout() == 'menu_column' ): ?>
                <?php if(get_sub_field('menu_start')) { echo '<div class="sub-menu"><div class="sub-menu-wrapper"><div class="sub-menu-content-wrapper"><div class="sub-menu-content">'; } ?>
                    <div class="column col-<?php the_sub_field('width'); ?> col-menu-txt">
                        <?php echo '<p class="link-title">'.get_sub_field('mc_title').'</p>'; ?>
                         <?php if(get_sub_field('mc_text')) { echo '<div class="col-menu-txt-content">'.get_sub_field('mc_text').'</div>'; } ?>
                        <?php 
                        
                        if( get_sub_field('mc_links')):
                            $relposts = get_sub_field('mc_links');
                           foreach( $relposts as $p ): ?>
                                <div class="megamenu-link">
                                    <p><a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title( $p->ID ); ?></a></p>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if( get_sub_field('custom_links')) { ?>
                            <?php if( have_rows('custom_links')): while ( have_rows('custom_links') ) : the_row(); ?>

                                <div class="megamenu-link megamenu-link-download">
                                    <p><a href="<?php echo get_sub_field('custom_links_url'); ?>" target="_blank"><?php echo get_sub_field('custom_link_text'); ?></a></p>
                                </div>

                            <?php endwhile; endif; ?>
                        <?php } ?>
                    </div>
                <?php 
                    if(get_sub_field('menu_stop')) {
                        echo '</div></div><div class="sub-menu-end"><div class="sub-menu-end-filler"></div><div class="sub-menu-end-cut"></div></div></div></div></div>';
                    }
                ?>
            <?php elseif( get_row_layout() == 'wrapper' ): ?>
                <?php
                    if(get_sub_field('wrapper_start')) {
                        echo '<div class="column wrapper-col col-'.get_sub_field('wrapper_width').'">';
                    } 
                ?>
                <?php 
                    if(get_sub_field('wrapper_end')) {
                        echo '</div><div class="sub-menu-end"><div class="sub-menu-end-filler"></div><div class="sub-menu-end-cut"></div></div></div></div></div></div></div>';
                    } 
                ?>
                <?php endif; 
            ?>
        <?php endwhile; 
        endif; ?>
    </div>
</nav>
