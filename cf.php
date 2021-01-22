<div class="column col-subscription col-sub-col np col-<?php echo $cfwidth ?> col-margin-r-0 col-margin-l-<?php echo $cfmar; ?>">
    <div class="title-bar">
        <h2><?php the_field('contact_form_title', 'options'); ?></h2>

    </div>
    <div class="subscription">
        <div class="subscription-text">
            <p><?php the_field('contact_form_text', 'options'); ?></p>
        </div>
        <?php echo do_shortcode( '[contact-form-7 id="4876" title="Contact form 1"]' ); ?>
    </div>
</div>