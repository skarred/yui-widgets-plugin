<?php
class YUI_DataTable_Plugin{
	#
	# Shortcode input vars
	#
	static $att_DataTableId			=	"";			# <string>
	static $att_DataTableCaption	=	"";			# <string>
	static $att_width				=	"";			# <number> DEFAULT:300
	static $att_height				=	"";			# <number> DEFAULT:200
	#
	# datatable Data
	#
	static $att_filename;
	static $att_csvJSONrows;
	static $att_request="JSON";
	static $att_sortable;					// DEFAULT:NULL
											// {true, yes, 1} to make all columns sortable (e.g. sortable=1)
											// <comma-separated list of columns to be sortable> (e.g. sortable=1)
	static $array_keys;
	#
	# Private
	#
	// static $add_yui_datatable_script = false;
	static $att_seriesData;
	static $att_delimiter;
	static $att_yuiuse;
	static $att_myDataTableCols;
	static $att_myDataTableValues;

	function yuidatatable_shortcode($atts){
		extract( shortcode_atts( array(
			# Shortcode input vars
				'id'							=>	'yuiwiget',
				'caption'						=>	'Multiple-Series Data Table',
				'width'							=>	'565px',
				'height'						=>	'380px',
				'request'						=>	'JSON',
				'filename'						=>	'',
				'delimiter'						=>	',',		 # DEFAULT: ','
				'sortable'						=>	NULL,

		), $atts ) );


		YUI_Widgets_Plugin::$add_script = true;


		# Shortcode input vars
			self::$att_DataTableId=$id.uniqid('_yuidatatable_');
			self::$att_DataTableCaption = $caption;
			self::$att_width = $width;
			self::$att_height = $height;
			self::$att_sortable = $sortable;
			self::$att_yuiuse=( is_null (self::$att_sortable)?'datatable':'datatable-sort');
		# DataTable Data
			self::$att_request = $request;
			self::$att_filename = $filename;
			self::$att_delimiter = $delimiter;
			self::$att_seriesData = file_get_contents(YUI_WIDGETS_PLUGIN_DATA_URL.self::$att_filename);
			list ($a, $b) = csv_to_JSON(self::$att_seriesData,self::$att_delimiter);
			self::$array_keys = $a;
			self::$att_csvJSONrows = $b;

		#private
			self::$att_myDataTableCols="myDataTableCols"."_".self::$att_DataTableId;
			self::$att_myDataTableValues="myDataTableValues"."_".self::$att_DataTableId;
		# Start Crunching
			$yuidatatable_script="<div id='".self::$att_DataTableId."' class='yui3-skin-sam yui-wp-datable'></div>\n";
		self::add_yui_datatable_script();
		return $yuidatatable_script;
	}

	function add_yui_datatable_script(){

		wp_enqueue_style( 'yui-plugins' );
		$my_datatable_data_path = YUI_WIDGETS_PLUGIN_JSDATA_PATH;
		$my_file = YUI_WIDGETS_PLUGIN_JSDATA_PATH.self::$att_DataTableId.".js";
		$my_file_url = YUI_WIDGETS_PLUGIN_JSDATA_URL.self::$att_DataTableId.".js";
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file

		$data = "";
		$data .= "YUI().use('".self::$att_yuiuse."',function(Y){\n";
		//build DataTable Html
		$data .= "	var oMyDataTable=Y.one('#".self::$att_DataTableId."');\n";
		$data .= "	oMyDataTable.addClass('clearfix');\n";

		//DataTable columns
		$data .= "	var ".self::$att_myDataTableCols." =\n";
		$data .= "		[\n";
		for ($k=0; $k<count(self::$array_keys); $k++)
		{
			$data .= "			{ key: '";
			$data .= self::$array_keys[$k];
			$data .= "', label: '";
			$data .= self::$array_keys[$k];
			$data .= "', sortable: ";
			$data .= self::$att_sortable;
			$data .= ", quickEdit: false }";
			if($k!=(count(self::$array_keys)-1)) $data .= ",\n";
		}
		$data .= "		];\n";

		// DataTable Data

		$data .= "		var ".self::$att_myDataTableValues." = ";
		$data .= indent(self::$att_csvJSONrows);
		$data .= ";\n";
		$data .= "		Y.on('available',function() {\n";
		// DataTable
		$data .= "			var table = new Y.DataTable({\n";
		$data .= "				columns: ".self::$att_myDataTableCols.",\n";
		$data .= "				data:".self::$att_myDataTableValues.",\n";
		$data .= "				caption:'".self::$att_DataTableCaption."'\n";
		$data .= "		}).render('#".self::$att_DataTableId."');\n";
		$data .= "	},'#".self::$att_DataTableId."',oMyDataTable);\n";
		$data .= "});\n";

		fwrite($handle, $data);
		fclose($handle);
		wp_enqueue_script( self::$att_DataTableId.'_script', $my_file_url, array('yui-min'), null,true );

		return;
	}
}

?>
