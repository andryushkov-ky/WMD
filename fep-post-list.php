<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package MaterialDesignBlog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" class="hentry" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				
				<?php if( isset( $_GET['wpfepp_action'] ) && 'edit' == $_GET['wpfepp_action'] ) : ?>

					<a href="<?php echo esc_url( home_url( '/posts-list/' ) ); ?>" alt="<?php _e( 'Your Articles' ); ?>" class="floating-button ripple-effect fa fa-list" data-ripple-wrap-class="circle"><span class="label"><?php _e( 'Your Articles' ); ?></span></a>

				<?php else : ?>

					<a href="<?php echo esc_url( home_url( '/post-new/' ) ); ?>" class="floating-button ripple-effect fa fa-plus" title="<?php _e( 'Submit Article' ); ?>" data-ripple-wrap-class="circle"><span class="label"><?php _e( 'Submit Article' ); ?></span></a>

				<?php endif; ?>

				<header class="entry-header">
					<h1 class="entry-title" style="text-align: center;"><?php _e( 'Your Articles' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content" itemprop="text">
					<?php echo do_shortcode( '[wpfepp_post_table form="1"]' ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
