<?php
// Function: fb_entry_meta
if ( ! function_exists( 'fb_entry_meta') ) :
  function fb_entry_meta() {
    if ( 'post' === get_post_type()) {
      $author_avatar_size = apply_filters( 'fb_author_avatar_size', 49);
      printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
  			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
  			_x( 'Author', 'Used before post author name.', 'firstblood' ),
  			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
  			get_the_author()
  		);
    }

    if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
      fb_entry_date();
    }

    $format = get_post_format();
    if ( current_theme_supports( 'post-format', $format) ) {
      printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
  			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'firstblood' ) ),
  			esc_url( get_post_format_link( $format ) ),
  			get_post_format_string( $format )
  		);
    }

    if ( 'post' === get_post_type() ) {
      fb_entry_taxonomies();
    }

    if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
  		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'firstblood' ), get_the_title() ) );
  		echo '</span>';
    }
  }
endif;

// Function: fb_entry_date
if ( ! function_exists( 'fb_entry_date' ) ) :
  function fb_entry_date() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

  	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
  		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  	}

  	$time_string = sprintf( $time_string,
  		esc_attr( get_the_date( 'c' ) ),
  		get_the_date(),
  		esc_attr( get_the_modified_date( 'c' ) ),
  		get_the_modified_date()
  	);

  	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
  		_x( 'Posted on', 'Used before publish date.', 'firstblood' ),
  		esc_url( get_permalink() ),
  		$time_string
  	);
  }
endif;

// Function: fb_entry_taxonomies
if ( ! function_exists( 'fb_entry_taxonomies') ) :
  function fb_entry_taxonomies() {
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'firstblood' ) );
  	if ( $categories_list && fb_categorized_blog() ) {
  		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
  			_x( 'Categories', 'Used before category names.', 'firstblood' ),
  			$categories_list
  		);
  	}

  	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'firstblood' ) );
  	if ( $tags_list ) {
  		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
  			_x( 'Tags', 'Used before tag names.', 'firstblood' ),
  			$tags_list
  		);
  	}
  }
endif;

function fb_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient('fb_categories') ) ) {
    // Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fb_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentysixteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentysixteen_categorized_blog should return false.
		return false;
	}
}

// Function: fb_the_custom_logo
if ( ! function_exists( 'fb_the_custom_logo' ) ) :
  function fb_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
    }
  }
endif;

// Function: fb_excerpt
if ( ! function_exists( 'fb_excerpt') ) :
  function fb_excerpt( $class = 'entry-summary' ) {
    $class = esc_attr( $class );

    if ( has_excerpt() || is_search() ) : ?>
      <div class="<?php echo $class; ?>">
        <?php  the_excerpt(); ?>
      </div>
    <?php endif;
  }
endif;

// Function: fb_post_thumbnail
if ( ! function_exists( 'fb_post_thumbnail') ) :
  function fb_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
      return;
    }

    if ( is_singular() ) : ?>
      <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
      </div>

    <?php else : ?>
      <a href="<?php the_permalink(); ?>" class="post-thumbnail" aria-hidden="true">
      	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
      </a>
    <?php endif;
  }
endif;
