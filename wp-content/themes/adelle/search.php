<?php get_header(); ?>

  <section class="section" role="main">

    <?php if (have_posts()) : ?>
  
      <h2 class="pagetitle"><?php _e('Searching for','adelle-theme'); ?> &quot;<?php the_search_query(); ?>&quot;</h2>

    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part( 'content', get_post_format() ); ?>

    <?php endwhile; ?>

      <section class="pagination">
        <p><?php echo adelle_theme_pagination_links(); ?></p>
      </section>

    <?php else : get_template_part( 'content', 'list' ); endif; ?>

  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>