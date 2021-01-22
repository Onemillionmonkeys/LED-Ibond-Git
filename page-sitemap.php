<?php 
/*
* Template Name: Sitemap
*/

get_header(); ?>
  <article class="c-sitemap">
    <column class="col-6 col-list">
      <h1><?php the_title(); ?></h1>
    </column>
    <column class="col-3 col-list">
      <ul>
        <?php wp_list_pages(); ?>
        <li class="pagenav">Posts
          <ul>
            <?php 
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post_status' => 'publish'
              );
              $posts = get_posts($args);
              foreach ($posts as $p) {
                echo '<li class="page_item page-item-'. $p->ID .'"><a href="'. get_permalink($p->ID) .'">'. get_the_title($p->ID) .'</a></li>';
              }
            ?>
          </ul>
        </li>
      </ul>
    </column>
    <column class="col-3 col-list">
      <ul>
        <?php
          $args = array(
            'post_type' => 'case',
            'title_li'  => __( 'Cases', 'ledibond' )
          );
          wp_list_pages($args);
          $args = array(
            'post_type' => 'product',
            'title_li'  => __( 'Products', 'ledibond' )
          );
          wp_list_pages($args);
          $args = array(
            'post_type' => 'technology',
            'title_li'  => __( 'Technologies', 'ledibond' )
          );
          wp_list_pages($args);
          $args = array(
            'post_type' => 'segment',
            'title_li'  => __( 'Segments', 'ledibond' )
          );
          wp_list_pages($args);
        ?>
      </ul>
    </column>
  </article>
<?php get_footer(); ?>
