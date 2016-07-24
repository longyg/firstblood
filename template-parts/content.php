<?php
/**
 * The template part for displaying content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-body">
        <header class="entry-header">
          <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <span class="sticky-post"><?php _e( 'Featured', 'firstblood') ?></span>
          <?php endif; ?>

          <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
          <div class="entry-meta">
            <?php fb_entry_meta(); ?>
          </div>
        </header><!-- .entry-header -->

        <?php fb_excerpt(); ?>

        <?php fb_post_thumbnail(); ?>

        <div class="entry-content">
          <?php
            the_content( sprintf(
              __( ' Continue readding<span class="screen-reader-text"> "%s"</span>', 'firstblood'),
              get_the_title()
            ) );

            wp_link_pages( array(
              'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'firstblood') . '</span>',
              'after'       => '</div>',
              'link-before' => '<span>',
              'link-after'  => '</span>',
              'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'firstblood') . ' </span>%',
              'separator'   => '<span class="screen-reader-text">, </span>'
            ) )
          ?>
        </div>

        <footer class="entry-footer">

          <?php
      			edit_post_link(
      				sprintf(
      					/* translators: %s: Name of current post */
      					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'firstblood' ),
      					get_the_title()
      				),
      				'<span class="edit-link">',
      				'</span>'
      			);
      		?>
        </footer>
      </div>
    </div>
  </div>
</article>
