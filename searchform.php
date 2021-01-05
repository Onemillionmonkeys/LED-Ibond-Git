<?php 
if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
  $search = ICL_LANGUAGE_CODE;
}
if ($search == 'es') {
    $placeholder = 'Buscar';
}
if ($search == 'en') {
    $placeholder = 'Search';
}
if ($search == 'da') {
    $placeholder = 'Søg';
}
if ($search == 'it') {
    $placeholder = 'Ricerca';
}

?>


<div class="search-field">
	<form action="<?php bloginfo('url'); ?>/" method="get">
		<input type="text" placeholder="<?php echo $placeholder; ?>" name="s" id="search" value="<?php the_search_query(); ?>" />
		<input type="image" alt="Search" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/magnify.svg" />
	</form>
</div>