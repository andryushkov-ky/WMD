<?php
/**
 * @package MaterialDesignBlog
 */

global $post;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

	<?php if( is_sticky() ) : ?>
		<div class="entry-badge">		
			<?php 
				$trending = get_post_meta( get_the_ID(), '_mdb_trending', true );
				if( 1 == $trending ) :
			?>
				<span class="md md-trending-up"></span>
				<span class="label"><?php _e( 'Trending', 'materialdesignblog' ); ?></span>
			<?php else : ?>
				<span class="genericon genericon-star"></span>
				<span class="label"><?php _e( 'Featured', 'materialdesignblog' ); ?></span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="entry-options" id="entry-options-<?php the_ID(); ?>">
		<div class="sliding-content" data-direction="bottom">
			<a href="#" data-target-id="entry-options-<?php the_ID(); ?>" class="toggle-button close genericon genericon-close-alt"><span class="label"><?php _e( 'Close', 'materialdesignblog' ); ?></span></a>
			<h3><?php _e( 'Share this with your friends:', 'materialdesignblog' ); ?></h3>
			<ul>
				<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" class="genericon facebook genericon-facebook-alt"><span class="label">Facebook</span></a></li>
				<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://twitter.com/share?url=<?php echo urlencode( get_permalink() )?>" class="genericon twitter genericon-twitter"><span class="label">Twitter</span></a></li>
				<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>" class="genericon googleplus genericon-googleplus-alt"><span class="label">Google+</span></a></li>
			</ul>			
		</div>
	</div>
	
	<?php mdb_entry_thumbnail(); ?>

	<header class="entry-header">		
		<a href="#" class="toggle-hentry-options toggle-button" data-target-id="entry-options-<?php the_ID(); ?>" title="<?php _e( 'Toggle entry options', 'materialdesignblog' ); ?>">&#xf2a3;</a>
		<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" class="ripple-effect" data-ripple-limit=".hentry" itemprop="name">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	
	<?php if( ! has_post_thumbnail() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php endif; ?>

	<div class="entry-meta">
		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Read more of %s', 'materialdesignblog' ), strip_tags( get_the_title( get_the_ID() ) ) ); ?>" class="entry-read-more-pointer" data-ripple-limit=".hentry"><span class="default">&#xf29c;</span></a>
		
		<span class="entry-author-wrap">
			<div class="entry-author">
				<div class="ico-avatar"></div>
			</div>
			<div class="entry-author-name" itemprop="author">ICOAnatomy</div>

<!--      <a href="--><?php //echo esc_url( get_author_posts_url( $post->post_author ) ); ?><!--" class="entry-author">-->
<!--				--><?php
//        echo get_avatar( get_the_author_meta( 'user_email' ), 50 );
//        ?>
<!--			</a>-->
<!--			<a href="--><?php //echo esc_url( get_author_posts_url( $post->post_author ) ); ?><!--" class="entry-author-name" itemprop="author">--><?php //the_author(); ?><!--</a>			-->
		</span>
		<?php mdb_posted_on(); ?>
	</div>
</article><!-- #post-## -->