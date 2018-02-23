<?php

function r_recipe_creator_shortcode(){
	$creatorHTML                    =   file_get_contents(
		'creator-template.php',
		TRUE
	);

	$editorHTML                     = r_generate_content_editor();
	// wp_die("START " . $editorHTML);
	$creatorHTML                    =   str_replace(
		'CONTENT_EDITOR',
		$editorHTML,
		$creatorHTML
	);

	return $creatorHTML;
}

function r_generate_content_editor(){
	ob_start();
	wp_editor( '', 'recipecontenteditor' );
	$editor_contents                = ob_get_contents();
	ob_get_clean();
	return $editor_contents;
}