<?php

/*
 * Plugin Name: Recipe
 * Description: A WordPress plugin to allow users to create recipes and rate them
 * Version: 1.0
 * Author: Jadeye
 * Author URI: https://nwg.co.il
 * Text Domain: recipe
 */

if ( !function_exists( 'add_action')){
	die( "Hi there! I'm just a plugin, not much I can do when called directly.");
}

//define( 'RECIPE_PLUGIN_FOLDER', __FILE__);

// Setup
define( 'RECIPE_PLUGIN_URL', __FILE__);


// Include
include( 'includes/activate.php');
include( 'includes/init.php');
include( 'includes/admin/init.php');
include( 'process/save-post.php');
include( 'process/filter-content.php');
include( 'includes/front/enqueue.php');
include( 'process/rate-recipe.php');
include( dirname( RECIPE_PLUGIN_URL ) . '/includes/widgets.php');
include( 'includes/widgets/daily-recipe.php');
include( 'includes/cron.php');
include( 'includes/deactivate.php');
include( 'includes/shortcodes/creator.php');
include( 'process/submit-user-recipe.php');
include( 'includes/admin/dashboard-widgets.php');

// Hooks
register_activation_hook(__FILE__, 'r_activate_plugin');
register_deactivation_hook( __FILE__, 'r_deactivate_plugin');
add_action( 'init', 'recipe_init');
add_action( 'admin_init', 'recipe_admin_init');
add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter( 'the_content', 'r_filter_recipe_content');
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 100);
add_action( 'wp_ajax_r_rate_recipe', 'r_rate_recipe');
add_action( 'wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe');
add_action( 'widgets_init', 'r_widgets_init');
add_action( 'r_daily_recipe_hook', 'r_generate_daily_recipe');
add_action( 'wp_ajax_r_submit_user_recipe', 'r_submit_user_recipe');
add_action( 'wp_ajax_nopriv_r_submit_user_recipe', 'r_submit_user_recipe');
add_action( 'wp_dashboard_setup', 'r_add_dashboard_widgets');


// Shortcodes
add_shortcode( 'recipe_creator', 'r_recipe_creator_shortcode');