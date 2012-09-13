<?php
/*
Plugin Name:yui-widgets-plugin.php
Plugin URI:http://karalli.net/
Description:Visualize data using the <a href="http://yuilibrary.com/gallery/show/datatables/">YUI 3 Gallery datatables</a> module.
Version:Beta 0.0.0
Author:Serge Karalli
Author URI:http://karalli.net/
Copyright 2011. Serge Karalli
License:GPL2
*/

/*	Copyright 2012
	Serge Karalli	(email:ska44ed@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA	02110-1301	USA
plugins_url( '/data/', __FILE__ )
*/

/* Dir URLs and PATHs */
define( 'YUI_WIDGETS_PLUGIN_PATH',plugin_dir_path(  __FILE__ ) );
define( 'YUI_WIDGETS_PLUGIN_INCLUDE_PATH',YUI_WIDGETS_PLUGIN_PATH.'include/' );
define( 'YUI_WIDGETS_PLUGIN_ADMIN_PATH',YUI_WIDGETS_PLUGIN_PATH.'admin/' );
define( 'YUI_WIDGETS_PLUGIN_CLASS_PATH',YUI_WIDGETS_PLUGIN_PATH.'classes/' );
define( 'YUI_WIDGETS_PLUGIN_DATA_PATH', YUI_WIDGETS_PLUGIN_PATH.'data/' );
define( 'YUI_WIDGETS_PLUGIN_JSDATA_PATH', YUI_WIDGETS_PLUGIN_PATH.'generatedjs/' );

define( 'YUI_WIDGETS_PLUGIN_CSS_URL',plugins_url( '/css/', __FILE__ ) );
define( 'YUI_WIDGETS_PLUGIN_DATA_URL',plugins_url( '/data/', __FILE__ ) );
define( 'YUI_WIDGETS_PLUGIN_JS_URL',plugins_url( '/js/', __FILE__ ) );
define( 'YUI_WIDGETS_PLUGIN_JSDATA_URL',plugins_url( '/generatedjs/', __FILE__ ) );

define( 'YUI_WIDGETS_PLUGIN_JSDATA_MAXAGE', 0.007 );
/* helper files */
include('csv2JSON.php');
include('JSONindent.php');
include('csv2JSON4pareto.php');
include('csv2JSON4histogram.php');
include('csv2JSON4controlCharts.php');
include('ttf_pixel.php');
/* widget classes */
include (YUI_WIDGETS_PLUGIN_CLASS_PATH.'yui_datatable.class.php');
include (YUI_WIDGETS_PLUGIN_CLASS_PATH.'yui_charts.class.php');
include (YUI_WIDGETS_PLUGIN_CLASS_PATH.'yui_magseven.class.php');
include (YUI_WIDGETS_PLUGIN_CLASS_PATH.'yui_TabView.class.php');

/* admin functions */
function custom_menu_page(){
	echo "<h1>Admin Page Test</h1>".basename(__FILE__);
}
function please_donate_page(){
	include (YUI_WIDGETS_PLUGIN_ADMIN_PATH.'yui_widgets_plugin_donate.php');
}
function datatable_options_page(){
	include (YUI_WIDGETS_PLUGIN_ADMIN_PATH.'yui_datatable_manage.php');
}
function charts_options_page(){
	include (YUI_WIDGETS_PLUGIN_ADMIN_PATH.'yui_charts_manage.php');
}
function tabview_options_page(){
	include (YUI_WIDGETS_PLUGIN_ADMIN_PATH.'yui_tabview_manage.php');
}

class YUI_Widgets_Plugin{
	#
	# Private
	#
	static $add_script= false;



	function init(){
		register_activation_hook( __FILE__, array( __CLASS__,'yui_widgets_plugin_install') );
		register_deactivation_hook( __FILE__, array( __CLASS__, 'yui_widgets_plugin_uninstall') );
		add_shortcode( 'yuidatatable', array( 'YUI_DataTable_Plugin', 'yuidatatable_shortcode' ) );
		add_shortcode( 'yuichart', array( 'YUI_Charts_Plugin', 'yuichart_shortcode' ));
		add_shortcode( 'magseven', array( 'YUI_Mag_Seven_Plugin', 'yui_magseven_shortcode' ));
		add_shortcode( 'yuitabview', array( 'YUI_TabView_Plugin', 'yuitabview_shortcode' ) ); // The shell
		add_shortcode( 'yuitab', array( 'YUI_TabView_Plugin', 'yuitabs_shortcode' ) ); // Individual tab

		wp_register_script('yui-min', 'http://yui.yahooapis.com/3.6.0/build/yui/yui-min.js', NULL, '3.6.0', false);
		wp_register_style('yui-plugins', YUI_WIDGETS_PLUGIN_CSS_URL.'yui_plugins.css',false,'1.0.0','all');

		add_action( 'wp_head', array( __CLASS__, 'add_script') );
		//add_action( 'wp_footer', array( 'YUI_DataTable_Plugin', 'add_yui_datatable_script') );
		//add_action( 'wp_footer', array( 'YUI_Charts_Plugin', 'add_yui_charts_script') );
		//add_action( 'wp_footer', array( 'YUI_TabView_Plugin', 'add_yui_tabview_script') );
		register_shutdown_function( array( __CLASS__, 'cleanup_jsdata_dir') );
	}



	function cleanup_jsdata_dir() {
		if(YUI_WIDGETS_PLUGIN_JSDATA_MAXAGE && YUI_WIDGETS_PLUGIN_JSDATA_MAXAGE > 0 && is_dir(YUI_WIDGETS_PLUGIN_JSDATA_PATH)) {
			$obsolete_files = array();
			if($data_dir = opendir(YUI_WIDGETS_PLUGIN_JSDATA_PATH)) {
				while(($data_file = readdir($data_dir)) !== false) {
					$jsdata_file = YUI_WIDGETS_PLUGIN_JSDATA_PATH.$data_file;
					if(!is_file($jsdata_file)) continue;
					$jsdata_file_stats = stat($jsdata_file);
					if(!$jsdata_file_stats) continue;
					if((time() - $jsdata_file_stats['mtime']) > (YUI_WIDGETS_PLUGIN_JSDATA_MAXAGE * 24*60*60)) {
						array_push($obsolete_files, $jsdata_file);
					}
				}
				closedir($data_dir);
			}
			foreach($obsolete_files as $data_file) {
				unlink($data_file);
			}
		}
	}



	function yui_widgets_plugin_install() {
		//registers default options
		add_option('yui_version', '3.5.1',null, 'yes');
		add_option('yui_datatable_default_option', 'datatable',null, 'yes');
		add_option('yui_datatable_options',
			array(	'datatable',
					'datatable-datasource',
					'datatable-scroll',
					'datatable-sort',
					'datatype-number-format',
					'gallery-datatable-row-expansion',
					'gallery-datatable-state',
					'gallery-layout-datatable',
					'gallery-paginator',
					'gallery-quickedit',
					'gallery-treeble',
					'dataschema',
					'gallery-datatable-footer'
				),null, 'yes');
		add_option('yui_chart_default_type', 'line',null, 'yes');
		add_option('yui_chart_types',
			array(	'combo',
					'column',
					'bar',
					'line',
					'marker',
					'area',
					'spline',
					'areaspline',
					'combospline',
					'pie'
		//add_option('yui_tabview_default_option');
		//add_option('yui_tabview_default_type');
		//add_option('yui_tabs_default_option');
		//add_option('yui_tabs_default_type');
				),null, 'yes');
		return;
	}

	function yui_widgets_plugin_uninstall() {
		delete_option('yui_version');
		delete_option('yui_datatable_default_option');
		delete_option('yui_chart_default_type');
		delete_option('yui_datatable_options');
		delete_option('yui_chart_types');
		//delete_option('yui_tabview_default_option');
		//delete_option('yui_tabview_default_type');
		//delete_option('yui_tabs_default_option');
		//delete_option('yui_tabs_default_type');
		return;
	}

	function init_admin(){
		add_action('admin_menu', array(__CLASS__, 'yui_widgets_plugin_menu'));
	}

	function yui_widgets_plugin_menu(){
		if(function_exists('add_menu_page')){
			add_menu_page(
				'YUI Plugins',
				'YUI Plugins',
				'administrator',
				basename(__FILE__),	//menu_slug
				'custom_menu_page'
			);
		}
		if(function_exists('add_submenu_page')){
			add_submenu_page(
				basename(__FILE__),
				'Please Donate',
				'Please Donate',
				'administrator',
				'yui-plugins-donate',
				'please_donate_page'
			);
		}
		if(function_exists('add_submenu_page')){
			add_submenu_page(
				basename(__FILE__),
				'YUI DataTable',
				'YUI DataTable',
				'administrator',
				'yui-datatable_plugins-options',
				'datatable_options_page'
			);
		}
		if(function_exists('add_submenu_page')){
			add_submenu_page(
				//'yui-widgets-plugin.php'
				basename(__FILE__),
				'YUI Charts',
				'YUI Charts',
				'administrator',
				'yui_charts_options',
				'charts_options_page'
			);
		}
		if(function_exists('add_submenu_page')){
			add_submenu_page(
				//'yui-widgets-plugin.php'
				basename(__FILE__),
				'YUI TabView',
				'YUI TabView',
				'administrator',
				'yui_tabview_options',
				'tabview_options_page'
			);
		}
	}

	function add_script(){
		if (self::$add_script) wp_print_scripts('yui-min');
	}

}
YUI_Widgets_Plugin::init_admin();
YUI_Widgets_Plugin::init();
?>
