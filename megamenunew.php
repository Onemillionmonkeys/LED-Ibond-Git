<div class="mainnav-con">
	<nav class="mainnav">
        <?php $menunum = 0; ?>
        <?php if( have_rows('mega_menu_items', 'options') ): while ( have_rows('mega_menu_items', 'options') ) : the_row(); ?>

					<?php if( get_row_layout() == 'main_menu_item' ): ?>
                         <div class="mainlevel">
                            <p class="plink" menuitem="<?php echo ++$menunum; ?>"><?php the_sub_field('text'); ?></p>
                        </div>
        
                    <?php elseif( get_row_layout() == 'frontpage_slider' ): ?>
        
                    <?php endif; ?>
        <?php endwhile; endif; ?>
        
    </nav>
</div>