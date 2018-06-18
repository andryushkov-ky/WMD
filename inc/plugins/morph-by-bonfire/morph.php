<?php	
	/* create the "Settings > Morph plugin" menu item */
	if( ! function_exists( 'bonfire_morph_admin_menu' ) ) :
	function bonfire_morph_admin_menu() {
		add_submenu_page(
			'options-general.php', 
			'Morph Plugin Settings', 
			'Morph plugin', 
			'administrator', 
			'morph-by-bonfire', 
			'bonfire_morph_page'
		);
	}
	endif;
	
	/* create the actual settings page */
	if( ! function_exists( 'bonfire_morph_page' ) ) :
	function bonfire_morph_page() {
		if ( isset ($_POST['update_bonfire_morph'] ) == 'true' ) { 
			bonfire_morph_update(); 
		}
	?>

		<div class="wrap">
			<br>
			<h2>Morph, by Bonfire</h2>
			<strong>Psst!</strong> Morph's color options can be changed under <strong>Appearance > Customize > Morph Plugin Colors</strong>

			<br>
			<br>
			<strong>Jump to:</strong>
			<a href="#animations">Animations</a> | 
			<a href="#general-options">General options</a> | 
			<a href="#heading-options">Heading options</a> | 
			<a href="#hide-at-certain-width-resolution">Hide at certain width/resolution</a>

			<form method="POST" action="">
				<input type="hidden" name="update_bonfire_morph" value="true" />

				<br><hr><br>
				
				<!-- BEGIN ANIMATIONS -->
				<div id="animations"></div>
				<br>
				<br>
				<h2>Animations</h2>
				<table class="form-table">
					<!-- BEGIN BUTTON ANIMATION -->
					<tr valign="top">
					<th scope="row">Menu button animation:</th>
					<td>
					<?php $morph_button_animation = get_option('bonfire_morph_button_animation'); ?>
					<label><input value="morphnoanimation" type="radio" name="morph_button_animation" <?php if ($morph_button_animation=='morphnoanimation') { echo 'checked'; } ?>> No animation</label><br>
					<label><input value="morphminusanimation" type="radio" name="morph_button_animation" <?php if ($morph_button_animation=='morphminusanimation') { echo 'checked'; } ?>> Minus sign</label><br>
					<label><input value="morphxanimation" type="radio" name="morph_button_animation" <?php if ($morph_button_animation=='morphxanimation') { echo 'checked'; } ?>> X sign</label><br>
					</td>
					</tr>
					<!-- END BUTTON ANIMATION -->
				</table>
				<!-- END ANIMATIONS -->

				<br><hr><br>

				<!-- BEGIN GENERAL OPTIONS -->
				<div id="general-options"></div>
				<br>
				<br>
				<h2>General options</h2>
				<table class="form-table">
					<!-- BEGIN ABSOLUTE POSITIONING -->
					<tr valign="top">
					<th scope="row">Absolute/fixed positioning:</th>
					<td>
					<label><input type="checkbox" name="morph_absolute_position" id="morph_absolute_position" <?php echo get_option('bonfire_morph_absolute_position'); ?> /> Absolute positioning (main menu button will leave the screen when scrolled).
					<br>If unticked, menu button will have fixed positioning and will remain at the top at all times.</label><br>
					</td>
					</tr>
					<!-- END ABSOLUTE POSITIONING -->

					<!-- BEGIN HIDE MAIN MENU BUTTON -->
					<tr valign="top">
					<th scope="row">Hide main menu button?:</th>
					<td>
					<label><input type="checkbox" name="morph_hide_main_menu_button" id="morph_hide_main_menu_button" <?php echo get_option('bonfire_morph_hide_main_menu_button'); ?> /> Hide main menu button. Useful if you'd like to use a custom element as the menu activator (in this case give it the "morph-main-menu-activator" class).</label><br>
					</td>
					</tr>
					<!-- END HIDE MAIN MENU BUTTON -->
					
					<!-- BEGIN HIDE SEARCH -->
					<tr valign="top">
					<th scope="row">Hide search?:</th>
					<td>
					<label><input type="checkbox" name="morph_hide_search" id="morph_hide_search" <?php echo get_option('bonfire_morph_hide_search'); ?> /> Hide search button.</label><br>
					</td>
					</tr>
					<!-- END HIDE SEARCH -->
					
					<!-- BEGIN HIDE SECONDARY MENU -->
					<tr valign="top">
					<th scope="row">Hide secondary menu?:</th>
					<td>
					<label><input type="checkbox" name="morph_hide_secondary_menu" id="morph_hide_secondary_menu" <?php echo get_option('bonfire_morph_hide_secondary_menu'); ?> /> Hide secondary menu button.</label><br>
					</td>
					</tr>
					<!-- END HIDE SECONDARY MENU -->

					<!-- BEGIN BACKGROUND OVERLAY OPACITY -->
					<tr valign="top">
					<th scope="row">Background overlay opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="morph_background_overlay_opacity" id="morph_background_overlay_opacity" value="<?php echo get_option('bonfire_morph_background_overlay_opacity'); ?>"/>
					<br> Enter custom background overlay opacity. From 0-1 (example: 0.5) If left empty, defaults to 0.3
					</td>
					</tr>
					<!-- END BACKGROUND OVERLAY OPACITY -->
					
					<!-- BEGIN DON'T LOAD FONTAWESOME -->
					<tr valign="top">
					<th scope="row">Don't load FontAwesome:</th>
					<td>
					<label><input type="checkbox" name="morph_fa_no_load" id="morph_fa_no_load" <?php echo get_option('bonfire_morph_fa_no_load'); ?> /> Don't load the FontAwesome icon set.</label><br>
					(useful if you don't use any icons with your menu items, or if your theme already loads FontAwesome).
					</td>
					</tr>
					<!-- END DON'T LOAD FONTAWESOME -->
				</table>
				<!-- END GENERAL OPTIONS -->
				
				<br><hr><br>

				<!-- BEGIN HEADING OPTIONS -->
				<div id="heading-options"></div>
				<br>
				<br>
				<h2>Heading options</h2>
				<table class="form-table">
					<!-- BEGIN HEADING TEXT -->
					<tr valign="top">
					<th scope="row">Heading text:</th>
					<td>
					<input style="width:100%;" type="text" name="morph_heading_text" id="morph_heading_text" value="<?php echo get_option('bonfire_morph_heading_text'); ?>"/>
					<br> To add heading text to the slide-out, enter it in the field above.
					</td>
					</tr>
					<!-- END HEADING TEXT -->
					
					<!-- BEGIN SUBHEADING TEXT -->
					<tr valign="top">
					<th scope="row">Sub-heading text:</th>
					<td>
					<input style="width:100%;" type="text" name="morph_subheading_text" id="morph_subheading_text" value="<?php echo get_option('bonfire_morph_subheading_text'); ?>"/>
					<br> To add sub-heading text to the slide-out, enter it in the field above.
					</td>
					</tr>
					<!-- END SUBHEADING TEXT -->
					
					<!-- BEGIN CUSTOM HEADING HEIGHT -->
					<tr valign="top">
					<th scope="row">Custom heading height:</th>
					<td>
					<label><input style="width:45px;height:35px;" type="text" name="morph_heading_height" id="morph_heading_height" value="<?php echo get_option('bonfire_morph_heading_height'); ?>"/>px
					<br> Enter custom height for heading. If left empty, defaults to 200px</label><br>
					</td>
					</tr>
					<!-- END CUSTOM HEADING HEIGHT -->
					
					<!-- BEGIN HEADING OVERLAY OPACITY -->
					<tr valign="top">
					<th scope="row">Heading overlay opacity:</th>
					<td>
					<input style="width:45px;height:35px;" type="text" name="morph_heading_overlay" id="morph_heading_overlay" value="<?php echo get_option('bonfire_morph_heading_overlay'); ?>"/>
					<br> Enter custom opacity for heading overlay color. From 0-1 (example: 0.5) If left empty, defaults to 0.2
					</td>
					</tr>
					<!-- END HEADING OVERLAY OPACITY -->
					
					<!-- BEGIN HEADING IMAGE -->
					<tr valign="top">
					<th scope="row">Heading image:</th>
					<td>
					<input style="width:100%;" type="text" name="morph_heading_image" id="morph_heading_image" value="<?php echo get_option('bonfire_morph_heading_image'); ?>"/>
					<br> To use a background image in the header, enter its URL in the field above.
					</td>
					</tr>
					<!-- END HEADING IMAGE -->
					
					<!-- BEGIN BACKGROUND PATTERN -->
					<tr valign="top">
					<th scope="row">Pattern image:</th>
					<td>
					<label><input type="checkbox" name="morph_heading_image_pattern" id="morph_heading_image_pattern" <?php echo get_option('bonfire_morph_heading_image_pattern'); ?> /> Tick this is if you wish the above image to be shown as a pattern.
					<br>If unchecked, image will be shown in full-size 'cover' style.</label><br>
					</td>
					</tr>
					<!-- END BACKGROUND PATTERN -->
				</table>
				<!-- END HEADING OPTIONS -->

				<br><hr><br>

				<!-- BEGIN HIDE BETWEEN RESOLUTIONS -->
				<div id="hide-at-certain-width-resolution"></div>
				<br>
				<br>
				<h2>Hide at certain width/resolution</h2>
				<table class="form-table">
					<tr valign="top">
					<th scope="row">Hide at certain width/resolution:</th>
					<td>
					Hide Morph menu if browser width or screen resolution is between <input style="width:50px;" type="text" name="morph_smaller_than" id="morph_smaller_than" value="<?php echo get_option('bonfire_morph_smaller_than'); ?>"/> and <input style="width:50px;" type="text" name="morph_larger_than" id="morph_larger_than" value="<?php echo get_option('bonfire_morph_larger_than'); ?>"/> pixels (fill both fields).
					<br><strong>Example:</strong> if you'd like to show morph on desktop only, then enter the values as 0 and 500. If fields are empty, morph will be visible at all browser widths and resolutions.
					</td>
					</tr>
				</table>
				<!-- END HIDE BETWEEN RESOLUTIONS -->

				<br><hr><br>

				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	
				<p><input type="submit" name="search" value="Save Options" class="button button-primary" /></p>
				<!-- BEGIN 'SAVE OPTIONS' BUTTON -->	

			</form>

		</div>
	<?php 
	}
	endif;

	if( ! function_exists( 'bonfire_morph_update' ) ) :
	function bonfire_morph_update() {

		/* menu button animation */
		if ( isset ($_POST['morph_button_animation']) == 'true' ) {
			update_option('bonfire_morph_button_animation', $_POST['morph_button_animation']); 
		}
		
		/* absolute/fixed positioning */
		if ( isset ($_POST['morph_absolute_position'])=='on') { 
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_absolute_position', $display);
		
		/* hide main menu button */
		if ( isset ($_POST['morph_hide_main_menu_button'])=='on') {
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_hide_main_menu_button', $display);
		
		/* hide search */
		if ( isset ($_POST['morph_hide_search'])=='on') { 
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_hide_search', $display);
		
		/* hide secondary menu */
		if ( isset ($_POST['morph_hide_secondary_menu'])=='on') { 
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_hide_secondary_menu', $display);
		
		/* background overlay opacity */
		update_option('bonfire_morph_background_overlay_opacity', sanitize_text_field( $_POST['morph_background_overlay_opacity'] ) );
		
		/* don't load FontAwesome */
		if ( isset ($_POST['morph_fa_no_load'] )=='on') { 
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_fa_no_load', $display);
		
		/* heading text */
		update_option('bonfire_morph_heading_text', sanitize_text_field( $_POST['morph_heading_text'] ) );
		
		/* subheading text */
		update_option('bonfire_morph_subheading_text', sanitize_text_field( $_POST['morph_subheading_text'] ) );

		/* custom heading height */
		update_option('bonfire_morph_heading_height', sanitize_text_field( $_POST['morph_heading_height'] ) );

		/* heading overlay opacity */
		update_option('bonfire_morph_heading_overlay', sanitize_text_field( $_POST['morph_heading_overlay'] ) );

		/* heading image */
		update_option('bonfire_morph_heading_image', sanitize_text_field( $_POST['morph_heading_image'] ) );
		
		/* heading pattern */
		if ( isset ($_POST['morph_heading_image_pattern'])=='on') { 
			$display = 'checked'; 
		} else { 
			$display = ''; 
		}
	    update_option('bonfire_morph_heading_image_pattern', $display);
		
		/* larger than, lower than */
		update_option('bonfire_morph_larger_than', sanitize_text_field( $_POST['morph_larger_than'] ) );
		update_option('bonfire_morph_smaller_than', sanitize_text_field( $_POST['morph_smaller_than'] ) );

	}
	endif;
	add_action('admin_menu', 'bonfire_morph_admin_menu');

	//
	// Add meta tag to theme header (no tap highlighting on Windows devices)
	//
	if( ! function_exists( 'bonfire_morph_meta' ) ) :
	function bonfire_morph_meta() {
	?>
		<meta name="msapplication-tap-highlight" content="no" /> 
	<?php
	}
	endif;
	add_action('wp_head','bonfire_morph_meta');

	//
	// Add menu to theme
	//
	
	if( ! function_exists( 'bonfire_morph_footer' ) ) :
	function bonfire_morph_footer() {
	?>

	<?php
	}
	endif;
	add_action('wp_footer','bonfire_morph_footer');

	//
	// ENQUEUE morph.css
	//
	if( ! function_exists( 'bonfire_morph_css' ) ) :
	function bonfire_morph_css() {
		wp_register_style( 'bonfire-morph-css', get_template_directory_uri() . '/inc/plugins/morph-by-bonfire/morph.css', array(), '1', 'all' );
		wp_enqueue_style( 'bonfire-morph-css' );
	}
	endif; 
	add_action( 'wp_enqueue_scripts', 'bonfire_morph_css' );

	//
	// ENQUEUE morph-accordion.js (only if main menu not disabled)
	//
	if( ! function_exists( 'bonfire_morph_accordion' ) ) :
	function bonfire_morph_accordion() {
		wp_register_script( 'bonfire-morph-accordion', get_template_directory_uri() . '/inc/plugins/morph-by-bonfire/morph-accordion.js', array( 'jquery' ), '1' );  
		wp_enqueue_script( 'bonfire-morph-accordion' );
	}
	endif;
	add_action( 'wp_enqueue_scripts', 'bonfire_morph_accordion' );

	//
	// ENQUEUE morph.js
	//
	if( ! function_exists( 'bonfire_morph_js' ) ) :
	function bonfire_morph_js() {
		wp_register_script( 'bonfire-morph-js', get_template_directory_uri() . '/inc/plugins/morph-by-bonfire/morph.js', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'bonfire-morph-js' );
	}
	endif;
	add_action( 'wp_enqueue_scripts', 'bonfire_morph_js' );
	
	//
	// ENQUEUE search.js
	//
	if( ! function_exists( 'bonfire_morph_search_js' ) ) :
	function bonfire_morph_search_js() {
		wp_register_script( 'bonfire-morph-search-js', get_template_directory_uri() . '/inc/plugins/morph-by-bonfire/search.js' . '', array( 'jquery' ), '1', true );
		wp_enqueue_script( 'bonfire-morph-search-js' );
	}
	endif;
	add_action( 'wp_enqueue_scripts', 'bonfire_morph_search_js' );
	
	//
	// Enqueue font-awesome.min.css (icons for menu, if option to hide not enabled)
	//
	if( ! get_option('bonfire_morph_fa_no_load') ) {
		if( ! function_exists( 'bonfire_morph_fontawesome' ) ) :
		function bonfire_morph_fontawesome() {  
			wp_register_style( 'morph-fontawesome', get_template_directory_uri() . '/inc/plugins/morph-by-bonfire//fonts/font-awesome/css/font-awesome.min.css', array(), '1', 'all' );  
			wp_enqueue_style( 'morph-fontawesome' );
		}
		endif;
		add_action( 'wp_enqueue_scripts', 'bonfire_morph_fontawesome' );
	}

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'morph-by-bonfire' 				=> ( 'Morph plugin (primary)' ),
			'morph-by-bonfire-secondary' 	=> ( 'Morph plugin (secondary)' )
		) );
	}

	///////////////////////////////////////
	// Register Widgets
	///////////////////////////////////////
	if( ! function_exists( 'bonfire_morph_widgets_init' ) ) :
	function bonfire_morph_widgets_init() {
	
		register_sidebar( array(
		'name' => __( 'Morph Widgets', 'bonfire' ),
		'id' => 'morph-main-widgets',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	endif;
	add_action( 'widgets_init', 'bonfire_morph_widgets_init' );

	//
	// Add color options to Appearance > Customize
	//
	add_action( 'customize_register', 'bonfire_morph_customize_register' );
	if( ! function_exists( 'bonfire_morph_customize_register' ) ) :
	function bonfire_morph_customize_register($wp_customize)
	{
		$colors = array();
		/* menu button */
		$colors[] = array( 'slug'=>'bonfire_morph_menu_button_color', 'default' => '', 'label' => __( 'Menu button', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_menu_button_hover_color', 'default' => '', 'label' => __( 'Menu button hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_menu_button_active_color', 'default' => '', 'label' => __( 'Menu button active', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_menu_button_active_hover_color', 'default' => '', 'label' => __( 'Menu button active hover', 'bonfire' ) );
		/* secondary menu button */
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_button_color', 'default' => '', 'label' => __( 'Secondary menu button', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_button_hover_color', 'default' => '', 'label' => __( 'Secondary menu button hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_button_active_color', 'default' => '', 'label' => __( 'Secondary menu button active', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_button_active_hover_color', 'default' => '', 'label' => __( 'Secondary menu button active hover', 'bonfire' ) );
		/* search button */
		$colors[] = array( 'slug'=>'bonfire_morph_search_button_color', 'default' => '', 'label' => __( 'Search button', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_search_button_hover_color', 'default' => '', 'label' => __( 'Search button hover', 'bonfire' ) );
		/* search close button */
		$colors[] = array( 'slug'=>'bonfire_morph_search_close_button_color', 'default' => '', 'label' => __( 'Search close button', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_search_close_button_hover_color', 'default' => '', 'label' => __( 'Search close button hover', 'bonfire' ) );
		/* search field border + text */
		$colors[] = array( 'slug'=>'bonfire_morph_search_border_color', 'default' => '', 'label' => __( 'Search field border', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_search_text_color', 'default' => '', 'label' => __( 'Search field text', 'bonfire' ) );
		/* heading + sub-heading text */
		$colors[] = array( 'slug'=>'bonfire_morph_heading_text_color', 'default' => '', 'label' => __( 'Heading text', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_subheading_text_color', 'default' => '', 'label' => __( 'Sub-heading text', 'bonfire' ) );
		/* heading overlay */
		$colors[] = array( 'slug'=>'bonfire_morph_heading_overlay_color', 'default' => '', 'label' => __( 'Heading overlay', 'bonfire' ) );
		/* background overlay */
		$colors[] = array( 'slug'=>'bonfire_morph_background_overlay_color', 'default' => '', 'label' => __( 'Background overlay', 'bonfire' ) );
		/* main menu */
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_background_color', 'default' => '', 'label' => __( 'Main menu background', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_item_color', 'default' => '', 'label' => __( 'Main menu item', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_item_hover_color', 'default' => '', 'label' => __( 'Main menu item hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_subitem_color', 'default' => '', 'label' => __( 'Main menu sub item', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_subitem_hover_color', 'default' => '', 'label' => __( 'Main menu sub item hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_arrow_color', 'default' => '', 'label' => __( 'Main menu sub-menu arrow', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_arrow_hover_color', 'default' => '', 'label' => __( 'Main menu sub-menu arrow hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_icon_color', 'default' => '', 'label' => __( 'Main menu icon', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_icon_hover_color', 'default' => '', 'label' => __( 'Main menu icon hover', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_main_menu_border_color', 'default' => '', 'label' => __( 'Main menu border color', 'bonfire' ) );
		/* secondary menu */
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_background_color', 'default' => '', 'label' => __( 'Secondary menu background', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_border_color', 'default' => '', 'label' => __( 'Secondary menu border (left, top, right)', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_bottom_border_color', 'default' => '', 'label' => __( 'Secondary menu border (bottom)', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_item_color', 'default' => '', 'label' => __( 'Secondary menu item', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_secondary_menu_item_hover_color', 'default' => '', 'label' => __( 'Secondary menu item hover', 'bonfire' ) );
		/* widgets */
		$colors[] = array( 'slug'=>'bonfire_morph_widget_title_color', 'default' => '', 'label' => __( 'Widget title', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_widget_text_color', 'default' => '', 'label' => __( 'Widget text', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_widget_secondary_text_color', 'default' => '', 'label' => __( 'Widget text secondary (dates, captions)', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_widget_link_color', 'default' => '', 'label' => __( 'Widget link', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_widget_search_border_color', 'default' => '', 'label' => __( 'Widget search field border', 'bonfire' ) );
		$colors[] = array( 'slug'=>'bonfire_morph_widget_search_field_color', 'default' => '', 'label' => __( 'Search field text', 'bonfire' ) );

	foreach($colors as $color)
	{

	/* create custom color customization section */
	$wp_customize->add_section( 'morph_plugin_colors' , array( 'title' => __('Morph Plugin Colors', 'bonfire'), 'priority' => 30 ));
	$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'morph_plugin_colors', 'settings' => $color['slug'] )));
	}
	}
	endif;

	/**
	 * Output css if the variable is not false
	 */
	function bonfire_morph_output_css( $syntax, $value ){
		if( $value ){
			printf( '%s: %s;', $syntax, $value );
		}
	}

	//
	// Insert theme customizer options into the footer
	//
	if( ! function_exists( 'bonfire_morph_header_customize' ) ) :
	function bonfire_morph_header_customize() {
	?>

		<!-- BEGIN CUSTOM COLORS (WP THEME CUSTOMIZER) -->
		<!-- menu button -->
		<?php $bonfire_morph_menu_button_color = get_option('bonfire_morph_menu_button_color', '#f16f50' ); ?>
		<?php $bonfire_morph_menu_button_hover_color = get_option('bonfire_morph_menu_button_hover_color'); ?>
		<?php $bonfire_morph_menu_button_active_color = get_option('bonfire_morph_menu_button_active_color', '#fafafa' ); ?>
		<?php $bonfire_morph_menu_button_active_hover_color = get_option('bonfire_morph_menu_button_active_hover_color'); ?>
		<!-- secondary menu button -->
		<?php $bonfire_morph_secondary_menu_button_color = get_option('bonfire_morph_secondary_menu_button_color'); ?>
		<?php $bonfire_morph_secondary_menu_button_hover_color = get_option('bonfire_morph_secondary_menu_button_hover_color'); ?>
		<?php $bonfire_morph_secondary_menu_button_active_color = get_option('bonfire_morph_secondary_menu_button_active_color'); ?>
		<?php $bonfire_morph_secondary_menu_button_active_hover_color = get_option('bonfire_morph_secondary_menu_button_active_hover_color'); ?>
		<!-- search button -->
		<?php $bonfire_morph_search_button_color = get_option('bonfire_morph_search_button_color'); ?>
		<?php $bonfire_morph_search_button_hover_color = get_option('bonfire_morph_search_button_hover_color'); ?>
		<!-- search close button -->
		<?php $bonfire_morph_search_close_button_color = get_option('bonfire_morph_search_close_button_color'); ?>
		<?php $bonfire_morph_search_close_button_hover_color = get_option('bonfire_morph_search_close_button_hover_color'); ?>
		<!-- search field border + text -->
		<?php $bonfire_morph_search_border_color = get_option('bonfire_morph_search_border_color'); ?>
		<?php $bonfire_morph_search_text_color = get_option('bonfire_morph_search_text_color'); ?>
		<!-- heading + sub-heading text -->
		<?php $bonfire_morph_heading_text_color = get_option('bonfire_morph_heading_text_color'); ?>
		<?php $bonfire_morph_subheading_text_color = get_option('bonfire_morph_subheading_text_color'); ?>
		<!-- heading overlay -->
		<?php $bonfire_morph_heading_overlay_color = get_option('bonfire_morph_heading_overlay_color'); ?>
		<!-- background overlay -->
		<?php $bonfire_morph_background_overlay_color = get_option('bonfire_morph_background_overlay_color'); ?>
		<!-- main menu -->
		<?php $bonfire_morph_main_menu_background_color = get_option('bonfire_morph_main_menu_background_color'); ?>
		<?php $bonfire_morph_main_menu_item_color = get_option('bonfire_morph_main_menu_item_color'); ?>
		<?php $bonfire_morph_main_menu_item_hover_color = get_option('bonfire_morph_main_menu_item_hover_color'); ?>
		<?php $bonfire_morph_main_menu_subitem_color = get_option('bonfire_morph_main_menu_subitem_color'); ?>
		<?php $bonfire_morph_main_menu_subitem_hover_color = get_option('bonfire_morph_main_menu_subitem_hover_color'); ?>
		<?php $bonfire_morph_main_menu_arrow_color = get_option('bonfire_morph_main_menu_arrow_color'); ?>
		<?php $bonfire_morph_main_menu_arrow_hover_color = get_option('bonfire_morph_main_menu_arrow_hover_color'); ?>
		<?php $bonfire_morph_main_menu_icon_color = get_option('bonfire_morph_main_menu_icon_color'); ?>
		<?php $bonfire_morph_main_menu_icon_hover_color = get_option('bonfire_morph_main_menu_icon_hover_color'); ?>
		<?php $bonfire_morph_main_menu_border_color = get_option('bonfire_morph_main_menu_border_color'); ?>
		<!-- secondary menu -->
		<?php $bonfire_morph_secondary_menu_background_color = get_option('bonfire_morph_secondary_menu_background_color'); ?>
		<?php $bonfire_morph_secondary_menu_border_color = get_option('bonfire_morph_secondary_menu_border_color'); ?>
		<?php $bonfire_morph_secondary_menu_bottom_border_color = get_option('bonfire_morph_secondary_menu_bottom_border_color'); ?>
		<?php $bonfire_morph_secondary_menu_item_color = get_option('bonfire_morph_secondary_menu_item_color'); ?>
		<?php $bonfire_morph_secondary_menu_item_hover_color = get_option('bonfire_morph_secondary_menu_item_hover_color'); ?>
		<!-- widgets -->
		<?php $bonfire_morph_widget_title_color = get_option('bonfire_morph_widget_title_color', '#212121' ); ?>
		<?php $bonfire_morph_widget_text_color = get_option('bonfire_morph_widget_text_color', '#616161' ); ?>
		<?php $bonfire_morph_widget_secondary_text_color = get_option('bonfire_morph_widget_secondary_text_color', '#9e9e9e' ); ?>
		<?php $bonfire_morph_widget_link_color = get_option('bonfire_morph_widget_link_color', '#1b39a8' ); ?>
		<?php $bonfire_morph_widget_search_border_color = get_option('bonfire_morph_widget_search_border_color', '#ffffff' ); ?>
		<?php $bonfire_morph_widget_search_field_color = get_option('bonfire_morph_widget_search_field_color', '#1b39a8' ); ?>

<style>
	/**************************************************************
	*** CUSTOM COLORS
	**************************************************************/
	/* widgets */
	.morph-widgets-wrapper .widgettitle { 			
		<?php bonfire_morph_output_css( 'color', $bonfire_morph_widget_title_color ); ?>
	}

	.morph-widgets-wrapper .widget { 
		<?php bonfire_morph_output_css( 'color', $bonfire_morph_widget_text_color );  ?>
	}

	.morph-widgets-wrapper .post-date,
	.morph-widgets-wrapper .rss-date,
	.morph-widgets-wrapper .wp-caption,
	.morph-widgets-wrapper .wp-caption-text { 
		<?php bonfire_morph_output_css( 'color', $bonfire_morph_widget_secondary_text_color ); ?>
	}
	
	.morph-widgets-wrapper .widget a { 
		<?php bonfire_morph_output_css( 'color', $bonfire_morph_widget_link_color ); ?>
	}

	.morph-widgets-wrapper .widget_search input { 
		<?php
			bonfire_morph_output_css( 'color', $bonfire_morph_widget_search_field_color );
			bonfire_morph_output_css( 'border-color', $bonfire_morph_widget_search_border_color );
		?>
	}
	
	/* menu button */
	.morph-main-menu-button:after,
	.morph-main-menu-button:before,
	.morph-main-menu-button div.morph-main-menu-button-middle:before { 
		<?php bonfire_morph_output_css( 'background-color', $bonfire_morph_menu_button_color ); ?>
	}
	
	/* main menu button hover */
	<?php if ( wp_is_mobile() ) { ?>
	<?php } else { ?>
	.morph-main-menu-button:hover:after,
	.morph-main-menu-button:hover:before,
	.morph-main-menu-button:hover div.morph-main-menu-button-middle:before { 
		<?php bonfire_morph_output_css( 'background-color', $bonfire_morph_menu_button_hover_color ); ?>
	}
	<?php } ?>
	/* menu button active */
	.morph-menu-active .morph-main-menu-button:after,
	.morph-menu-active .morph-main-menu-button:before,
	.morph-menu-active .morph-main-menu-button div.morph-main-menu-button-middle:before { 
		<?php bonfire_morph_output_css( 'background-color', $bonfire_morph_menu_button_active_color ); ?>
	}
	/* menu button active hover */
	<?php if ( wp_is_mobile() ) { ?>
	<?php } else { ?>
	.morph-menu-active .morph-main-menu-button:hover:after,
	.morph-menu-active .morph-main-menu-button:hover:before,
	.morph-menu-active .morph-main-menu-button:hover div.morph-main-menu-button-middle:before { 
		<?php bonfire_morph_output_css( 'background-color', $bonfire_morph_menu_button_active_hover_color ); ?>
	}
	.morph-menu-active .morph-main-menu-button:before {
			margin:2px 0 0 0;
			
			transform:translateY(11px) rotate(45deg);
			-moz-transform:translateY(11px) rotate(45deg);
			-ms-transform:translateY(11px) rotate(45deg);
			-webkit-transform:translateY(11px) rotate(45deg);
		}
	<?php } ?>

	/* secondary menu button */
	.morph-secondary-menu-button svg { 
		<?php bonfire_morph_output_css( 'fill', $bonfire_morph_secondary_menu_button_color ); ?>
	}

	/* secondary menu button hover */
	<?php if ( wp_is_mobile() ) { ?>
	<?php } else { ?>
	.morph-secondary-menu-button svg:hover { 
		fill:#A0A0A0; 			
		<?php bonfire_morph_output_css( 'fill', $bonfire_morph_secondary_menu_button_hover_color ); ?>
	}
	<?php } ?>
	/* secondary menu button active */
	.morph-secondary-menu-button-active svg { 
		<?php bonfire_morph_output_css( 'fill', $bonfire_morph_secondary_menu_button_active_color ); ?>
	}
	/* secondary menu button active hover */
	<?php if ( wp_is_mobile() ) { ?>
	<?php } else { ?>
	.morph-secondary-menu-button-active svg:hover { 
		<?php bonfire_morph_output_css( 'fill', $bonfire_morph_secondary_menu_button_active_hover_color ); ?>
	}
	<?php } ?>
	
	/* search button */
	.morph-search-button svg { 
		<?php bonfire_morph_output_css( 'fill', get_option('bonfire_morph_search_button_color', '#fafafa') ); ?>
	}
	
	.morph-search-button:hover svg { 
		<?php bonfire_morph_output_css( 'fill', get_option('bonfire_morph_search_button_hover_color', '#f16f50') ); ?>
	}
	
	/* search close button */
	.morph-search-close-button:before,
	.morph-search-close-button:after { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_search_close_button_color', '#fafafa' ) ); ?>
	}
	
	.morph-search-close-wrapper:hover .morph-search-close-button:before,
	.morph-search-close-wrapper:hover .morph-search-close-button:after { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_search_close_button_hover_color', '#f16f50' ) ); ?>
	}
	
	/* search field border + text */
	.morph-search-wrapper { 
		<?php bonfire_morph_output_css( 'border-color', get_option('bonfire_morph_search_border_color', '#f16f50') ); ?>
	}
	
	.morph-search-wrapper #searchform input { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_search_text_color', '#fafafa' ) ); ?> 
	}
	
	/* heading + sub-heading text */
	.morph-heading-text { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_heading_text_color', '#fafafa' ) ); ?> 			
	}

	.morph-subheading-text { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_subheading_text_color', '#fafafa' ) ); ?> 	
	}
	
	/* heading overlay */
	.morph-heading-overlay { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_heading_overlay_color') ); ?> 
	}
	/* background overlay */
	.morph-background-overlay { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_background_overlay_color') ); ?> 
	}

	/* main menu */
	.morph-main-background { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_main_menu_background_color', '#fafafa') ); ?> 
	}

	.morph-by-bonfire ul li a { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_item_color', '#212121' ) ); ?> 
	}

	.morph-by-bonfire ul li a:hover {
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_item_hover_color', '#f16f50' ) ); ?>
	}

	.morph-by-bonfire ul.sub-menu li a { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_subitem_color') ); ?> 
	}
	
	.morph-by-bonfire ul.sub-menu li a:hover { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_subitem_hover_color') ); ?> 
	}

	.morph-by-bonfire .menu li span svg { 
		<?php bonfire_morph_output_css( 'fill', get_option('bonfire_morph_main_menu_arrow_color') ); ?> 
	}

	<?php if ( wp_is_mobile() ) { ?>
	<?php } else { ?>
	.morph-by-bonfire .menu li span:hover svg { 
		fill:#736F6C; 
		<?php bonfire_morph_output_css( 'fill', get_option('bonfire_morph_main_menu_arrow_hover_color') ); ?> 
	}

	<?php } ?>
	.morph-by-bonfire a i { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_icon_color', '#1b39a8' ) ); ?> 
	}

	.morph-by-bonfire a:hover i { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_main_menu_icon_hover_color', '#1b39a8') ); ?> 
	}

	.morph-by-bonfire ul li.border a { 
		<?php bonfire_morph_output_css( 'border-color', get_option('bonfire_morph_main_menu_border_color') ); ?>
	}
	
	/* secondary menu */
	.morph-secondary-menu-wrapper { 
		<?php 
			bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_secondary_menu_background_color') ); 
			bonfire_morph_output_css( 'border-color', get_option('bonfire_morph_secondary_menu_border_color') ); 
		?>
	}
	
	.morph-secondary-menu-wrapper:after { 
		<?php bonfire_morph_output_css( 'background-color', get_option('bonfire_morph_secondary_menu_bottom_border_color') ); ?>
	}

	.morph-secondary-menu-wrapper a { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_secondary_menu_item_color') ); ?>
	}

	.morph-secondary-menu-wrapper a:hover { 
		<?php bonfire_morph_output_css( 'color', get_option('bonfire_morph_secondary_menu_item_hover_color') ); ?>
	}
	
	/* background overlay opacity */
	.morph-background-overlay-active { 
		<?php bonfire_morph_output_css( 'opacity', get_option('bonfire_morph_background_overlay_opacity') ); ?>
	}

	/* menu button animations (-/X) */
	<?php if(get_option('bonfire_morph_button_animation') == "morphminusanimation") { ?>
		/* middle bar #1 animation (3 lines) */
		.morph-menu-active .morph-main-menu-button div.morph-main-menu-button-middle:before {
			margin:0 0 -1px 0;
		}
		
		/* top bar fade out (3 lines) */
		.morph-menu-active .morph-main-menu-button:before {
			opacity:0;
			
			margin:2px 0 0 0;
			
			transform:translateY(11px) rotate(45deg);
			-moz-transform:translateY(11px) rotate(45deg);
			-ms-transform:translateY(11px) rotate(45deg);
			-webkit-transform:translateY(11px) rotate(45deg);
			
			-webkit-transition:-webkit-transform .25s ease, opacity 0s ease .25s;
			-moz-transition:-moz-transform .25s ease, opacity 0s ease .25s;
			-ms-transition:-ms-transform .25s ease, opacity 0s ease .25s;
			transition:transform .25s ease, opacity 0s ease .25s;
		}
		
		/* bottom bar fade out (3 lines) */
		.morph-menu-active .morph-main-menu-button:after {
			opacity:0;
			
			-webkit-transform:translateY(-3px);
			-moz-transform:translateY(-3px);
			-ms-transform:translateY(-3px);
			transform:translateY(-3px);
			
			-webkit-transition:-webkit-transform .25s ease, opacity 0s ease .25s;
			-moz-transition:-moz-transform .25s ease, opacity 0s ease .25s;
			-ms-transition:-ms-transform .25s ease, opacity 0s ease .25s;
			transition:transform .25s ease, opacity 0s ease .25s;
		}
	<?php } else if(get_option('bonfire_morph_button_animation') == "morphxanimation") { ?>
		/* top bar animation (3 lines) */
		.morph-menu-active .morph-main-menu-button:before {
			margin:2px 0 0 0;
			
			transform:translateY(11px) rotate(45deg);
			-moz-transform:translateY(11px) rotate(45deg);
			-ms-transform:translateY(11px) rotate(45deg);
			-webkit-transform:translateY(11px) rotate(45deg);
		}
		/* bottom bar animation (3 lines) */
		.morph-menu-active .morph-main-menu-button:after {
			margin:-1px 0 0 0;
			
			transform:translateY(-3px) rotate(-45deg);
			-moz-transform:translateY(-3px) rotate(-45deg);
			-ms-transform:translateY(-3px) rotate(-45deg);
			-webkit-transform:translateY(-3px) rotate(-45deg);
		}
		/* middle bar fade out (3 lines) */
		.morph-menu-active div.morph-main-menu-button-middle:before {
			opacity:0;
			
			-webkit-transition:all .15s ease;
			-moz-transition:all .15s ease;
			-ms-transition:all .15s ease;
			transition:all .15s ease;
		}
	<?php } else { ?>
	<?php } ?>

	/* custom heading height */
	.morph-heading-wrapper,
	.morph-heading-overlay,
	.morph-heading-image { 
		<?php 
			$bonfire_morph_heading_height = get_option('bonfire_morph_heading_height', '240' );
			if( $bonfire_morph_heading_height ){
				$bonfire_morph_heading_height .= 'px';
			}
			bonfire_morph_output_css( 'height', $bonfire_morph_heading_height ); 
		?>
	}

	.morph-menu-wrapper { 
		<?php bonfire_morph_output_css( 'top', $bonfire_morph_heading_height ); ?>
	}

	/* heading overlay opacity */
	.morph-heading-overlay { 
		<?php bonfire_morph_output_css( 'opacity', get_option('bonfire_morph_heading_overlay') ); ?>
	}


	/* heading image */
	.morph-heading-image {
		<?php
			$heading_image = get_option('bonfire_morph_heading_image');
			
			if( is_user_logged_in() ):
				global $current_user;

				$cover_image = get_user_meta( $current_user->data->ID, 'cover_image', true );

				if( isset( $cover_image['full'] ) ) :
					$heading_image = $cover_image['full'];
				endif;

			endif;
			
			if( $heading_image )
				printf( 'background-image: url(%s); background-size: cover;', $heading_image );			
		?>
	}


	/* heading image pattern */
	<?php if(get_option('bonfire_morph_heading_image_pattern')) { ?>
	.morph-heading-image {
		background-size:auto;
	}
	<?php } ?>
	
	/* hide morph between resolutions */
	<?php
		$bonfire_morph_smaller_than = get_option( 'bonfire_morph_smaller_than' );	
		$bonfire_morph_larger_than = get_option( 'bonfire_morph_larger_than' );

		if( $bonfire_morph_smaller_than ){
			$bonfire_morph_smaller_than .= 'px';
		}

		if( $bonfire_morph_larger_than ){
			$bonfire_morph_larger_than .= 'px';
		}
	?>

	<?php if( $bonfire_morph_smaller_than && $bonfire_morph_larger_than ) : ?>
	@media ( min-width:<?php echo esc_attr( $bonfire_morph_smaller_than ); ?>) and (max-width:<?php echo esc_attr( $bonfire_morph_larger_than ); ?>) {
		.morph-main-menu-button-wrapper,
		.morph-main-wrapper,
		.morph-main-background,
		.morph-background-overlay { display:none; }
		body { margin-top:0; }
	}
	<?php endif; ?>
</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
	<?php
	}
	endif;
	add_action('wp_footer','bonfire_morph_header_customize');

?>