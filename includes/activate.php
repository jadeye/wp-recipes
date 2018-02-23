<?php

function r_activate_plugin(){
	if( version_compare( get_bloginfo( 'version'), '4.5', '<' )){
		wp_die( __( 'You must update WordPress to use this plugin', 'recipe'));
	} else {
		add_action( 'admin_notices', 'sample_admin_notice__success' );
	}

	global $wpdb;

	$createSQL              =   "
        CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "recipe_ratings` (
          `ID` bigint(20) NOT NULL AUTO_INCREMENT,
          `recipe_id` bigint(20) NOT NULL,
          `rating` float(3,2) NOT NULL,
          `user_ip` varchar(32) NOT NULL,
          PRIMARY KEY (`ID`),
          UNIQUE KEY `recipe_id` (`recipe_id`,`rating`)
        ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1 ;";

	require_once ( ABSPATH . '/wp-admin/includes/upgrade.php');
	dbDelta( $createSQL );

	wp_schedule_event(
        time(),
        'daily',
        'r_daily_recipe_hook'
    );
}

function sample_admin_notice__success() {
	?>
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Done!', 'sample-text-domain' ); ?></p>
	</div>
	<?php
}
