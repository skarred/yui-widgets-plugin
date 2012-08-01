<?php
class YUI_Charts_Plugin{
	# 
	# Shortcode input vars
	# 
	static $att_chartId				=	"";			# <string>
	static $att_chartTitle			=	"";			# <string>
	static $att_width				=	"";			# <number> DEFAULT:300
	static $att_height				=	"";			# <number> DEFAULT:200
	static $att_bgColor				=	"";			# DEFAULT:# FFFFFF
	static $att_bgOpacity			=	"";			# <number bet 0 & 1> DEFAULT:1
	static $att_borderColor			=	"";			# <hex color> DEFAULT:#666666
	static $att_embedded			=	"";			# {true, false}; APPLIES TO: whether inside a TabView
	static $att_tabIndex			=	"";			# <number 0,1,... >APPLIES TO: TabView tab Index ***************************************
	# 
	# Chart Structure
	# 
	static $att_chartType;						# {combo, column, bar, line, marker, area, spline, areaspline, combospline, pie}; DEFAULT:combo
	static $att_stacked;						# {true, false}; APPLIES TO:{combo, column, bar, pie, area, areaspline, combospline}
	static $att_interactionType;				# {marker, planar}; DEFAULT:marker
	static $att_catKey				=	"";		# <string>; DEFAULT:category
	static $att_series1Keys			=	"";		# REQUIRED; <comma-separated list> APPLIES TO:left axis
	static $att_series2Keys			=	"";		# <comma-separated list> APPLIES TO:right axis
	# 
	# Cosmetic
	# 
	static $att_showLines;								# {true, false}; APPLIES TO:combo DEFAULT:true
	static $att_showAreaFill;							# {true, false}; APPLIES TO:combo DEFAULT:false
	static $att_showLegend;								# {true, false};
	static $att_legendPosition;							# {left, top, right and bottom}; APPLIES TO: chart legend; DEFAULT:right
	static $att_showMarkers					=	"";		# {true, false}; DEFAULT:true
	static $att_horizontalGridlines			=	"";		# {true, false}; DEFAULT:false
	static $att_horizontalGridlinesColor	=	"";		# <hex color> DEFAULT:#DDDDDD
	static $att_verticalGridlines			=	"";		# {true, false}; DEFAULT:false
	static $att_verticalGridlinesColor		=	"";		# <hex color> DEFAULT:#DDDDDD

	# 
	# category Axis
	# 
	static $att_categoryType					=	"";		# {category, time}; DEFAULT:category
	static $att_categoryAxisTitle				=	"";		# <string>
	static $att_categoryAxisPosition			=	"";		# {top, bottom, left, right}; DEFAULT:bottom
	static $att_categoryAxisTitleRotation		=	"";		# <number>
	static $att_categoryAxisTitleOpacity		=	"";		# <number>
	static $att_categoryAxisLabelRotation		=	"";		# <number>
	static $att_categoryAxisMajorTicsDisplay;				# {inside, outside, cross, none}; DEFAULT:inside
	static $att_categoryAxisMajorTicsLength;				 # <number>; DEFAULT:4

	# 
	# Left Value Axis
	# 
	static $att_valueAxis1Title						=	"";		# <string> APPLIES TO:left axis
	static $att_valueAxis1Position					=	"";		# {top, bottom, left, right}; DEFAULT:left
	static $att_valueAxis1TitleRotation				=	"";		# <number> APPLIES TO:left axis
	static $att_valueAxis1TitleOpacity				=	"";		# <number>
	static $att_valueAxis1LabelRotation				=	"";		# <number> APPLIES TO:left axis
	static $att_valueAxis1MajorTicsDisplay;					   # {inside, outside, cross, none}; DEFAULT:inside
	static $att_valueAxis1MajorTicsLength;						# <number>; DEFAULT:4
	static $att_valueAxis1LabelPrefix;							# <string>; DEFAULT:''; EXAMPLE:'$'
	static $att_valueAxis1LabelThousandsSeparator;				# <string>; DEFAULT:''; EXAMPLE:','
	static $att_valueAxis1LabelDecimalSeparator;				  # <string>; DEFAULT:''; EXAMPLE:'.'
	static $att_valueAxis1LabelDecimalPlaces;					 # <number>; DEFAULT:0
	static $att_valueAxis1LabelSuffix;							# <string>; DEFAULT:''; EXAMPLE:'%'

	# 
	# Right Value Axis
	# 
	static $att_valueAxis2Title						=	"";		# <string> APPLIES TO:right axis
	static $att_valueAxis2Position					=	"";		# {top, bottom, left, right}; DEFAULT:left
	static $att_valueAxis2TitleRotation				=	"";		# <number> APPLIES TO:right axis
	static $att_valueAxis2TitleOpacity				=	"";		# <number>
	static $att_valueAxis2LabelRotation				=	"";		# <number> APPLIES TO:right axis 
	static $att_valueAxis2MajorTicsDisplay;					   # {inside, outside, cross, none}; DEFAULT:inside
	static $att_valueAxis2MajorTicsLength;						# <number>; DEFAULT:4
	static $att_valueAxis2LabelPrefix;							# <string>; DEFAULT:''
	static $att_valueAxis2LabelThousandsSeparator;				# <string>; DEFAULT:''; EXAMPLE:','
	static $att_valueAxis2LabelDecimalSeparator;				  # <string>; DEFAULT:''; EXAMPLE:'.'
	static $att_valueAxis2LabelDecimalPlaces;					 # <number>; DEFAULT:0
	static $att_valueAxis2LabelSuffix;							# <string>; DEFAULT:''; EXAMPLE:'%'

	# 
	# Chart Data
	# 
	static $att_catData;
	static $att_seriesData;
	static $att_delimiter;
	static $att_filename;
	static $att_csvJSONrows; 
	static $att_request="JSON";
	static $array_keys;
	# 
	# Private
	# 
	static $att_legendDivWidth="";
	static $att_legendDivDrawTo;
	static $att_myDataValues;
	static $att_myStyles;
	static $att_myAxes;
	static $att_myLegend; 
	static $att_myTooltip;
	static $att_TabSet;
	
	function yuichart_shortcode($atts){
		extract( shortcode_atts( array(
			# Shortcode input vars
				'id'							=>	'yuiwiget',
				'title'							=>	'',
				'width'							=>	'535px',
				'height'						=>	'300px',
				'bgcolor'						=>	'#EFF2EB',
				'bgopacity'						=>	1,
				'bordercolor'					=>	'#ccc',
				'embed'							=>	0,
				'index'							=>	'',
				'tabset'						=>	'',

			# Chart Structure
				'type'							=>	'combo',
				'stacked'						=>	false,
				'interaction'					=>	'',
				'catkey'						=>	'Period',		# change to default:Category
				'series1keys'					=>	'',
				'series2keys'					=>	'["value"]',

			# Cosmetic
				'showlegend'					=>	0,
				'position'						=>	'right',
				'showlines'						=>	0,
				'showareafill'					=>	0,
				'showmarkers'					=>	0,
				'hgridlines'					=>	0,
				'hgridlinescolor'				=>	'#DDDDDD',
				'vgridlines'					=>	0,
				'vgridlinescolor'				=>	'#DDDDDD',

			# Category Axis
				'cataxistype'					=>	'category',
				'cataxistitle'					=>	'',
				'cataxisposition'				=>	'bottom',
				'cataxistitlerotation'			=>	'0',
				'cataxistitleopacity'			=>	1,
				'cataxislabelrotation'			=>	'0',
				'cataxismajorticsdisplay'		=>	'inside',		# DEFAULT:inside
				'cataxismajorticslength'			=>	'4',

			# Left Value Axis
				'valueaxis1title'				=>	'',
				'valueaxis1position'			=>	'left',
				'valueaxis1titlerotation'		=>	'-90',
				'valueaxis1titleopacity'		=>	1,
				'valueaxis1labelrotation'		=>	'0',
				'valueaxis1majorticsdisplay'	=>	'inside',		 # DEFAULT:inside
				'valueaxis1majorticslength'		=>	'4',
				'valueaxis1prefix'				=>	'',
				'valueaxis1thousandsseparator'	=>	',',
				'valueaxis1decimalplaces'		=>	2,
				'valueaxis1suffix'				=>	'',

			# Right Value Axis
				'valueaxis2title'				=>	'Cum. Percentage',
				'valueaxis2position'			=>	'right',
				'valueaxis2titlerotation'		=>	'-90',
				'valueaxis2titleopacity'		=>	1,
				'valueaxis2labelrotation'		=>	'0',
				'valueaxis2majorticsdisplay'	=>	'none',		 # DEFAULT:inside
				'valueaxis2majorticslength'		=>	'4',
				'valueaxis2prefix'				=>	'',
				'valueaxis2thousandsseparator'	=>	'',
				'valueaxis2decimalseparator'	=>	'.',
				'valueaxis2decimalplaces'		=>	0,
				'valueaxis2suffix'				=>	' ',


			# Chart Data
				'catdata'						=>	'',
				'seriesdata'					=>	'',
				'filename'						=>	'',
				'delimiter'						=>	',',		 # DEFAULT: ','
				'request'						=>	'JSON',
		), $atts ) );

		YUI_Widgets_Plugin::$add_script= true;

		# Shortcode input vars
			self::$att_chartId=$id.($type==='pie' ? uniqid('_yuipiechart_'):uniqid('_yuichart_'));
			self::$att_chartTitle= $title;
			self::$att_width= $width;
			self::$att_height= $height;
			self::$att_bgColor= $bgcolor;
			self::$att_bgOpacity= $bgopacity;
			self::$att_borderColor= $bordercolor;
			self::$att_embedded= $embed;
			self::$att_tabIndex= $index;
			self::$att_TabSet= $tabset;

		# Chart Structure
			self::$att_chartType= $type;
			self::$att_stacked= $stacked;
			self::$att_interactionType= $interaction;
			self::$att_series2Keys= $series2keys;

		# Cosmetic
			self::$att_showLegend= $showlegend;
			self::$att_legendPosition= $position;
			self::$att_showLines= $showlines;
			self::$att_showAreaFill= $showareafill;
			self::$att_showMarkers= $showmarkers;
			self::$att_horizontalGridlines= $hgridlines;
			self::$att_horizontalGridlinesColor= $hgridlinescolor;
			self::$att_verticalGridlines= $vgridlines;
			self::$att_verticalGridlinesColor= $vgridlinescolor;

		# Category Axis
			self::$att_categoryType= $cataxistype;
			self::$att_categoryAxisTitle= $cataxistitle;
			self::$att_categoryAxisPosition= $cataxisposition;
			self::$att_categoryAxisTitleRotation= (int) $cataxistitlerotation;
			self::$att_categoryAxisTitleOpacity= (int) $cataxistitleopacity;
			self::$att_categoryAxisLabelRotation= (int) $cataxislabelrotation;
			self::$att_categoryAxisMajorTicsDisplay= $cataxismajorticsdisplay;
			self::$att_categoryAxisMajorTicsLength= $cataxismajorticslength;

		# Left Value Axis
			self::$att_valueAxis1Title= $valueaxis1title;
			self::$att_valueAxis1Position= $valueaxis1position;
			self::$att_valueAxis1TitleRotation= (int) $valueaxis1titlerotation;
			self::$att_valueAxis1TitleOpacity= (int) $valueaxis1titleopacity;
			self::$att_valueAxis1LabelRotation= (int) $valueaxis1labelrotation;
			self::$att_valueAxis1LabelPrefix= $valueaxis1prefix;
			self::$att_valueAxis1LabelThousandsSeparator= $valueaxis1thousandsseparator;
			self::$att_valueAxis1LabelDecimalSeparator= $valueaxis1decimalseparator;
			self::$att_valueAxis1LabelDecimalPlaces= (int) $valueaxis1decimalplaces;
			self::$att_valueAxis1LabelSuffix= $valueaxis1suffix;
			self::$att_valueAxis1MajorTicsDisplay= $valueaxis1majorticsdisplay;
			self::$att_valueAxis1MajorTicsLength= $valueaxis1majorticslength;

		# Right Value Axis
			self::$att_valueAxis2Title= $valueaxis2title;
			self::$att_valueAxis2Position= $valaxis2position;
			self::$att_valueAxis2TitleRotation= (int) $valueaxis2titlerotation;
			self::$att_valueAxis2TitleOpacity= (int) $valueaxis2titleopacity;
			self::$att_valueAxis2LabelRotation= (int) $valueaxis2labelrotation;
			self::$att_valueAxis2LabelPrefix= $rvaluelabelprefix;
			self::$att_valueAxis2LabelThousandsSeparator= $valueaxis2thousandsseparator;
			self::$att_valueAxis2LabelDecimalSeparator= $valueaxis2decimalseparator;
			self::$att_valueAxis2LabelDecimalPlaces= (int) $valueaxis2decimalseparator;
			self::$att_valueAxis2LabelSuffix= $valueaxis2suffix;
			self::$att_valueAxis2MajorTicsDisplay= $valueaxis2majorticsdisplay;
			self::$att_valueAxis2MajorTicsLength= $rValaxismajorticslength;

		# Chart Data
			self::$att_catData= $catdata;
			self::$att_seriesData= $seriesdata;
			self::$att_request= $request;
			self::$att_filename= $filename;
			self::$att_delimiter= $delimiter;
			self::$att_seriesData= file_get_contents(YUI_WIDGETS_PLUGIN_DATA_URL.self::$att_filename); 
			self::$att_csvJSONrows= csv_to_JSON(self::$att_seriesData,self::$att_delimiter,self::$att_request); 
			self::$array_keys= csv_to_JSON(self::$att_seriesData,self::$att_delimiter,'keys');
			self::$att_catKey=self::$array_keys[0];
			self::$att_series1Keys = "";

		#private
			self::$att_myDataValues="myDataValues"."_".self::$att_chartId;
			self::$att_myStyles="myStyles"."_".self::$att_chartId;
			self::$att_myAxes="myAxes"."_".self::$att_chartId;
			self::$att_myTooltip="myTooltip"."_".self::$att_chartId;
			self::$att_myLegend="myLegend"."_".self::$att_chartId;

		
			for ($k=1; $k<count(self::$array_keys); $k++)
			{
				if($k==(count(self::$array_keys)-1)){
					self::$att_series1Keys  .= "'".self::$array_keys[$k]."'";
				}else{
					self::$att_series1Keys  .= "'".self::$array_keys[$k]."',";
				}
			}
			

		# Start Crunching
			self::$att_legendDivWidth=($showmarkers ? '28px':'12px');
			self::$att_legendDivDrawTo=($showmarkers ? 28:12);

			$yuichart_script="<div id='".self::$att_chartId."' class='yui-wp-plugin yui-wp-charts yui3-skin-sam '> </div>\n";
			self::add_yui_charts_script();
		return $yuichart_script;

	}

	function add_yui_charts_script(){
		
		wp_enqueue_style( 'yui-plugins' );
		$my_chart_data_path = YUI_WIDGETS_PLUGIN_JSDATA_PATH;
		$my_file = YUI_WIDGETS_PLUGIN_JSDATA_PATH.self::$att_chartId.".js";
		$my_file_url = YUI_WIDGETS_PLUGIN_JSDATA_URL.self::$att_chartId.".js";
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file

		
		$data = "";
/* Load css */
		$data .= "YUI().use('node','node-core','event','charts-legend','gallery-markout','graphics',function(Y){\n";
/* 'gallery-paginator','datatable-datasource','gallery-quickedit', */

/* build chart Html */
		$data .= "	var oMychart=Y.one('#".self::$att_chartId."');\n";
		$data .= "	oMychart.addClass('clearfix');\n";
		$data .= "	var yMychart=Y.Markout(oMychart);\n";
		$data .= "	var yMyChartTitle=yMychart.h4({'class':'yui-chart-title clearfix'}).node();\n";
		$data .= "	Y.Markout(yMyChartTitle).text('".self::$att_chartTitle."');\n";
		$data .= "\n";
		$data .= "	var yMygraf=yMychart.div({\n";
		$data .= "		'class':'graf clearfix',\n";
		$data .= "		'id':'mygraf_".self::$att_chartId."',\n";
		$data .= "		style:{\n";
		$data .= "			'width':'".self::$att_width."',\n";
		$data .= "			'height':'".self::$att_height."'\n";
		$data .= "		}\n";
		$data .= "	}).node();\n";
/* Preparation for the Legend */ 
		if(self::$att_showLegend){
			$data .= "	var ";
			$data .= self::$att_myLegend;
			$data .= "= {\n";
			$data .= "	position: '".self::$att_legendPosition."',\n";
			$data .= "	width: 200,\n";
			$data .= "	height: 300,\n";
			$data .= "	styles: {\n";
			$data .= "		vAlign: 'top',\n";
			$data .= "		hAlign: 'left',\n";
			$data .= "		vSpacing: 8,\n";
			$data .= "		hSpacing: 100\n";
			$data .= "	}";
			$data .= "}\n";
		};

		$data .= "\n";
/* Chart Data */
		$data .= "	var ";
		$data .= self::$att_myDataValues;
		$data .= " = ".indent(self::$att_csvJSONrows).";\n";
		$data .= "\n";
		/* Chart Styles */

		if(self::$att_chartType !== "pie"){
			$data .= "	var ".self::$att_myStyles."= {\n";
			$data .= "		graph:{\n";
			$data .= "			background:{\n";
			$data .= "			shape:'rect',\n";
			$data .= "				fill:{\n";
//			$data .= "					color:'".self::$att_bgColor."',\n";
			$data .= "					alpha:'".self::$att_bgOpacity."'\n";
			$data .= "				},\n";
			$data .= "				border:{\n";
//			$data .= "					color:'".self::$att_borderColor."',\n";
			$data .= "					weight:1\n";
			$data .= "				}\n";
			$data .= "			}\n";
			$data .= "		}\n";
			$data .= "	};\n";
			$data .= "\n";
		}

/* Define axes for the chart */
		if(self::$att_chartType !== "pie"){
			$data .= "	var ".self::$att_myAxes."= {\n";
			$data .= "		categoryAxis:{\n";
			$data .= "			title:'".self::$att_categoryAxisTitle."',\n";
			$data .= "			keys:['".self::$att_catKey."'],\n";
			$data .= "			position:'".self::$att_categoryAxisPosition."',\n";
			$data .= "			type:'".self::$att_categoryType."',\n";
			$data .= "			styles:{\n";
			$data .= "				majorTicks:{\n";
			$data .= "					display:'".self::$att_categoryAxisMajorTicsDisplay."'\n";
			$data .= "				},\n";
			$data .= "				label:{\n";
			$data .= "					rotation:".self::$att_categoryAxisLabelRotation.",\n";
			if(self::$att_embedded) $data .= "					color:'#444',\n";
			$data .= "				},\n";
			$data .= "				title:{\n";
			if(self::$att_embedded) {
				$data .= "					color:'#152057',\n";
				$data .= "					fontWeight:700,\n";
			}else{
				$data .= "					color:'#095275',\n";
				$data .= "					fontWeight:500,\n";
			}
			$data .= "					rotation:".self::$att_categoryAxisTitleRotation.",\n";
			$data .= "					alpha:".self::$att_categoryAxisTitleOpacity.",\n";
			$data .= "					fontSize:'90%',\n";
			$data .= "					letterSpacing:'1px',\n";
			$data .= "					margin:{top:10}\n";
			$data .= "				}\n";
			$data .= "			}\n";
			$data .= "		},\n";
			$data .= "		demandData:{\n";
			$data .= "			title:'".self::$att_valueAxis1Title."',\n";
			$data .= "			type:'numeric',\n";
			$data .= "			position:'".self::$att_valueAxis1Position."',\n";
			$data .= "			keys:[".self::$att_series1Keys."],\n";
			$data .= "			labelFormat:{\n";
			$data .= "					prefix:'".self::$att_valueAxis1LabelPrefix."',\n";
			$data .= "					thousandsSeparator:'".self::$att_valueAxis1LabelThousandsSeparator."',\n";
			$data .= "					decimalSeparator:'".self::$att_valueAxis1LabelDecimalSeparator."',\n";
			$data .= "					decimalPlaces:".self::$att_valueAxis1LabelDecimalPlaces.",\n";
			$data .= "					suffix:'".self::$att_valueAxis1LabelSuffix."'\n";
			$data .= "			},\n";
			$data .= "			styles:{\n";
			$data .= "				majorTicks:{\n";
			$data .= "					display:'".self::$att_valueAxis1MajorTicsDisplay."'\n";
			$data .= "				},\n";
			$data .= "				label:{\n";
			$data .= "					rotation:".self::$att_valueAxis1LabelRotation.",\n";
			if(self::$att_embedded) $data .= "					color:'#444',\n";
			$data .= "				},\n";
			$data .= "				title:{\n";
			if(self::$att_embedded) {
				$data .= "					color:'#152057',\n";
				$data .= "					fontWeight:700,\n";
			}else{
				$data .= "					color:'#095275',\n";
				$data .= "					fontWeight:500,\n";
			}
			$data .= "					rotation:".self::$att_valueAxis1TitleRotation.",\n";
			$data .= "					alpha:".self::$att_valueAxis1TitleOpacity.",\n";
			$data .= "					fontSize:'90%',\n";
			$data .= "					letterSpacing:'1px',\n";
			$data .= "					margin:{right:0,left:0,top:5,bottom:5}\n";
			$data .= "				}\n";
			$data .= "			}\n";
			$data .= "		}\n";
			$data .= "	};\n";
		}
		
			$data .= "	var ".self::$att_myTooltip." = {\n";
			$data .= "		styles: { \n";
			$data .= "			backgroundColor: '#EDF5FF',\n";
			$data .= "			color: '#000',\n";
			$data .= "			borderColor: '#2647A0',\n";
			$data .= "			borderWidth: '2px',\n";
			$data .= "			textAlign: 'center'\n";
			$data .= "		},\n";
			$data .= "		markerLabelFunction: function(categoryItem, valueItem, itemIndex, series, seriesIndex)\n";
			$data .= "		{\n";
			$data .= "			var msg = document.createElement('div'),\n";
			$data .= "				underlinedTextBlock = document.createElement('span'),\n";
			$data .= "				boldTextBlock = document.createElement('div');\n";
			$data .= "			underlinedTextBlock.style.textDecoration = 'underline';\n";
			$data .= "			boldTextBlock.style.marginTop = '5px';\n";
			$data .= "			boldTextBlock.style.fontWeight = 'bold';\n";
			$data .= "			underlinedTextBlock.appendChild(document.createTextNode(valueItem.displayName + ' for ' + \n";
			$data .= "											categoryItem.axis.get('labelFunction').apply(this, [categoryItem.value, categoryItem.axis.get('labelFormat')])));\n";
			$data .= "			boldTextBlock.appendChild(document.createTextNode(valueItem.axis.get('labelFunction').apply(this, [valueItem.value, {prefix:'$', decimalPlaces:2}])));   \n";
			$data .= "			msg.appendChild(underlinedTextBlock);\n";
			$data .= "			msg.appendChild(document.createElement('br'));\n";
			$data .= "			msg.appendChild(boldTextBlock); \n";
			$data .= "			return msg; \n";
			$data .= "		}\n";
			$data .= "	};\n";
		
		$data .= "\n";
		$data .= "	Y.on('available',function() {\n";
/* Declare the chart */
		$data .= "		var myChart= new Y.Chart({\n";
		if(self::$att_showLegend){
			$data .= "			legend:".self::$att_myLegend.",\n";
		}
		$data .= "			type:'".self::$att_chartType."',\n";
		$data .= "			dataProvider:".self::$att_myDataValues.",\n";
		$data .= "			tooltip: ".self::$att_myTooltip.",\n";
		$data .= "			categoryKey:'".self::$att_catKey."'";

		if(self::$att_chartType !== "pie"){
			$data .= ",\n			styles:".self::$att_myStyles.",\n";
			$data .= "			axes:".self::$att_myAxes."\n";
		}

		if(self::$att_chartType === "pie"){
			$data .= ",\n			seriesKeys:[".self::$att_series1Keys."]";
		}

		if(self::$att_horizontalGridlines){
			$data .= ",\n			horizontalGridlines:".self::$att_horizontalGridlines.",\n";
			$data .= "\t\t\thorizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } }";
		};
		if(self::$att_verticalGridlines){
			$data .= ",\n			verticalGridlines:".self::$att_verticalGridlines.",\n";
			$data .= "\t\t\tverticalGridlines:{ styles:{ line:{ color:'".self::$att_verticalGridlinesColor."' } } }";
		};
		if(self::$att_showMarkers){
			$data .= ",\n			showMarkers:".self::$att_showMarkers;
		};
		$data .= "\n		});\n";
/*	Draw the chart */
		if(self::$att_embedded){
			$data .= "renderIntoTabview_".self::$att_TabSet."(myChart, '#mygraf_".self::$att_chartId."', ".self::$att_tabIndex.");\n";
		}else{
			$data .= "myChart.render(yMygraf);\n";
		}
		$data .= "	},'#mygraf_".self::$att_chartId."',oMychart);\n";


		$data .= "});\n";

		fwrite($handle, $data);
		fclose($handle);
		
		if(self::$att_embedded){
			//wp_enqueue_script( self::$att_chartId.'_script', $my_file_url, array('yui-min',$yui_tab_id.'_script'), null,true );
			wp_enqueue_script( self::$att_chartId.'_script', $my_file_url, array('yui-min',self::$att_TabSet.'_script'), null,true );
		}else{
			wp_enqueue_script( self::$att_chartId.'_script', $my_file_url, array('yui-min'), null,true );
		}
		return;
	}
}

?>
