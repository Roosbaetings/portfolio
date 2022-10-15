<?php

/**
 * Check if Timber is activated
 */

if ( ! class_exists( 'Timber' ) ) {

	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	} );
	
	return;

}

/**
 * Timber
 */

if ( class_exists ( 'TimberSite' ) ) {

	class CustomSite extends TimberSite {
		function __construct() {
			add_filter( 'timber_context', array( $this, 'add_to_context' ) );
			parent::__construct();
		}
		function add_to_context( $context ) {

			/* Menu */
			$context['menu'] = new TimberMenu('primary_navigation');
			$context['footer_menu'] = new TimberMenu('footer_menu');
			$context['primary_menu'] = new TimberMenu('primary_menu');

			/* Site info */
			$context['site'] = $this;

			/* Site info */
			$context['options'] = get_fields('options');
			
			return $context;

		}
	}

	new CustomSite();
}