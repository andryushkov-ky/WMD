<?php
/* Die if it is accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Extending MDB's User capability
 */
class MaterialDesignBlog_Users{

	public function __construct(){
		add_action( 'show_user_profile', 		array( $this, 'user_profile_extended' ) );
		add_action( 'edit_user_profile', 		array( $this, 'user_profile_extended' ) );		
		add_action( 'personal_options_update', 	array( $this, 'user_profile_extended_save' ) );
		add_action( 'edit_user_profile_update', array( $this, 'user_profile_extended_save' ) );
	}

	/**
	 * Displaying extended fields
	 */
	public function user_profile_extended( $user ){
		?>
		<h3><?php _e( 'Social Networks URL', 'materialdesignblog' ); ?></h3>
		<table class="form-table">			
			<?php 
				foreach ( mdb_social_network_list() as $site ) : 

				// Skip website. Default WP already have website field
				if( 'website' == $site ){
					continue;					
				}

				// Define placeholder
				switch ( $site ) {
					case 'googleplus':
						$placeholder = 'http://google.com/+/';
						break;
					
					default:
						$placeholder = sprintf( 'http://%s.com/', $site );
						break;
				}

				// Define saved value
				$value = get_user_meta( $user->data->ID, $site, true );
			?>
			
				<tr>
					<th><label for=""><?php printf( __( 'Your %s URL', 'materialdesignblog' ), ucfirst( $site ) ); ?></label></th>
					<td><input type="text" name="<?php echo esc_attr( $site ); ?>" class="regular-text" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_url( $value ); ?>"></td>
				</tr>

			<?php 
				endforeach; 
			?>
		</table><!-- .form-table -->

		<?php
	}

	/**
	 * Saving extended fields input
	 */
	public function user_profile_extended_save( $user ){
		foreach ( mdb_social_network_list() as $site ) {

			// Skip website. Default WP already have website field
			if( 'website' == $site ){
				continue;					
			}

			// Save value
			if( isset( $_POST[$site] ) ){
				update_user_meta( $user, $site, esc_url( $_POST[$site] ) );
			}
		}
	}
}
new MaterialDesignBlog_Users;