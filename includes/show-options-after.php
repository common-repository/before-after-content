<?php
/*
* This file is for processing the data of the options file
*/

// If this file is called directly, abort.
if (!defined('WPINC'))
	{
	die;
	}

add_action('wp', 'BAC_Options_Controll');

function BAC_Options_Controll()
	{

	// Get the instance

	$titan = TitanFramework::getInstance('bac-plugin');

	// Making all the variable global so they are accessable from another function

	GLOBAL $enableAfterContent;
	GLOBAL $getAfterContent;
	GLOBAL $getAfterContentImg;
	GLOBAL $showAfterContent;
	GLOBAL $showAfterContentShadow;
	GLOBAL $showAfterContentlink;
	GLOBAL $showAfterContentImgSize;
	$enableAfterContent = $titan->getOption('bac_enable_after_content');
	$getAfterContent = $titan->getOption('bac_after_content');
	$getAfterContentImg = $titan->getOption('bac_after_image');
	$showAfterContent = $titan->getOption('bac_where_to_show_after');
	$showAfterContentShadow = $titan->getOption('bac_enable_after_content_box_shadow');
	$showAfterContentlink = $titan->getOption('bac_enable_after_content_img_link');
	$showAfterContentImgSize = $titan->getOption('bac_after_single_img_size');
	if ($enableAfterContent == true)
		{
		function bac_after_content($content)
			{
			GLOBAL $getAfterContent;
			GLOBAL $getAfterContentImg;
			GLOBAL $showAfterContent;
			GLOBAL $showAfterContentShadow;
			GLOBAL $showAfterContentlink;
			GLOBAL $showAfterContentImgSize;
			if ($showAfterContentShadow == 1)
				{
				$effect = '_bac_effect1';
				}

			if ($showAfterContentlink == NULL)
				{
				$deactive = '_bac_active';
				}

			if ($getAfterContent) $boxContent = "<div class='_bac_box $effect'>" . $getAfterContent . "</div>";
			$contentImage = "<div class='_bac_after_img'><a href='$showAfterContentlink' class='$deactive' target='_blank'> " . wp_get_attachment_image($getAfterContentImg, $showAfterContentImgSize) . " </a></div>";
			$boxContent.= $contentImage;
			if ($showAfterContent == 'af_blog' && is_single())
				{
				$content.= $boxContent;
				}
			  else
			if ($showAfterContent == 'af_page' && is_page())
				{
				$content.= $boxContentabc;
				}
			  else
			if ($showAfterContent == 'af_both' && !is_front_page() && (is_page() || is_single()))
				{
				$content.= $boxContent;
				}

			return $content;
			}

		add_filter('the_content', 'bac_after_content');
		}

	// getting dynamic styles

	GLOBAL $showAfterContentboxbg;
	GLOBAL $showAfterContentColor;
	GLOBAL $showAfterContentImgAlign;
	GLOBAL $showAfterContentBoxPad;
	GLOBAL $showAfterContentBoxWidth;
	$showAfterContentboxbg = $titan->getOption('bac_enable_after_content_box_bgcolor');
	$showAfterContentColor = $titan->getOption('bac_enable_after_content_box_concolor');
	$showAfterContentImgAlign = $titan->getOption('bac_after_single_img_align');
	$showAfterContentBoxPad = $titan->getOption('bac_after_single_box_pad');
	$showAfterContentBoxWidth = $titan->getOption('bac_after_single_box_width');
	add_action('wp_head', 'hook_css_after');
	function hook_css_after()
		{
		GLOBAL $showAfterContentboxbg;
		GLOBAL $showAfterContentColor;
		GLOBAL $showAfterContentImgAlign;
		GLOBAL $showAfterContentBoxPad;
		GLOBAL $showAfterContentBoxWidth;
		$output = "<style> ._bac_box { background-color : $showAfterContentboxbg !important; color:$showAfterContentColor; padding:$showAfterContentBoxPad !important; width: $showAfterContentBoxWidth !important;} ._bac_after_img img { float:$showAfterContentImgAlign }</style>";
		echo $output;
		}
	}
