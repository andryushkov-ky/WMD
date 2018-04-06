<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MaterialDesignBlog
 */
?>

<section class="no-results not-found hentry">
	<?php if ( ! is_author() ) : ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'materialdesignblog' ); ?></h1>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'materialdesignblog' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_author() ) : ?>

			<h3 style="text-align: center;"><?php _e( "This user hasn't published anything yet" ); ?></h3>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'materialdesignblog' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'materialdesignblog' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
</section><!-- .no-results -->
