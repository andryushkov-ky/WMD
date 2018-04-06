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

if( ! is_user_logged_in() ){
	wp_redirect( home_url( '/wp-login.php?redirect_to=' . urlencode( mdb_current_url() ) ) );
}

$profile_updated = mdb_edit_profile_processing();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" class="hentry" style="margin-top: 0;" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<header class="entry-header">
					<?php 
						// Print notification
						if( isset( $profile_updated['success'] ) && is_array( $profile_updated['success'] ) ){

							// Loop notifications
							foreach ( $profile_updated['success'] as $success_notification ) {
								mdb_notification( $success_notification, 'animated slideInDown' );
							}
						}

						// Print error notification
						if( isset( $profile_updated['error'] ) && is_array( $profile_updated['error'] ) ){

							// Loop notifications
							foreach ( $profile_updated['error'] as $error_notification ) {
								mdb_notification( $error_notification, 'error animated slideInDown' );
							}
						}
					?>
					<h1 class="entry-title" style="text-align: center;"><?php _e( 'Edit Profile' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content" itemprop="text">
					<form action="<?php echo esc_url( home_url( '/edit-profile/' ) ); ?>" method="post" id="form-edit-profile">
						<h2><?php _e('Basic Information') ?></h2>
						<div class="basic-inputs has-input-icon">						
						<?php
							$current_user_data = get_userdata( $current_user->data->ID );

							// Username
							mdb_edit_profile_field(
								'text-disabled',
								'user_login',
								__( 'Username (cannot be changed)' ),
								false,
								esc_attr( $current_user_data->user_nicename )
							);

							// Display name
							mdb_edit_profile_field(
								'text',
								'display_name',
								__( 'Display Name' ),
								false,
								esc_attr( $current_user_data->display_name )
							);

							// User Email
							mdb_edit_profile_field(
								'text',
								'user_email',
								__( 'Email' ),
								false,
								esc_attr( $current_user_data->user_email )
							);

							// User Email
							mdb_edit_profile_field(
								'textarea',
								'description',
								__( 'Description' ),
								false,
								get_user_meta( $current_user_data->ID, 'description', true )
							);
						?>
						</div><!-- .basic-inputs.has-input-icon -->
						<br>
						
						<?php 
							// Local avatar depends on simple-local-avatars plugin
							if( class_exists( 'Simple_Local_Avatars') ) : 
						?>

						<h2><?php _e( 'Change Avatar' ); ?></h2>
						<p><?php printf( __( 'By default, we display your <a href="%s">Gravatar</a> avatar. However, you can upload another avatar to be used in Material Design Blog:' ), 'http://gravatar.com' ); ?></p>
						<?php
							// Profile Picture
							mdb_edit_profile_field( 
								'image', 
								'avatar', 
								__( 'Profile Picture' ), 
								__( 'Change Image' ), 
								'simple_local_avatar' 
							);

							mdb_edit_profile_field( 
								'image', 
								'cover', 
								__( 'Cover Picture' ), 
								__( 'Change Image' ), 
								'cover_image' 
							);
						?>
						<br>

						<?php endif; ?>


						<h2><?php _e('Social Network URL') ?></h2>

						<div class="social-network-inputs has-input-icon">						
						<?php 
							// User URL
							mdb_edit_profile_field(
								'text',
								'user_url',
								__( 'Type your website URL' ),
								false,
								esc_attr( $current_user_data->user_url )
							);							

							// Loop list of social network list
							foreach ( mdb_social_network_list() as $site ){
								// If this is website, skip it
								if( 'website' == $site ){
									continue;
								}

								// Define label text. Mark exceptions
								if( $site == 'googleplus' ){
									$label = 'Google+';
								} else {
									$label = $site;
								}

								// Get default value
								$site_value = get_user_meta( $current_user_data->ID, $site, true );

								// Print input
								mdb_edit_profile_field(
									'text',
									$site,
									sprintf( __( 'Type your %s URL' ), $label ),
									false,
									esc_url( $site_value )
								);								
							}
						?>	
						</div><!-- .social-network-inputs -->					
						<br>

						<h2><?php _e( 'Change Password' ); ?></h2>
						<div class="password-inputs has-input-icon">
						<p><?php _e( 'If you do not want to change your password, leave it blank.' ); ?></p>
						<?php
							// Password
							mdb_edit_profile_field(
								'password',
								'user_password',
								__( 'Type new password' ),
								false,
								''
							);

							// Repeat password
							mdb_edit_profile_field(
								'password',
								'user_password_repeat',
								__( 'Repeat new password' ),
								false,
								''
							);
						?>								
						</div>	
						<br>

						<?php
							// User ID
							mdb_edit_profile_field(
								'text-hidden',
								'user_id',
								'',
								false,
								esc_attr( $current_user_data->ID )
							);		

							// Nonce
							wp_nonce_field( 'materialdesignblog-edit-profile-' . $current_user_data->ID, '_n' );
						?>
						<span class="submit-wrap ripple-effect">
							<input type="submit" class="button" value="<?php _e( 'Save Changes' ); ?>">						
						</span>
					</form>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
