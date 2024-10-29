<?php
/*
* Control Panel for this plugin
*/
add_action('tf_create_options', 'before_after_plugin_option');

function before_after_plugin_option()
	{

	// Initialize Titan with my special unique namespace

	$titan = TitanFramework::getInstance('bac-plugin');

	// Create bac control panel

	$panel = $titan->createAdminPanel(array(
		'name' => __('B/A Content','before-after-content'),
		'title' => __('Before After','before-after-content'),
		'desc' => __('Control all the elements of Before After Content plugin from here. Remember you can activate and deactivate anything from here.','before-after-content'),
		'icon' => 'dashicons-align-center'
	));

	// After Content Tab

	$afterContentTab = $panel->createTab(array(
		'name' => __('After Content','before-after-content'),
	));

	// Create options for After Content

	$afterContentTab->createOption(array(
		'name' => __('Enable after content','before-after-content'),
		'id' => 'bac_enable_after_content',
		'type' => 'checkbox',
		'desc' => __('Select if you want to enable after content section','before-after-content'),
		'default' => false,
	));
	$afterContentTab->createOption(array(
		'name' => __('Your Content','before-after-content'),
		'id' => 'bac_after_content',
		'type' => 'editor',
		'desc' => __('Remember it will show after content. Be careful about size if you want to use image.','before-after-content'),
	));
	$afterContentTab->createOption(array(
		'name' => __('Your Image','before-after-content'),
		'id' => 'bac_after_image',
		'type' => 'upload',
		'desc' => __('Remember the image will be shown after content. If you want to use only image, leave the content area blank above. If you use both content and image area, it will show one after another.','before-after-content')
	));
	$afterContentTab->createOption(array(
		'name' => __('Where to show?','before-after-content'),
		'id' => 'bac_where_to_show_after',
		'type' => 'radio',
		'desc' => __('This will help you to controll the page template you want to show this content.','before-after-content'),
		'options' => array(
			'af_blog' => __('After single blog content','before-after-content'),
			'af_page' => __('After page content','before-after-content'),
			'af_both' => __('Both','before-after-content'),
		) ,
		'default' => '3',
	));

	// After Content Style

	$afterContentStyle = $panel->createTab(array(
		'name' => __('After Content Styles','before-after-content'),
	));
	$afterContentStyle->createOption(array(
		'name' => __('Enable box shadow for content area?','before-after-content'),
		'id' => 'bac_enable_after_content_box_shadow',
		'type' => 'checkbox',
		'desc' => __('This will show your content inside a box with shadow','before-after-content'),
		'default' => false,
	));
	$afterContentStyle->createOption(array(
		'name' => __('Box background Color','before-after-content'),
		'id' => 'bac_enable_after_content_box_bgcolor',
		'type' => 'color',
		'desc' => __('Pick a color','before-after-content'),
		'default' => '#fff',
	));
	$afterContentStyle->createOption(array(
		'name' => __('Box Content Color','before-after-content'),
		'id' => 'bac_enable_after_content_box_concolor',
		'type' => 'color',
		'desc' => __('Pick a color','before-after-content'),
		'default' => '#000000',
	));
	$afterContentStyle->createOption(array(
		'name' => __('Enable image link?','before-after-content'),
		'id' => 'bac_enable_after_content_img_link',
		'type' => 'text',
		'desc' => __('Put including http:// . Example http://example.com ','before-after-content'),
	));
	$afterContentStyle->createOption(array(
		'name' => __('Single image size','before-after-content'),
		'id' => 'bac_after_single_img_size',
		'type' => 'select',
		'desc' => __('This will help you to controll the image size if you are just trying to show image or add.','before-after-content'),
		'options' => array(
			'thumbnail' => __('Thumbnail (150×150)','before-after-content'),
			'medium' => __('Medium (300×300)','before-after-content'),
			'large' => __('Large (1024×1024)','before-after-content'),
			'full' => __('Full Size (Whatever the image dimensions are)','before-after-content'),
		) ,
		'default' => 'full',
	));
	$afterContentStyle->createOption(array(
		'name' => __('Single image align','before-after-content'),
		'id' => 'bac_after_single_img_align',
		'type' => 'select',
		'desc' => __('You can alighn the image if its not full width','before-after-content'),
		'options' => array(
			'right' => __('Right','before-after-content'),
			'left' => __('Left','before-after-content'),
			'none' => __('Center','before-after-content'),
		) ,
		'default' => 'none',
	));
	$afterContentStyle->createOption(array(
		'name' => __('Box Padding','before-after-content'),
		'id' => 'bac_after_single_box_pad',
		'type' => 'text',
		'desc' => __('Remember: Don\'t forget to put px. Best result will be shown on px. Careful about %','before-after-content'),
		'default' => '30px',
	));
	$afterContentStyle->createOption(array(
		'name' => __('Box Width','before-after-content'),
		'id' => 'bac_after_single_box_width',
		'type' => 'text',
		'desc' => __('Remember: Don\'t forget to put %. Best result will be shown on %. Careful about px. It may hamper the responsiveness.','before-after-content'),
		'default' => '90%',
	));

	// Before Content Tab

	$beforeContentTab = $panel->createTab(array(
		'name' => __('Before Content','before-after-content'),
	));

	// Create options for Before Content

	$beforeContentTab->createOption(array(
		'name' => __('Enable before content','before-after-content'),
		'id' => 'bac_enable_before_content',
		'type' => 'checkbox',
		'desc' => __('Select if you want to enable before content section','before-after-content'),
		'default' => false,
	));
	$beforeContentTab->createOption(array(
		'name' => __('Your Content','before-after-content'),
		'id' => 'bac_before_content',
		'type' => 'editor',
		'desc' => __('Remember it will show before content means after page title. Be careful about size if you want to use image.','before-after-content')
	));
	$beforeContentTab->createOption(array(
		'name' => __('Your Image','before-after-content'),
		'id' => 'bac_before_image',
		'type' => 'upload',
		'desc' => __('Remember the image will be shown before the content & after the main page title. If you want to use only image, leave the content area blank above. If you use both content and image area, it will show one after another.','before-after-content')
	));
	$beforeContentTab->createOption(array(
		'name' => __('Where to show?','before-after-content'),
		'id' => 'bac_where_to_show_before',
		'type' => 'radio',
		'desc' => __('This will help you to controll the page template you want to show this content.','before-after-content'),
		'options' => array(
			'bf_blog' => __('Before single blog content','before-after-content'),
			'bf_page' => __('Before page content','before-after-content'),
			'bf_both' => __('Both','before-after-content'),
		) ,
		'default' => '3',
	));

	// Before Content Style

	$beforeContentStyle = $panel->createTab(array(
		'name' => __('Before Content Styles','before-after-content'),
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Enable box shadow for content area?','before-after-content'),
		'id' => 'bac_enable_before_content_box_shadow',
		'type' => 'checkbox',
		'desc' => __('This will show your content inside a box with shadow','before-after-content'),
		'default' => false,
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Box background Color','before-after-content'),
		'id' => 'bac_enable_before_content_box_bgcolor',
		'type' => 'color',
		'desc' => __('Pick a color','before-after-content'),
		'default' => '#fff',
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Box Content Color','before-after-content'),
		'id' => 'bac_enable_before_content_box_concolor',
		'type' => 'color',
		'desc' => __('Pick a color','before-after-content'),
		'default' => '#000000',
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Enable image link?','before-after-content'),
		'id' => 'bac_enable_before_content_img_link',
		'type' => 'text',
		'desc' => __('Put including http:// . Example http://example.com ','before-after-content'),
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Single image size','before-after-content'),
		'id' => 'bac_before_single_img_size',
		'type' => 'select',
		'desc' => __('This will help you to controll the image size if you are just trying to show image or add.','before-after-content'),
		'options' => array(
			'thumbnail' => __('Thumbnail (150×150)','before-after-content'),
			'medium' => __('Medium (300×300)','before-after-content'),
			'large' => __('Large (1024×1024)','before-after-content'),
			'full' => __('Full Size (Whatever the image dimensions are)','before-after-content'),
		) ,
		'default' => 'full',
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Single image align','before-after-content'),
		'id' => 'bac_before_single_img_align',
		'type' => 'select',
		'desc' => __('You can alighn the image if its not full width','before-after-content'),
		'options' => array(
			'right' => __('Right','before-after-content'),
			'left' => __('Left','before-after-content'),
			'none' => __('Center','before-after-content'),
		) ,
		'default' => 'none',
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Box Padding','before-after-content'),
		'id' => 'bac_before_single_box_pad',
		'type' => 'text',
		'desc' => __('Remember: Don\'t forget to put px. Best result will be shown on px. Careful about %','before-after-content'),
		'default' => '30px',
	));
	$beforeContentStyle->createOption(array(
		'name' => __('Box Width','before-after-content'),
		'id' => 'bac_before_single_box_width',
		'type' => 'text',
		'desc' => __('Remember: Don\'t forget to put %. Best result will be shown on %. Careful about px. It may hamper the responsiveness.','before-after-content'),
		'default' => '90%',
	));
	$panel->createOption(array(
		'type' => 'save'
	));
	}

