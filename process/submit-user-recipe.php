<?php

function r_submit_user_recipe(){
	$output                         =   [ 'status' => 1 ];

	if( empty($_POST['ingredients']) || empty($_POST['time']) ||
		empty( $_POST['utensils']) || empty( $_POST['level']) ||
		empty( $_POST['meal_type'] || empty( $_POST['title']))) {
		wp_send_json($output);
	}

	$title                          =   sanitize_text_field( $_POST['title']);
	$content                        =   wp_kses_post( $_POST['content']);
	// wp_die($content, "OPS");
	$recipe_data                    =   [];
	$recipe_data['ingredients']     =   sanitize_text_field( $_POST['ingredients']);
	$recipe_data['time']            =   sanitize_text_field( $_POST['time']);
	$recipe_data['utensils']        =   sanitize_text_field( $_POST['utensils']);
	$recipe_data['level']           =   sanitize_text_field( $_POST['level']);
	$recipe_data['meal_type']       =   sanitize_text_field( $_POST['meal_type']);
	$recipe_data['rating']          =   0;
	$recipe_data['rating_count']    =   0;

	$post_id                        = wp_insert_post([
		'post_content'              =>  $content,
		'post_name'                 =>  $title,
		'post_title'                =>  $title,
		'post_status'               =>  'pending',
		'post_type'                 =>  'recipe',
		'comment_status'            =>  'open'
	]);

	update_post_meta( $post_id, 'recipe_data', $recipe_data );

	$output['status']               =   2;
	wp_send_json( $output );

};