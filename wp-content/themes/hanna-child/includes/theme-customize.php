<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Broadcast 1.0
 */

add_action('customize_register', 'zilla_customize_register');
function zilla_customize_register($wp_customize) {

	class Zilla_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea style="width:100%" rows="8" <?php $this->link(); ?>><<?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

	/* General Options --- */
	$wp_customize->add_section(
		'zilla_general_options',
		 array(
				'title' => __( 'General Options', 'zilla' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => __('Control and configure the general setup of your theme. Upload your preferred logo, setup your feeds and insert your analytics tracking code.', 'zilla')
		 )
	);

	$wp_customize->add_setting(
		'zilla_theme_options[general_text_logo]',
		array(
			'default' => '0',
			'sanitize_callback' => 'zilla_sanitize_checkbox'
		)
	);

	$wp_customize->add_control( 'zilla_general_text_logo', array(
		'label' => __( 'Plain Text Logo', 'zilla' ),
		'section' => 'zilla_general_options',
		'settings' => 'zilla_theme_options[general_text_logo]',
		'type' => 'checkbox'
	));

	$wp_customize->add_setting(
		'zilla_theme_options[general_custom_logo]',
		array(
			'default' => get_template_directory_uri() . '/images/logo.png',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'zilla_general_custom_logo',
		array(
			'label' => __( 'Logo Upload', 'zilla' ),
			'section' => 'zilla_general_options',
			'settings' => 'zilla_theme_options[general_custom_logo]'
		)
	));

	$wp_customize->add_setting(
		'zilla_theme_options[general_custom_favicon]',
		 array(
		 	'default' => '',
		 	'sanitize_callback' => 'esc_url_raw'
		 )
	);

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'zilla_general_custom_favicon',
		array(
			'label' => __( 'Favicon Upload (16x16 image file)', 'zilla' ),
			'section' => 'zilla_general_options',
			'settings' => 'zilla_theme_options[general_custom_favicon]'
		)
	));

	$wp_customize->add_setting(
		'zilla_theme_options[general_contact_email]',
		array(
			'type' => 'option',
			'sanitize_callback' => 'zilla_sanitize_text'
		)
	);

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zilla_general_contact_email',
		array(
			'label' => __( 'Contact Form Email Address', 'zilla' ),
			'section' => 'zilla_general_options',
			'settings' => 'zilla_theme_options[general_contact_email]'
		)
	));
	
	$wp_customize->add_setting(
		'zilla_theme_options[general_blog_layout]',
		array( 'default' => 'layout-masonry', 'sanitize_callback' => 'zilla_sanitize_blog_layout' )
	);
	
	$wp_customize->add_control(
		'zilla_general_blog_layout',
		array(
			'label'    => __( 'Blog Layout', 'zilla' ),
			'section'  => 'zilla_general_options',
			'settings' => 'zilla_theme_options[general_blog_layout]',
			'type'     => 'radio',
			'choices'  => array(
				'layout-masonry' => 'Masonry',
				'layout-standard'  => 'Standard'
			),
		)
	);

	/* Style Options --- */
	$wp_customize->add_section(
		'zilla_style_options',
		array(
			'title' => __( 'Style Options', 'zilla' ),
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'description' => __('Give your site a custom coat of paint by updating the style options.', 'zilla')
		)
	);

	$wp_customize->add_setting(
		'zilla_theme_options[style_accent_color]',
		array(
			'default' => '#f2505d',
			'transport' => 'postMessage',
			'sanitize_callback' => 'zilla_sanitize_text'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'zilla_style_accent_color',
		array(
			'label' => __( 'Accent Color', 'zilla' ),
			'section' => 'zilla_style_options',
			'settings' => 'zilla_theme_options[style_accent_color]'
		)
	));

	$wp_customize->add_setting(
		'zilla_theme_options[style_custom_css]',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control( new Zilla_Customize_Textarea_Control(
		$wp_customize,
		'zilla_style_custom_css',
		array(
			'label' => __( 'Custom CSS', 'zilla' ),
			'section' => 'zilla_style_options',
			'settings' => 'zilla_theme_options[style_custom_css]',
			)
		));

	$wp_customize->add_section(
		'zilla_portfolio_options',
		 array(
				'title' => __( 'Portfolio Options', 'zilla' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'description' => __('Custom controls for portfolios.', 'zilla')
		 )
	);

	$wp_customize->add_setting( 'zilla_theme_options[portfolio_show_featured_portfolios_on_home]',
		 array(
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'refresh',
				'sanitize_callback' => 'zilla_sanitize_checkbox'
		 )
	);

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zilla_portfolio_show_featured_portfolios_on_home',
		array(
			'label' => __( 'Show featured portfolios on home page', 'zilla' ),
			'section' => 'zilla_portfolio_options',
			'settings' => 'zilla_theme_options[portfolio_show_featured_portfolios_on_home]',
			'type' => 'checkbox',
			'default' => '1'
		)
	));

	$wp_customize->add_setting( 'zilla_theme_options[portfolio_show_featured_portfolios_on_single_portfolio]',
		 array(
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'refresh',
				'sanitize_callback' => 'zilla_sanitize_checkbox'
		 )
	);

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zilla_portfolio_show_featured_portfolios_on_single_portfolio',
		array(
			'label' => __( 'Show featured portfolios on single portfolio posts', 'zilla' ),
			'section' => 'zilla_portfolio_options',
			'settings' => 'zilla_theme_options[portfolio_show_featured_portfolios_on_single_portfolio]',
			'type' => 'checkbox',
			'default' => '1'
		)
	));

	/* Social Options --- */
	$wp_customize->add_section(
			'zilla_social_options',
			array(
					'title' => __( 'Social Options', 'zilla' ),
					'priority' => 10,
					'capability' => 'edit_theme_options',
					'description' => __('Add info about your social accounts and they will appear in the footer.', 'zilla')
			)
	);

	$wp_customize->add_setting( 'zilla_theme_options[facebook_url]', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'zilla_facebook_url',
			array(
					'label' => __( 'Facebook URL', 'zilla' ),
					'section' => 'zilla_social_options',
					'settings' => 'zilla_theme_options[facebook_url]',
					'priority' => 1
			)
	));

	$wp_customize->add_setting( 'zilla_theme_options[twitter_url]', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'zilla_twitter_url',
			array(
					'label' => __( 'Twitter URL', 'zilla' ),
					'section' => 'zilla_social_options',
					'settings' => 'zilla_theme_options[twitter_url]',
					'priority' => 2
			)
	));

	$wp_customize->add_setting( 'zilla_theme_options[pinterest_url]', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'zilla_pinterest_url',
			array(
					'label' => __( 'Pinterest URL', 'zilla' ),
					'section' => 'zilla_social_options',
					'settings' => 'zilla_theme_options[pinterest_url]',
					'priority' => 6
			)
	));

	$wp_customize->add_setting( 'zilla_theme_options[instagram_url]', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'zilla_instagram_url',
			array(
					'label' => __( 'Instagram URL', 'zilla' ),
					'section' => 'zilla_social_options',
					'settings' => 'zilla_theme_options[instagram_url]',
					'priority' => 6
			)
	));

	$wp_customize->add_setting( 'zilla_theme_options[linkedin_url]', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'zilla_linkedin_url',
			array(
					'label' => __( 'LinkedIn URL', 'zilla' ),
					'section' => 'zilla_social_options',
					'settings' => 'zilla_theme_options[linkedin_url]',
					'priority' => 6
			)
	));

	if( $wp_customize->is_preview() && ! is_admin() )
		add_action('wp_footer', 'zilla_live_preview', 21);
}

/**
* This outputs the javascript needed to automate the live settings preview.
*
*/
function zilla_live_preview() {
	?>
		<script type="text/javascript">
		( function( $ ) {

			wp.customize( 'zilla_theme_options[general_custom_logo]', function( value ) {
				value.bind( function( newval ) {
					$('#logo img').attr('src', newval);
				});
			});

			wp.customize( 'zilla_theme_options[style_accent_color]', function( value ) {
				value.bind( function( newval ) {
					$('#content a').css('color', newval );
				} );
			} );

		} )( jQuery );
	</script>
	<?php
}

/**
* This will output the custom WordPress settings to the live theme's WP head.
*
*/
function header_output() {

	$theme_options = get_theme_mod('zilla_theme_options');

	// No mods; no output
	if( empty($theme_options) )
		return;

	/* Output the favicon */
	if( !empty($theme_options) && array_key_exists( 'general_custom_favicon', $theme_options ) && $theme_options['general_custom_favicon'] != '' ) {
		echo '<link rel="shortcut icon" href="'. $theme_options['general_custom_favicon'] .'" />' . "\n";
	}

	if( array_key_exists( 'style_custom_css', $theme_options ) && $theme_options['style_custom_css'] != '' ) {
	  echo '<!-- Custom CSS-->' . "\n" . '<style type="text/css">' . "\n\t" . $theme_options['style_custom_css'] . "\n" . '</style>' . "\n<!--/Custom CSS-->\n";
	}

	if( array_key_exists( 'style_accent_color', $theme_options ) && $theme_options['style_accent_color'] != '' && $theme_options['style_accent_color'] != '#f2505d' ) {
	  $bg_color = array('button:hover','html input[type="button"]:hover','input[type="reset"]:hover','input[type="submit"]:hover','.the-link','.portfolio-type-nav .active');
	  $bdr_color = array('button','html input[type="submit"]','input[type="reset"]','input[type="submit"]','.entry-footer .entry-tags a:active','.portfolio-type-nav a:hover','.portfolio-type-nav .active','.single-portfolio .portfolio-types a:hover');
	  $color = array('button','html input[type="submit"]','input[type="reset"]','input[type="submit"]','a','a:visited','.entry-footer .entry-tags a:hover','.portfolio-type-nav a:hover','.single-portfolio .portfolio-types a:hover');
	  $bg_color_darken = array('button:focus','html input[type="button"]:focus','input[type="reset"]:focus','input[type="submit"]:focus','button:active','html input[type="button"]:active','input[type="reset"]:active','input[type="submit"]:active');
	  $bdr_color_darken = array('button:focus','html input[type="button"]:focus','input[type="reset"]:focus','input[type="submit"]:focus','button:active','html input[type="button"]:active','input[type="reset"]:active','input[type="submit"]:active');
	  $color_darken = array('a:hover','a:focus','a:active','.entry-title a:hover');
	  echo "<!-- Custom Accent Color -->\n<style type='text/css'>\n";
	    foreach($bg_color as $bgc) {
	      generate_css($bgc, 'background-color', 'style_accent_color');
	    }
	    foreach($bdr_color as $bdrc) {
	      generate_css($bdrc, 'border-color', 'style_accent_color');
	    }
	    foreach($color as $c) {
	      generate_css($c, 'color', 'style_accent_color');
	    }
	    foreach( $bg_color_darken as $darken ) {
	      echo "\n$darken { background: " . hanna_adjust_brightness($theme_options['style_accent_color'],-25) . "; }\n";
	    }
	    foreach( $bdr_color_darken as $darken ) {
	      echo "\n$darken { border-color: " . hanna_adjust_brightness($theme_options['style_accent_color'],-25) . "; }\n";
	    }
	    foreach( $color_darken as $darken ) {
	      echo "\n$darken { color: " . hanna_adjust_brightness($theme_options['style_accent_color'],-25) . "; }\n";
	    }
	    generate_css('.site-footer .social a:hover svg path', 'fill', 'style_accent_color');
	  echo "</style>\n<!-- /Custom Accent Color -->\n";
	}
}

/**
 * This will generate a line of CSS for use in header output. If the setting
 * ($mod_name) has no defined value, the CSS will not be output.
 *
 * @uses get_theme_mod()
 * @param string $selector CSS selector
 * @param string $style The name of the CSS *property* to modify
 * @param string $mod_name The name of the 'theme_mod' option to fetch
 * @param string $prefix Optional. Anything that needs to be output before the CSS property
 * @param string $postfix Optional. Anything that needs to be output after the CSS property
 * @param bool $echo Optional. Whether to print directly to the page (default: true).
 * @return string Returns a single line of CSS with selectors and a property.
 * @since MyTheme 1.0
 */
function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
	$return = '';
	$mods = get_theme_mod('zilla_theme_options');
	$mod = $mods[$mod_name];
	if ( ! empty( $mod ) ) {
		 $return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix
		 );
		 if ( $echo ) {
				echo $return;
		 }
	}
	return $return;
}
// Output custom CSS to live site
add_action( 'wp_head' , 'header_output' );

function hanna_adjust_brightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}


//Sanitization
function zilla_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function zilla_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function zilla_sanitize_blog_layout( $input ) {
	$valid = array(
        'layout-masonry' => 'Masonry',
        'layout-standard'  => 'Standard'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}