<?php
/*
* This file is for processing the data of the options file before content
*/

// If this file is called directly, abort.
if (!defined('WPINC'))
	{
	die;
	}

        
add_action('wp', 'BAC_Before_Options_Controll');

function BAC_Before_Options_Controll()
	{

	// Get the instance

	$titan = TitanFramework::getInstance('bac-plugin');

	// Making all the variable global so they are accessable from another function

	GLOBAL $enableBeforeContent;
	GLOBAL $getBeforeContent;
	GLOBAL $getBeforeContentImg;
	GLOBAL $showBeforeContent;
	GLOBAL $showBeforeContentShadow;
	GLOBAL $showBeforeContentlink;
	GLOBAL $showBeforeContentImgSize;
	$enableBeforeContent = $titan->getOption('bac_enable_before_content');
	$getBeforeContent = $titan->getOption('bac_before_content');
	$getBeforeContentImg = $titan->getOption('bac_before_image');
	$showBeforeContent = $titan->getOption('bac_where_to_show_before');
	$showBeforeContentShadow = $titan->getOption('bac_enable_before_content_box_shadow');
	$showBeforeContentlink = $titan->getOption('bac_enable_before_content_img_link');
	$showBeforeContentImgSize = $titan->getOption('bac_before_single_img_size');
	if ($enableBeforeContent == true)
		{
		function bac_before_content($content)
			{
			GLOBAL $getBeforeContent;
			GLOBAL $getBeforeContentImg;
			GLOBAL $showBeforeContent;
			GLOBAL $showBeforeContentShadow;
			GLOBAL $showBeforeContentlink;
			GLOBAL $showBeforeContentImgSize;
			if ($showBeforeContentShadow == 1)
				{
				$effect = '_bac_effect1_a';
				}

			if ($showBeforeContentlink == NULL)
				{
				$deactive = '_bac_active_a';
				}

			if ($showBeforeContent == 'bf_blog' && is_single() && !is_front_page())
				{
				if ($getBeforeContent) $boxContent = "<div class='_bac_box_a $effect'>" . $getBeforeContent . "</div>";
				$contentImage = "<div class='_bac_after_img_a'><a href='$showBeforeContentlink' class='$deactive' target='_blank'> " . wp_get_attachment_image($getBeforeContentImg, $showBeforeContentImgSize) . " </a></div>";
				$boxContent.= $contentImage;
				$boxContent.= $content;
				}
			  else
			if ($showBeforeContent == 'bf_page' && is_page() && !is_front_page())
				{
				if ($getBeforeContent) $boxContent = "<div class='_bac_box_a $effect'>" . $getBeforeContent . "</div>";
				$contentImage = "<div class='_bac_after_img_a'><a href='$showBeforeContentlink' class='$deactive' target='_blank'> " . wp_get_attachment_image($getBeforeContentImg, $showBeforeContentImgSize) . " </a></div>";
				$boxContent.= $contentImage;
				$boxContent.= $content;
				}
			  else
			if ($showBeforeContent == 'bf_both' && !is_front_page() && (is_page() || is_single()))
				{
				if ($getBeforeContent) $boxContent = "<div class='_bac_box_a $effect'>" . $getBeforeContent . "</div>";
				$contentImage = "<div class='_bac_after_img_a'><a href='$showBeforeContentlink' class='$deactive' target='_blank'> " . wp_get_attachment_image($getBeforeContentImg, $showBeforeContentImgSize) . " </a></div>";
				$boxContent.= $contentImage;
				$boxContent.= $content;
				}
			  else
				{
				$boxContent.= $content;
				}

			return $boxContent;
			}

		add_filter('the_content', 'bac_before_content');
		}

	// getting dynamic styles

	GLOBAL $showbeforeContentboxbg;
	GLOBAL $showbeforeContentColor;
	GLOBAL $showbeforeContentImgAlign;
	GLOBAL $showbeforeContentBoxPad;
	GLOBAL $showbeforeContentBoxWidth;
	$showbeforeContentboxbg = $titan->getOption('bac_enable_before_content_box_bgcolor');
	$showbeforeContentColor = $titan->getOption('bac_enable_before_content_box_concolor');
	$showbeforeContentImgAlign = $titan->getOption('bac_before_single_img_align');
	$showbeforeContentBoxPad = $titan->getOption('bac_before_single_box_pad');
	$showbeforeContentBoxWidth = $titan->getOption('bac_before_single_box_width');
	add_action('wp_head', 'bac_before_hook_css');
	function bac_before_hook_css()
		{
		GLOBAL $showbeforeContentboxbg;
		GLOBAL $showbeforeContentColor;
		GLOBAL $showbeforeContentImgAlign;
		GLOBAL $showbeforeContentBoxPad;
		GLOBAL $showbeforeContentBoxWidth;
		$output = "<style> ._bac_box_a { background-color : $showbeforeContentboxbg !important; color:$showbeforeContentColor; padding:$showbeforeContentBoxPad !important; width: $showbeforeContentBoxWidth !important; } ._bac_after_img_a img { float:$showbeforeContentImgAlign }</style>";
		echo $output;
		}
	}
