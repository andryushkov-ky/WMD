<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MaterialDesignBlog
 */

/**
 * MDB site branding for the header.php
 * 
 * @return void
 */
function mdb_site_branding(){
	?>
		<div class="site-branding">
      <a href="/" class="ripple-effect ico-site-logo-wrap" data-ripple-limit="#masthead" data-ripple-color="#f4835e">
        <div class="ico-site-logo-center"></div>
      </a>
			<?php if ( is_author() ) : ?>

				<?php
					global $wp_query;

					// Author information
					$author_id = $wp_query->query_vars['author'];
					$author_data = $wp_query->get_queried_object();
					$author = get_userdata( $author_id );
				?>
				<div class="site-logo-link">
					<?php echo get_avatar( $author_data->user_email, 137 ); ?>
				</div>				
				<h1 class="site-title"><?php echo $author_data->display_name; ?></h1>
				<div class="site-description">
					<?php echo wpautop( $author_data->description ); ?>
				</div>
				<ul class="author-social-links">
					<?php
						$site_alt = array( 'facebook', 'googleplus' );
						foreach ( mdb_social_network_list() as $site ) {
							
							// Define genericon's icon
							if( in_array( $site, $site_alt) ){
								$genericon_icon = $site . '-alt';
							} else {
								$genericon_icon = $site;
							}

							// Get href value
							switch ( $site ) {
								case 'website':
									$site_url = $author->user_url;
									break;
								
								default:
									$site_url = get_user_meta( $author_id, $site, true );
									break;
							}

							if( $site_url && '' != esc_url( $site_url ) ){

								printf( '<li><a href="%s" class="genericon ripple-effect genericon-%s %s" data-ripple-wrap-class="circle"><span class="label">%s</span></a></li>', esc_url( $site_url ), $genericon_icon, $site, $site );

							}
						}
					?>
				</ul>

			<?php elseif( is_mdb_page( 'edit-profile' ) && is_user_logged_in() ) : ?>

				<?php
					global $current_user;

					// Author information
					$author_id 		= $current_user->data->ID;
					$author 		= get_userdata( $author_id );
				?>
				<div class="site-logo-link">
					<?php echo get_avatar( $author->user_email, 137 ); ?>
				</div>				
				<h1 class="site-title"><?php echo esc_html( $author->display_name ); ?></h1>
				<div class="site-description">
					<?php echo wpautop( esc_html( get_user_meta( $author_id, 'description', true ) ) ); ?>
				</div>
				<ul class="author-social-links">
					<?php
						$site_alt = array( 'facebook', 'googleplus' );
						foreach ( mdb_social_network_list() as $site ) {
							
							// Define genericon's icon
							if( in_array( $site, $site_alt) ){
								$genericon_icon = $site . '-alt';
							} else {
								$genericon_icon = $site;
							}

							// Get href value
							switch ( $site ) {
								case 'website':
									$site_url = $author->user_url;
									break;
								
								default:
									$site_url = get_user_meta( $author_id, $site, true );
									break;
							}

							if( $site_url && '' != esc_url( $site_url ) ){

								printf( '<li><a href="%s" class="genericon ripple-effect genericon-%s %s" data-ripple-wrap-class="circle"><span class="label">%s</span></a></li>', esc_url( $site_url ), $genericon_icon, $site, $site );

							}
						}
					?>
				</ul>

			<?php else : ?>

				<?php mdb_site_logo( 'site_logo' ); ?>						
				
				<?php if ( ! is_mdb_page( 'post-new' ) && ! is_mdb_page( 'posts-list' ) ) : ?>

					<h1 class="site-title" itemprop="headline" >
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="ripple-effect" data-ripple-limit="#masthead">
            <?php if(is_category()) {
                echo "ICOAnatomy ", single_cat_title( '', false );
              } else {
                echo "ICOAnatomy News";
              };
            ?>
            </a>
          </h1>

				<?php endif; ?>

				<ul class="author-social-links">
					<li><a href="https://twitter.com/icoanatomy" class="genericon twitter genericon-twitter ripple-effect" data-ripple-wrap-class="circle"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.facebook.com/ICOAnatomy-957837074381494/" class="genericon facebook genericon-facebook-alt ripple-effect" data-ripple-wrap-class="circle"><span class="label">Facebook</span></a></li>
					<li><a href="https://www.linkedin.com/company/icoanatomy/" class="genericon linkedin genericon-linkedin-alt ripple-effect" data-ripple-wrap-class="circle"><span class="label">LinkedIn</span></a></li>
					<li><a href="https://t.me/icoanatomy" class="telegram genericon-telegram-alt ripple-effect" data-ripple-wrap-class="circle"><span class="label">Telegram</span></a></li>
				</ul>
				
			<?php endif; ?>
		</div><!-- .site-branding -->
	<?php
}

if ( ! function_exists( 'mdb_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function mdb_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'materialdesignblog' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav nav-previous">%link</div>', __( '<span class="thumbnail"></span><span class="label">Previous</span><span class="title">%title</span>', 'materialdesignblog' ) );
				next_post_link(     '<div class="nav nav-next">%link</div>',     __( '<span class="thumbnail"></span><span class="label">Next</span><span class="title">%title</span>', 'materialdesignblog' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if( ! function_exists( 'mdb_paging_nav_newer' ) ) :
/**
 * Display navigation to newer set of posts when applicable.
 */
function mdb_paging_nav_newer() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<?php if ( get_previous_posts_link() ) : ?>

	<nav class="navigation paging-navigation newer" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'materialdesignblog' ); ?></h1>
		<div class="nav-links">
			<div class="nav-next"><?php previous_posts_link( __( '<span class="label">Newer Posts</span>', 'materialdesignblog' ) ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->

	<?php endif; ?>

	<?php
}
endif; 

if ( ! function_exists( 'mdb_paging_nav_older' ) ) :
/**
 * Display navigation to older set of posts when applicable.
 */
function mdb_paging_nav_older() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<?php if ( get_next_posts_link() ) : ?>

	<nav class="navigation paging-navigation older" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'materialdesignblog' ); ?></h1>
		<div class="nav-links">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="label">More Posts</span>', 'materialdesignblog' ) ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->

	<?php endif; ?>

	<?php
}
endif;


if ( ! function_exists( 'mdb_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function mdb_posted_on() {

	if( get_post_type() == 'post' ) :

	$time_string = '<time class="entry-time published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-time published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
	}

	// Determine date format
	if( is_singular() ){
		$date_format = __( 'M jS Y', 'materialdesignblog' );
	} else {
		$date_format = __( 'M jS', 'materialdesignblog' );
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( $date_format ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	echo '<span class="posted-on">' . $posted_on . '</span>';

	if( ! is_single() ):

		_e( ' in ');

		the_category( ', ' );

	endif;

	endif;

}
endif;

if ( ! function_exists( 'mdb_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function mdb_entry_footer() {

	// Default edit post link
	edit_post_link( __( 'Edit', 'materialdesignblog' ), '<span class="edit-link">', '</span>' );

	// Form contributor below
	mdb_edit_post_link();
	
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'materialdesignblog' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . __( '<span class="label">Posted in</span> %1$s', 'materialdesignblog' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'materialdesignblog' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( '<span class="label">Tagged by</span> %1$s', 'materialdesignblog' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'materialdesignblog' ), __( '1 Comment', 'materialdesignblog' ), __( '% Comments', 'materialdesignblog' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'materialdesignblog' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'materialdesignblog' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'materialdesignblog' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'materialdesignblog' ), get_the_date( _x( 'Y', 'yearly archives date format', 'materialdesignblog' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'materialdesignblog' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'materialdesignblog' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'materialdesignblog' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'materialdesignblog' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'materialdesignblog' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'materialdesignblog' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'materialdesignblog' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'materialdesignblog' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'materialdesignblog' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Post thumbnail
 */
if( ! function_exists( 'mdb_entry_thumbnail' ) ) :
function mdb_entry_thumbnail( $post_id = false ){

	if( ! $post_id ){
		$post_id = get_the_ID();
	}

	if( has_post_thumbnail() ){

		if( is_sticky( $post_id ) ){
			$thumbnail_size = 'content-thumbnail-sticky';
		} else {
			$thumbnail_size = 'content-thumbnail';
		}

		echo '<a href="'. esc_url( get_permalink( $post_id ) ) .'" title="'. esc_attr( get_the_title( $post_id ) ) .'" class="entry-thumbnail ripple-effect" data-ripple-limit=".hentry">';
		echo get_the_post_thumbnail( $post_id, $thumbnail_size, array( 'itemprop' => 'image' ) );
		echo '</a>';

	} 
}
endif;

/**
 * Custom callback for displaying comment
 */
if( ! function_exists( 'mdb_comment' ) ) :
function mdb_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'materialdesignblog' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'materialdesignblog' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
			</div>

			<?php if ( '0' == $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'materialdesignblog' ) ?></em>
			<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
				<?php echo get_comment_date(); ?>
				</a>

				<?php edit_comment_link( __( '| Edit', 'materalist' ), '&nbsp;', '' ); ?>
			</div>

			<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			<div class="reply">
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>'
					) ) );
				?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Display featured image as header background
 */
if( ! function_exists( 'mdb_masthead_background' ) ) :
function mdb_masthead_background(){
	if( is_singular() ){
		global $post;

		if( isset( $post->ID ) ){

			$featured_image_id = get_post_thumbnail_id( $post->ID);

			if( intval( $featured_image_id ) > 0 ){

				$featured_image = wp_get_attachment_image_src( $featured_image_id, $size = 'full' );

				if( isset( $featured_image[0] ) ){

					$featured_image_url = esc_url( $featured_image[0] );

					echo "style='background: url( {$featured_image_url} ); background-size: cover;'"
					;
				}

			}

		}
	} elseif( is_author() ){
		
		if( isset( get_queried_object()->data->ID ) ){
			
			$cover_image = get_user_meta( get_queried_object()->data->ID, 'cover_image', true );
			
			if( isset( $cover_image['full'] ) ){

				$cover_image_full = esc_attr( $cover_image['full'] );

				echo "style='background: url( {$cover_image_full} ); background-size: cover;'";

			}

		}

	} elseif( is_mdb_page( 'edit-profile' ) ) {

		global $current_user;

		$cover_image = get_user_meta( $current_user->data->ID, 'cover_image', true );

		if( isset( $cover_image['full'] ) ){

			$cover_image_full = esc_attr( $cover_image['full'] );

			echo "style='background: url( {$cover_image_full} ); background-size: cover;'";

		}
	}
}
endif;

/**
 * Generate proper class for #masthead
 */
if( ! function_exists( 'mdb_masthead_classes' ) ) :
function mdb_masthead_classes(){
	if( is_singular() ){
		global $post;

		if( has_post_thumbnail( $post->ID ) ){
			$classes = 'site-header has-background';
		} else {
			$classes = 'site-header';
		}
	} else {
		$classes = 'site-header';
	}

	echo $classes;
}
endif;

/**
 * Display site logo
 */
if( ! function_exists( 'mdb_site_logo' ) ) :
function mdb_site_logo( $key = 'site_logo' ){

	$logo_url 	= get_theme_mod( $key, false );
	$url 		= esc_url( home_url( '/' ) );

	if( $logo_url ){
		printf( '<a href="%s" class="site-logo-link"><img src="%s" /></a>', $url, esc_url( $logo_url ) );
	}
}
endif;

/**
 * <html> tag's schema.org markup
 */
if( ! function_exists( 'mdb_schema_org_markup' ) ){
function mdb_schema_org_markup(){
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single()) {
        $type = "Article";
    }

    // Is author page
    elseif( is_author() ) {
        $type = 'ProfilePage';
    }
    
    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';		
}
}

/**
 * Get current URL, courtesy of Konstantin Kovshenin
 * 
 * @return string of current URL
 */
function mdb_current_url(){
    global $wp;

    $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
    
    return $current_url;
}

/**
 * Conditional tag for checking materialdesignblog_page status
 */
function is_mdb_page( $name = '' ){	
	global $wp_query;
	
	if( isset( $wp_query->query['materialdesignblog_page'] ) && $name == $wp_query->query['materialdesignblog_page'] ){
		return true;
	} else {
		return false;
	}
}

/**
 * Check if current author page is owned by current user
 * 
 * @return bool
 */
function is_mdb_author_current_user(){
	if( is_author() && is_user_logged_in() ){
		global $current_user;

		if( intval( $current_user->data->ID ) == get_query_var( 'author', 0 ) ){
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Get URL to current user posts' page
 * 
 * @return string URL to current user posts' page
 */
function mdb_current_author_page(){
	if( is_user_logged_in() ){
		global $current_user;

		return get_author_posts_url( $current_user->data->ID );
	} else {
		return false;
	}
}

/**
 * Print edit profile field
 * 
 * @param string    type of field
 * @param string    field id
 * @param string    field label
 * @param mixed     field value
 * 
 * @return void
 */
function mdb_edit_profile_field( $type = 'text', $id = 'full-name', $label = 'Full Name', $placeholder = false, $value = '' ){
    ?>
        <p class="info <?php echo $id; ?>">
            <label for="input-<?php echo $id; ?>"><?php echo $label; ?></label>
            
            <?php
                switch ( $type ) {
                    case 'text':
                        ?>
                        <input type="text" name="input-<?php echo $id; ?>" id="input-<?php echo $id; ?>" class="input" value="<?php echo $value; ?>" />
                        <?php
                        break;

                    case 'text-disabled':
                        ?>
                        <input type="text" name="input-<?php echo $id; ?>" id="input-<?php echo $id; ?>" class="input" value="<?php echo $value; ?>" disabled="disabled" />
                        <?php
                        break;

                    case 'text-hidden':
                        ?>
                        <input type="hidden" name="input-<?php echo $id; ?>" id="input-<?php echo $id; ?>" class="input" value="<?php echo $value; ?>" />
                        <?php
                    	break;

                    case 'textarea':
                        ?>
                        <textarea name="input-<?php echo $id; ?>" id="input-<?php echo $id; ?>" rows="5"><?php echo esc_html( $value ); ?></textarea>
                        <?php
                        break;

                    case 'password':
                        ?>
                        <input type="password" name="input-<?php echo $id; ?>" id="input-<?php echo $id; ?>" class="input" value="<?php echo $value; ?>" />
                        <?php
                        break;

                    case 'image':
                        $user   = wp_get_current_user();
                        $image  = get_user_meta( $user->data->ID, $value, true );

                        // Avatar: load local avatar, or gravatar.
                        if( 'avatar' == $id ){
                        	$src = mdb_get_avatar_url( $user->data->ID, 150 );
                        } else {
	                        if( isset( $image['media_id'] ) ){
	                            $media_id = $image['media_id'];
	                        } else {
	                            $media_id = false;
	                        }

	                        if( isset( $image['full'] ) ){
	                            $src = $image['full'];
	                        } else {
	                            $src = false;
	                        }
                        }
                        ?>
                        <input type="hidden" name="input-<?php echo $id; ?>[media_id]" id="input-<?php echo $id; ?>-media-id" class="input" placeholder="<?php echo $placeholder; ?>" value="<?php echo $media_id; ?>" />
                        <input type="hidden" name="input-<?php echo $id; ?>[full]" id="input-<?php echo $id; ?>" class="input" placeholder="<?php echo $placeholder; ?>" value="<?php echo $src; ?>" />
                        <a href="#" class="toggle-media-uploader" data-id="input-<?php echo $id; ?>">
                            <span class="input-image-preview" data-id="input-<?php echo $id; ?>">
                                <?php
                                    if( $src ){
                                        echo "<img src='$src' />";
                                    }
                                ?>
                            </span>

                            <span class="input-image-text ripple-effect button"><?php echo $placeholder; ?></span>
                        </a>
                        <?php
                        break;

                    default:
                        # code...
                        break;
                }
            ?>
        </p>
    <?php
}

/**
 * Get local avatar / gravatar URL (expecting Simple Local Avatars plugin exists)
 * 
 * @see Simple_Local_Avatars->get_avatar()
 * @see get_avatar_url()
 * 
 * @param int user ID
 * @param int avatar size
 * 
 * @return string path to gravatar
 */
function mdb_get_avatar_url( $user_id, $size = 96 ){

	// Get local avatar
	$local_avatars = get_user_meta( $user_id, 'simple_local_avatar', true );

	// If there's local avatar, return local avatar
	if( isset( $local_avatars['full'] ) ){

		// Generate new image if local avatar with requested size hasn't been made
		if( ! array_key_exists( $size, $local_avatars ) ){
		
			$local_avatars[$size] = $local_avatars['full']; // just in case of failure elsewhere

			$upload_path = wp_upload_dir();

			$avatar_full_path = str_replace( $upload_path['baseurl'], $upload_path['basedir'], $local_avatars['full'] );

			// generate the new size
			$editor = wp_get_image_editor( $avatar_full_path );

			if ( ! is_wp_error( $editor ) ) {
				$resized = $editor->resize( $size, $size, true );
				if ( ! is_wp_error( $resized ) ) {
					$dest_file = $editor->generate_filename();
					$saved = $editor->save( $dest_file );
					if ( ! is_wp_error( $saved ) )
						$local_avatars[$size] = str_replace( $upload_path['basedir'], $upload_path['baseurl'], $dest_file );
				}
			}

			// save updated avatar sizes
			update_user_meta( $user_id, 'simple_local_avatar', $local_avatars );
		}

		// Return local avatar
		return $local_avatars[$size];		
	} else {
		// Get gravatar URL
		$gravatar_url = get_avatar_url( $user_id, array( 'size' => $size ) );

		// return gravatar URL
		return $gravatar_url;
	}
}

/**
 * Check if posted data exists and should the data is saved by comparing it against default value
 * 
 * @param string key
 * @param string default value
 * 
 * @return bool
 */
function mdb_maybe_save_post( $key, $default ){
	if( isset( $_POST[$key] ) && $_POST[$key] != $default ){
		return true;
	} else {
		return false;
	}
}

/**
 * Print notification
 * 
 * @param string message
 * @param string status
 */
function mdb_notification( $message, $classes = 'success' ){
	printf( '<div class="notification %s">%s</div>', $classes, $message );
}

/**
 * Check whether the given email address is already exist
 * 
 * @param string email address
 * 
 * @return mixed string if success, bool if false
 */
function mdb_is_email_registered( $email ){
	global $wpdb;

	$query = $wpdb->prepare( "SELECT user_email FROM {$wpdb->users} WHERE user_email=%s", $email );

	$result = $wpdb->get_var( $query );

	if( $result ){
		return true;
	} else {
		return false;
	}
}

/**
 * Edit link for frontend publishing pro
 * 
 * @return void
 */
function mdb_edit_post_link(){
	if( function_exists( 'wpfepp_run_plugin' ) && is_user_logged_in() && is_single() && 'post' == get_post_type() ){
		global $current_user, $post;

		// Edit link is only given to post's author with roler lower & equal to contributor
		if( $post->post_author == $current_user->data->ID && ! current_user_can( 'edit_post' ) ){
			printf( __( '<span class="edit-link"><a class="post-edit-link" href="%s">Edit</a></span>' ), home_url( '/posts-list/?wpfepp_action=edit&wpfepp_post=' . $post->ID ) );
		}
	}
}

/**
 * Profile editing mechanism
 * 
 * @return array of profile update
 */
function mdb_edit_profile_processing(){
	// Profile saving mechanism
	global $current_user;

	$profile_updated = array();

	if( 
		is_user_logged_in() && 
		isset( $_POST['input-user_id'] ) && 
		isset( $_POST['_n'] ) &&
		$current_user->data->ID == intval( $_POST['input-user_id'] ) &&
		wp_verify_nonce( $_POST['_n'], 'materialdesignblog-edit-profile-' . $current_user->data->ID )
	){
		$user_data = array();

		// Display name
		if( mdb_maybe_save_post( 'input-display_name', $current_user->data->display_name ) ){
			$user_data['display_name'] = sanitize_text_field( $_POST['input-display_name'] ); 
		}

		// Email
		if( mdb_maybe_save_post( 'input-user_email', $current_user->data->user_email ) ){

			// Verify email address
			if( ! is_email( $_POST['input-user_email'] ) ){

				$profile_updated['error'][] = __( 'Error updating email: the email you are using is not a valid email address' );

			// Check for registered user
			} elseif ( mdb_is_email_registered( sanitize_text_field( $_POST['input-user_email'] ) ) ){

				$profile_updated['error'][] = __( 'Error updating email: A user with the email you specified already exists. Please select a different email address.' );

			} else {

					// Define email address
					$input_user_email = sanitize_text_field( $_POST['input-user_email'] );

					// Create random string
					$hash = md5( $input_user_email . time() . mt_rand() );

					// Define the hash and email as array
					$new_user_email = array(
						'hash' 		=> $hash,
						'newemail' 	=> $input_user_email
					);

					// Create an option for this
					update_option( $current_user->data->ID . '_new_email', $new_user_email );

					// Prepare user notification email
					$email_text = __( "Dear user,

You recently requested to have the email address on your account changed. If this is correct, please click on the following link to change it: ###ADMIN_URL### 
\n
You can safely ignore and delete this email if you do not want to take this action.
\n
This email has been sent to ###EMAIL###
\n
Regards, \n
All at ###SITENAME### \n
###SITEURL###" );
					
					// Replace the template email with actual data
					$content = apply_filters( 'new_user_email_content', $email_text, $new_user_email );
					$content = str_replace( '###ADMIN_URL###', esc_url( home_url( '/edit-profile/?email-hash=' . $hash ) ), $content );
					$content = str_replace( '###EMAIL###', $input_user_email, $content);
					$content = str_replace( '###SITENAME###', get_bloginfo( 'name' ), $content );
					$content = str_replace( '###SITEURL###', esc_url( home_url('/') ), $content );

					// Send email
					$sending_email = wp_mail( 
						$input_user_email, 
						sprintf( __( '[%s] New Email Address' ), wp_specialchars_decode( get_option( 'blogname' ) ) ), 
						$content 
					);

					// Notify user
					$profile_updated['success'][] = sprintf( __( 'Verification is required to change your email: Please check your email address at %s and click the link we send you. Once you click the link, your email address will be changed' ), $input_user_email );
			}
		}

		// Description
		if( mdb_maybe_save_post( 'input-description', get_user_meta( $current_user->data->ID, 'description', true ) ) ){
			update_user_meta( $current_user->data->ID, 'description', sanitize_text_field( $_POST['input-description'] ) );

			// Notify user
			$profile_updated['success'][] = __( 'Your profile description has been updated' );
		}

		// Avatar
		if( isset( $_REQUEST['input-avatar']['media_id'] ) && isset( $_REQUEST['input-avatar']['full'] ) && wp_attachment_is_image( $_REQUEST['input-avatar']['media_id'] ) ){
			$avatars = get_user_meta( $current_user->data->ID, 'simple_local_avatar', true );

			if( !isset( $avatars['media_id'] ) || $avatars['media_id'] != intval( $_REQUEST['input-avatar']['media_id'] ) ){
				update_user_meta( $current_user->data->ID, 'simple_local_avatar', $_REQUEST['input-avatar'] );

				$profile_updated['success'][] = __( 'Your avatar has been updated' );
			}
		}

		// Cover image
		if( isset( $_REQUEST['input-cover']['media_id'] ) && isset( $_REQUEST['input-cover']['full'] ) && wp_attachment_is_image( $_REQUEST['input-cover']['media_id'] ) ){
			$avatars = get_user_meta( $current_user->data->ID, 'cover_image', true );

			if( !isset( $avatars['media_id'] ) || $avatars['media_id'] != intval( $_REQUEST['input-cover']['media_id'] ) ){
				update_user_meta( $current_user->data->ID, 'cover_image', $_REQUEST['input-cover'] );

				$profile_updated['success'][] = __( 'Your cover image has been updated' );
			}
		}

		// Website
		if( mdb_maybe_save_post( 'input-user_url', $current_user->data->user_url ) ){
			$user_data['user_url'] = esc_url( $_POST['input-user_url'] );
		}

		// Social Networks: Loop list of social network list
		foreach ( mdb_social_network_list() as $site ){
			// If this is website, skip it
			if( 'website' == $site ){
				continue;
			}

			// Get default value
			$site_value = get_user_meta( $current_user->data->ID, $site, true );

			if( mdb_maybe_save_post( 'input-' . $site, $site_value ) ){

				$profile_updated['success']['social-network-url'] = __( 'Your social network URL has been updated' );

				update_user_meta( $current_user->data->ID, $site, esc_url( $_POST['input-'.$site] ) );
			}
		}
		
		// Update password
		if( 
			! empty( $_POST['input-user_password'] ) &&
			! empty( $_POST['input-user_password_repeat'] )
		){
			$pass1				= sanitize_text_field( $_POST['input-user_password'] );
			$pass2 				= sanitize_text_field( $_POST['input-user_password_repeat'] );
			$password_length 	= strlen( $pass1 );	

			// Check the password integrity first
			if( $password_length < 6 ){ 

				$profile_updated['error'][] = __( 'Error updating password. Password should be longer than 6 characters' );

			} elseif ( $pass1 != $pass2 ) {
				
				$profile_updated['error'][] = __( 'Error updating password. Password and its repetition are not matched' ); // password and its repetition should match

			} elseif( false !== strpos( wp_unslash( $pass1 ), "\\" ) ) {
				
				$profile_updated['error'][] = __( 'You cannot use \ in your passowrd' ); // Check for "\" in password

			} else {

				$update_password = wp_update_user( array(
					'ID' 		=> $current_user->data->ID,
					'user_pass' => $pass1
				) );

				if( is_wp_error( $update_password ) ){
					$profile_updated['error'][] = __( 'Error updating password. Please  trye again' );
				} else {				
					$profile_updated['success'][] = __( 'Your password has been updated' );
				}
			}
		}

		if(
			! empty( $_POST['input-user_password'] ) &&
			empty( $_POST['input-user_password_repeat'] )
		) {
			$profile_updated['error'][] = __( 'Error updating password: You have to repeat the new password you wish to use at "repeat new password" field.' );
		}

		// Save user data
		if( ! empty( $user_data ) ){
			// Append user ID
			$user_data['ID'] 	= $current_user->data->ID;

			// Updating user data
			$update_user_data  	= wp_update_user( $user_data );

			if( ! is_wp_error( $update_user_data ) ){

				$profile_updated['success'][] = __( 'Your profile has been updated' );

			}		
		}
	}

	// Verify email changes
	if( isset( $_GET['email-hash'] ) ){

		// Define email hash
		$email_hash = sanitize_text_field( $_GET['email-hash'] );

		// Get newly added email data
		$new_email = get_option( $current_user->data->ID . '_new_email' );

		if( is_array( $new_email ) && array_key_exists( 'hash', $new_email ) && array_key_exists( 'newemail', $new_email ) ){

			if( $new_email['hash'] == $email_hash && is_email( $new_email['newemail'] ) ){

				// Change the email address
				$update_user_email = wp_update_user( array(
					'ID' 		=> $current_user->data->ID,
					'user_email' => $new_email['newemail']
				));

				if( is_wp_error( $update_user_email ) ){

					$profile_updated['error'][] = __( 'An error happens while updating your email. Please try again.' );

				} else {

					// delete the previously saved hash data
					delete_option( $current_user->data->ID . '_new_email' );

					$profile_updated['success'][] = __( 'Your email has been changed' );

				}

			} else {

				$profile_updated['error'][] = __( 'An error occurred. Your email notification is incorrect. Please try changing your email again.' );

			}

		} else {

			$profile_updated['error'][] = __( 'Error verifying email change. No record of changing email found. Please try changing your email again.' );

		}
	}	

	return $profile_updated;
}