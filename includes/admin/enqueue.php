<?php

function r_admin_enqueue() {
	global $typenow;

	if ($typenow != 'recipe') {
		return;
	};

	wp_register_style(
		'ju_bootstrap',
		plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL)
	);

	wp_enqueue_style( 'ju_bootstrap' );
}