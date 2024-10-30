<?php 
/**
* Plugin Name: Codeprey - Mi Post Order
* Plugin URI: http://codeprey.com/
* Description: Option to change post order on category page.
* Version: 1.0
* Author: Codeprey team
* Text Domain: http://codeprey.com
**/

include_once( 'class-mipostorder-widget.php' );
/**
* Register Widget
*/
function mipostorder_register_widgets() {
	register_widget( 'MiPostOrderWidget' );
}
add_action( 'widgets_init', 'mipostorder_register_widgets' );
/**
* To change post order
**/
add_filter( 'pre_get_posts', 'mipostorder_change_post_order' );
function mipostorder_change_post_order( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_category()) {
		if(isset($_GET['order'])):
			$query->set( 'order', $_GET['order'] );
		endif;
	}
}

