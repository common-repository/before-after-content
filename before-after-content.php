<?php
/**
 * Plugin Name:       Before After Content
 * Plugin URI:        http://imtiazshamim.com
 * Description:       This plugin is for quickly adding text or image before or after content. You can select if it will work only for blog or only for pages or both. It will not work for shop page or portfolio or other custom post type.
 * Version:           2.0
 * Author:            Shamim Imtiaz
 * Author URI:        http://imtiazshamim.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       before-after-content
 * Domain Path:       /languages
 */

// If this file is called directly, abort.

if (!defined('WPINC'))
	{
	die;
	}

if (!class_exists('BEFORE_AFTER_CONTENT'))
	{
	class BEFORE_AFTER_CONTENT

		{
		var $plugin_version = '1.1.0';
		var $plugin_url;
		var $plugin_path;
		function __construct()
			{
			define('BEFORE_AFTER_CONTENT_VERSION', $this->plugin_version);
			define('BEFORE_AFTER_CONTENT_SITE_URL', site_url());
			define('BEFORE_AFTER_CONTENT_URL', $this->plugin_url());
			define('BEFORE_AFTER_CONTENT_PATH', $this->plugin_path());
			}

		function plugin_url()
			{
			if ($this->plugin_url) return $this->plugin_url;
			return $this->plugin_url = plugins_url(basename(plugin_dir_path(__FILE__)) , basename(__FILE__));
			}

		function plugin_path()
			{
			if ($this->plugin_path) return $this->plugin_path;
			return $this->plugin_path = untrailingslashit(plugin_dir_path(__FILE__));
			}

		function is_valid_page()
			{
			return in_array($GLOBALS['pagenow'], array(
				'wp-login.php',
				'wp-register.php'
			));
			}
		}

	$GLOBALS['before_after_content'] = new BEFORE_AFTER_CONTENT();
	}

// error message if Titan framework is not found

function BAC_TitanFrameworkRequired()
	{
	$url = network_admin_url('plugin-install.php?tab=search&s=Titan+Framework');
	e_('
    <div class="error">
        <p>The <a href="' . $url . '">Titan Framework</a> is required for managing the before after content plugin.</p>
    </div>
    ','before-after-content');
	}

// load the required files if titan framework is found

function BAC_check_required_plugins()
	{
	if (current_user_can('activate_plugins'))
		{
		include_once (ABSPATH . 'wp-admin/includes/plugin.php');

		if (!class_exists('TitanFrameworkPlugin'))
			{
			add_action('admin_notices', 'BAC_TitanFrameworkRequired');
			}
		  else
			{
			require_once dirname(__FILE__) . '/includes/options.php';

			require_once dirname(__FILE__) . '/includes/show-options-after.php';

			require_once dirname(__FILE__) . '/includes/show-options-before.php';

			require_once dirname(__FILE__) . '/includes/scripts-enque.php';

			}
		}
	}

add_action('plugins_loaded', 'BAC_check_required_plugins');


add_action( 'init', 'BAC_load_textdomain' );
function BAC_load_textdomain() {
  load_plugin_textdomain( 'before-after-content', false, BEFORE_AFTER_CONTENT_URL . '/languages' ); 
}