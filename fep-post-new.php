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
				<a href="<?php echo esc_url( home_url( '/posts-list/' ) ); ?>" alt="<?php _e( 'Your Articles' ); ?>" class="floating-button ripple-effect fa fa-list" data-ripple-wrap-class="circle">
					<span class="label"><?php _e( 'Your Articles' ); ?></span>
				</a>
				<header class="entry-header">
					<h1 class="entry-title" style="text-align: center;"><?php _e( 'Submit Article' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content" itemprop="text">
					<?php echo do_shortcode( '[wpfepp_submission_form form="1"]' ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
