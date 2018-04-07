<?php
/**
 * @package MaterialDesignBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<?php mdb_posted_on(); ?>
	<?php get_template_part( 'schema', 'post' ); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">'. __( 'Pages:', 'materialdesignblog' ) .'</span>',
				'after'  => '</div>',
				'pagelink' => '<span class="page-link">%</span>'
			) );
		?>
		
		<h4 class="share-title"><?php _e( 'Share this:', 'materialdesignblog' ); ?></h4>
		<ul class="social-links">
			<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" class="genericon facebook genericon-facebook-alt"><span class="label">Facebook</span></a></li>
			<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://twitter.com/home?status=%23MaterialDesign Blog: <?php the_permalink(); ?> via @materialdesignB" class="genericon twitter genericon-twitter"><span class="label">Twitter</span></a></li>
			<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>" class="genericon googleplus genericon-googleplus-alt"><span class="label">Google+</span></a></li>
		</ul>					
	</div><!-- .entry-content -->

<!--	<div class="entry-author-box" itemscope itemtype="http://schema.org/Person">-->
<!--		<a href="--><?php //echo esc_url( get_author_posts_url( $post->post_author ) ); ?><!--" class="entry-author-box-avatar" itemprop="url">--><?php //echo get_avatar( get_the_author_meta( 'user_email' ), 100 );  ?><!--</a>			-->
<!--		<a href="--><?php //echo esc_url( get_author_posts_url( $post->post_author ) ); ?><!--" class="entry-author-box-name" itemprop="name">--><?php //the_author(); ?><!--</a>			-->
<!--		-->
<!--		<ul class="author-social-links">-->
<!--			--><?php
//				global $post;
//
//				// Author information
//				$author_id = $post->post_author;
//				$author = get_userdata( $author_id );
//
//				$site_alt = array( 'facebook', 'googleplus' );
//				foreach ( mdb_social_network_list() as $site ) {
//
//					// Define genericon's icon
//					if( in_array( $site, $site_alt) ){
//						$genericon_icon = $site . '-alt';
//					} else {
//						$genericon_icon = $site;
//					}
//
//					// Get href value
//					switch ( $site ) {
//						case 'website':
//							$site_url = $author->user_url;
//							break;
//
//						default:
//							$site_url = get_user_meta( $author_id, $site, true );
//							break;
//					}
//
//					if( $site_url && '' != esc_url( $site_url ) ){
//
//						printf( '<li><a href="%s" class="genericon genericon-%s %s"><span class="label">%s</span></a></li>', esc_url( $site_url ), $genericon_icon, $site, $site );
//
//					}
//				}
//			?>
<!--		</ul>-->
<!--		-->
<!--		<div class="entry-author-box-bio" itemprop="description">-->
<!--			--><?php //echo wpautop( get_the_author_meta( 'description' ) ); ?>
<!--		</div>-->
<!---->
<!--		<a href="--><?php //echo esc_url( get_author_posts_url( $post->post_author ) ); ?><!--" class="entry-author-box-more" itemprop="url">--><?php //printf( __( 'More posts by %s &rarr;' ), get_the_author() ); ?><!--</a>			-->
<!--	</div><!-- .entry-author-box -->

	<footer class="entry-footer">
		<?php mdb_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->