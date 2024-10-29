<?php
/*
* Add scripts
*/

function bac_scripts()
	{
	wp_enqueue_style('main-style', BEFORE_AFTER_CONTENT_URL . '/includes/css/style.css');
	}

add_action('wp_enqueue_scripts', 'bac_scripts');