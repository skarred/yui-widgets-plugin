<?php
class YUI_Mag_Seven_Plugin{
	#
	# Shortcode input vars
	#
	static $att_chartId;					# <string>
	static $att_chartTitle;					# <string>
	static $att_width;						# <number> DEFAULT:300
	static $att_height;						# <number> DEFAULT:200
	static $att_bgColor;					# DEFAULT:#FAF9F2
	static $att_bgOpacity;					# <number bet 0 & 1> DEFAULT:1
	static $att_borderColor;				# <hex color> DEFAULT:#dad8c9
	static $att_borderWeight;				# <number> DEFAULT:1
	static $att_embedded;					# {true, false}; APPLIES TO: whether inside a TabView
	static $att_tabIndex;					# <number 0,1,... >APPLIES TO: TabView tab Index
	#
	# Chart Structure
	#
	static $att_chartType;					# {combo, column, bar, line, marker, area, spline, areaspline, combospline, pie, pareto, abc, histogram, control}; DEFAULT:combo
	static $att_stacked;					# {true, false}; APPLIES TO:{combo, column, bar, pie, area, areaspline, combospline}
	static $att_interactionType;			# {marker, planar}; DEFAULT:marker
	static $att_catKey;						# <string>; DEFAULT:category
	static $att_series1Keys;				# REQUIRED; <comma-separated list> APPLIES TO:left axis
	static $att_series2Keys;				# <comma-separated list> APPLIES TO:right axis
	static $att_paxKeys;					# <comma-separated list> APPLIES TO:right axis
	#
	# Cosmetic
	#
	static $att_showLines;					# {true, false}; APPLIES TO:combo DEFAULT:true
	static $att_showAreaFill;				# {true, false}; APPLIES TO:combo DEFAULT:false
	static $att_showLegend;					# {true, false};
	static $att_legendPosition;				# {left, top, right and bottom}; APPLIES TO: chart legend; DEFAULT:right
	static $att_showMarkers;				# {true, false}; DEFAULT:true
	static $att_horizontalGridlines;		# {true, false}; DEFAULT:false
	static $att_horizontalGridlinesColor;	# <hex color> DEFAULT:#DDDDDD
	static $att_verticalGridlines;			# {true, false}; DEFAULT:false
	static $att_verticalGridlinesColor;		# <hex color> DEFAULT:#DDDDDD

	#
	# category Axis
	#
	static $att_catType;					# {category, time}; DEFAULT:category
	static $att_catAxisTitle;				# <string>
	static $att_catAxisPosition;			# {top, bottom, left, right}; DEFAULT:bottom
	static $att_catAxisTitleRotation;		# <number>
	static $att_catAxisTitleOpacity;		# <number>
	static $att_catAxisLabelRotation;		# <number>
	static $att_catAxisMajorTicsDisplay;	# {inside, outside, cross, none}; DEFAULT:inside
	static $att_catAxisMajorTicsLength;		# <number>; DEFAULT:4
	static $att_catLabelPrefix;
	static $att_catLabel000Separator;
	static $att_catLabelDecimalPlaces;
	static $att_catLabelDecimalSeparator;
	static $att_catLabelSuffix;
	static $att_alwaysShowZero;
	static $att_catmin;
	static $att_catmax;


	#
	# Left Value Axis
	#
	static $att_vax1Title;					# <string> APPLIES TO:left axis
	static $att_vax1Position;				# {top, bottom, left, right}; DEFAULT:left
	static $att_vax1TitleRotation;			# <number> APPLIES TO:left axis
	static $att_vax1TitleOpacity;			# <number>
	static $att_vax1LabelRotation;			# <number> APPLIES TO:left axis
	static $att_vax1MajorTicsDisplay;		# {inside, outside, cross, none}; DEFAULT:inside
	static $att_vax1MajorTicsLength;		# <number>; DEFAULT:4
	static $att_vax1LabelPrefix;			# <string>; DEFAULT:''; EXAMPLE:'$'
	static $att_vax1Label000Separator;		# <string>; DEFAULT:''; EXAMPLE:','
	static $att_vax1LabelDecimalSeparator;	# <string>; DEFAULT:''; EXAMPLE:'.'
	static $att_vax1LabelDecimalPlaces;		# <number>; DEFAULT:0
	static $att_vax1LabelSuffix;			# <string>; DEFAULT:''; EXAMPLE:'%'
	static $att_vax1min;
	static $att_vax1max;

	#
	# Right Value Axis
	#
	static $att_vax2Title;					# <string> APPLIES TO:right axis
	static $att_vax2Position;				# {top, bottom, left, right}; DEFAULT:left
	static $att_vax2TitleRotation;			# <number> APPLIES TO:right axis
	static $att_vax2TitleOpacity;			# <number>
	static $att_vax2LabelRotation;			# <number> APPLIES TO:right axis
	static $att_vax2MajorTicsDisplay;		# {inside, outside, cross, none}; DEFAULT:inside
	static $att_vax2MajorTicsLength;		# <number>; DEFAULT:4
	static $att_vax2LabelPrefix;			# <string>; DEFAULT:''
	static $att_vax2Label000Separator;		# <string>; DEFAULT:''; EXAMPLE:','
	static $att_vax2LabelDecimalSeparator;	# <string>; DEFAULT:''; EXAMPLE:'.'
	static $att_vax2LabelDecimalPlaces;		# <number>; DEFAULT:0
	static $att_vax2LabelSuffix;			# <string>; DEFAULT:''; EXAMPLE:'%'
	static $att_vax2min;
	static $att_vax2max;

	#
	# Pareto Axis
	#
	static $att_paxTitle;					# <string> APPLIES TO:right axis
	static $att_paxPosition;				# {top, bottom, left, right}; DEFAULT:left
	static $att_paxTitleRotation;			# <number> APPLIES TO:right axis
	static $att_paxTitleOpacity;			# <number>
	static $att_paxLabelRotation;			# <number> APPLIES TO:right axis
	static $att_paxMajorTicsDisplay;		# {inside, outside, cross, none}; DEFAULT:inside
	static $att_paxMajorTicsLength;			# <number>; DEFAULT:4
	static $att_paxLabelPrefix;				# <string>; DEFAULT:''
	static $att_paxLabel000Separator;		# <string>; DEFAULT:''; EXAMPLE:','
	static $att_paxLabelDecimalSeparator;	# <string>; DEFAULT:''; EXAMPLE:'.'
	static $att_paxLabelDecimalPlaces;		# <number>; DEFAULT:0
	static $att_paxLabelSuffix;				# <string>; DEFAULT:''; EXAMPLE:'%'
	static $att_paxmin;
	static $att_paxmax;

	#
	# Histogram Axis
	#
	static $att_histBarColor;				# <string> APPLIES TO:Histogram Bars
	static $att_histBins;					# <string> APPLIES TO:Number of Histogram Data Bins

	#
	# Marker Series
	#
	static $att_trendLine;					# {true, false}; DEFAULT:false; APPLIES TO:add trendline?

	#
	# Chart Data
	#
	static $att_catData;
	static $att_seriesData;
	static $att_delimiter;
	static $att_filename;
	static $att_JSONchartData;
	static $att_abcTableData;
	static $att_request = "JSON";
	static $array_keys;
	static $array_title;
	#
	# Private
	#
	static $att_legendDivWidth = "";
	static $att_legendDivDrawTo;
	static $att_myDataValues;
	static $att_myStyles;
	static $att_myAxes;
	static $att_mySeries;
	static $att_myLegend;
	static $att_myTooltip;
	static $att_TabSet;
	static $list_JSON;


	function yui_magseven_shortcode($atts){
		extract( shortcode_atts( array(
			# Shortcode input vars
				'id'							 =>	'yuiwiget',
				'title'							 =>	'',
				'width'							 =>	'535px',
				'height'						 =>	'300px',
				'bgcolor'						 =>	'#FAF9F2',
				'bgopacity'						 =>	1,
				'bordercolor'					 =>	'#dad8c9',
				'borderweight'					 =>	1,
				'embed'							 =>	0,
				'index'							 =>	'',
				'tabset'						 =>	'',

			# Chart Structure
				'type'							 =>	'combo',
				'bins'							 =>	6,
				'stacked'						 =>	false,
				'trendline'						 =>	false,
				'interaction'					 =>	'',
				'catkey'						 =>	'Period',		# change to default:Category
				'series1keys'					 =>	'',
				'series2keys'					 =>	'["value"]',

			# Cosmetic
				'showlegend'					 =>	0,
				'position'						 =>	'right',
				'showlines'						 =>	0,
				'showareafill'					 =>	0,
				'showmarkers'					 =>	0,
				'hgridlines'					 =>	0,
				'hgridlinescolor'				 =>	'#DDDDDD',
				'vgridlines'					 =>	0,
				'vgridlinescolor'				 =>	'#DDDDDD',

			# Category Axis
				'categorytype'					 =>	'category',
				'cataxposition'					 =>	'bottom',
				'cataxtitle'					 =>	'',
				'alwaysshowzero'				 =>	null,
				'catmin'						 =>	null,
				'catmax'						 =>	null,
				'cataxtitleopacity'				 =>	1,
				'cataxtitlerotation'			 =>	'0',
				'cataxmajorticsdisplay'			 =>	'inside',		# DEFAULT:inside
				'cataxmajorticslength'			 =>	'4',
				'catlabelrotation'				 =>	'0',
				'catlabelprefix'				 =>	null,
				'catlabelsuffix'				 =>	null,
				'catlabelrotation'				 =>	'0',
				'catdecimalseparator'			 =>	'.',
				'catdecimalplaces'				 =>	0,
				'cat000separator'				 =>	',',

			# Left Value Axis
				'vax1title'					 =>	'',
				'vax1position'				 =>	'left',
				'vax1min'					 =>	null,
				'vax1max'					 =>	null,
				'vax1titlerotation'			 =>	'-90',
				'vax1titleopacity'			 =>	1,
				'vax1labelrotation'			 =>	'0',
				'vax1majorticsdisplay'		 =>	'inside',		 # DEFAULT:inside
				'vax1majorticslength'		 =>	'4',
				'vax1prefix'				 =>	null,
				'vax1suffix'				 =>	null,
				'vax1000separator'			 =>	',',
				'vax1decimalseparator'		 =>	'.',
				'vax1decimalplaces'			 =>	1,

			# Right Value Axis
				'vax2title'					 =>	'',
				'vax2position'				 =>	'right',
				'vax2min'					 =>	null,
				'vax2max'					 =>	null,
				'vax2titlerotation'			 =>	'-90',
				'vax2titleopacity'			 =>	1,
				'vax2labelrotation'			 =>	'0',
				'vax2majorticsdisplay'		 =>	'inside',		 # DEFAULT:inside
				'vax2majorticslength'		 =>	'4',
				'vax2prefix'				 =>	null,
				'vax2suffix'				 =>	null,
				'vax2000separator'			 =>	',',
				'vax2decimalseparator'		 =>	'.',
				'vax2decimalplaces'			 =>	0,

			# Pareto CumPercent Axis
				'paxtitle'					 =>	'Cumulative Percent Usage',
				'paxposition'				 =>	'right',
				'paxmin'					 =>	null,
				'paxmax'					 =>	110,
				'paxtitlerotation'			 =>	'-90',
				'paxtitleopacity'			 =>	1,
				'paxlabelrotation'			 =>	'0',
				'paxmajorticsdisplay'		 =>	'inside',		 # DEFAULT:inside
				'paxmajorticslength'		 =>	'4',
				'paxprefix'					 =>	null,
				'paxsuffix'					 =>	'%',
				'pax000separator'			 =>	',',
				'paxdecimalseparator'		 =>	'.',
				'paxdecimalplaces'			 =>	0,


			# Chart Data
				'catdata'					 =>	'',
				'seriesdata'				 =>	'',
				'filename'					 =>	'',
				'delimiter'					 =>	',',		 # DEFAULT: ','
				'request'					 =>	'JSON',
		), $atts ) );

		YUI_Widgets_Plugin::$add_script = true;

		# Chart Structure
			self::$att_chartType = $type;
			self::$att_stacked = $stacked;
			self::$att_interactionType = $interaction;
			self::$att_series2Keys = $series2keys;

		# Shortcode input vars
			self::$att_chartTitle = $title;
			self::$att_width = $width;
			self::$att_height = $height;
			self::$att_bgColor = $bgcolor;
			self::$att_bgOpacity = $bgopacity;
			self::$att_borderColor = $bordercolor;
			self::$att_borderWeight = $borderweight;
			self::$att_embedded = $embed;
			self::$att_tabIndex = $index;
			self::$att_TabSet = $tabset;
		# Cosmetic
			self::$att_showLegend = $showlegend;
			self::$att_legendPosition = $position;
			self::$att_showLines = $showlines;
			self::$att_showAreaFill = $showareafill;
			self::$att_showMarkers = $showmarkers;
			self::$att_horizontalGridlines = $hgridlines;
			self::$att_horizontalGridlinesColor = $hgridlinescolor;
			self::$att_verticalGridlines = $vgridlines;
			self::$att_verticalGridlinesColor = $vgridlinescolor;

		# Category Axis
			self::$att_catType = $categorytype;
			self::$att_catAxisTitle = $cataxtitle;
			self::$att_catAxisPosition = $cataxposition;
			self::$att_catAxisTitleRotation = (int) $cataxtitlerotation;
			self::$att_catAxisTitleOpacity = (int) $cataxtitleopacity;
			self::$att_catLabelPrefix = $catlabelprefix;
			self::$att_catLabelSuffix = $catlabelsuffix;
			self::$att_catLabel000Separator = $cat000separator;
			self::$att_catLabelDecimalPlaces = (int) $catdecimalplaces;
			self::$att_catLabelDecimalSeparator = $catdecimalseparator;
			self::$att_catAxisLabelRotation = (int) $catlabelrotation;
			self::$att_catAxisMajorTicsDisplay = $cataxmajorticsdisplay;
			self::$att_catAxisMajorTicsLength = $cataxmajorticslength;
			self::$att_alwaysShowZero = $alwaysshowzero;
			self::$att_catmin = $catmin;
			self::$att_catmax = $catmax;

		# Left Value Axis
			self::$att_vax1Title = $vax1title;
			self::$att_vax1Position = $vax1position;
			self::$att_vax1TitleRotation = (int) $vax1titlerotation;
			self::$att_vax1TitleOpacity = (int) $vax1titleopacity;
			self::$att_vax1LabelRotation = (int) $vax1labelrotation;
			self::$att_vax1LabelPrefix = $vax1prefix;
			self::$att_vax1LabelSuffix = $vax1suffix;
			self::$att_vax1Label000Separator = $vax1000separator;
			self::$att_vax1LabelDecimalSeparator = $vax1decimalseparator;
			self::$att_vax1LabelDecimalPlaces = (int) $vax1decimalplaces;
			self::$att_vax1MajorTicsDisplay = $vax1majorticsdisplay;
			self::$att_vax1MajorTicsLength = $vax1majorticslength;
			self::$att_vax1min = $vax1min;
			self::$att_vax1max = $vax1max;

		# Right Value Axis
			self::$att_vax2Title = $vax2title;
			self::$att_vax2Position = $vax2position;
			self::$att_vax2TitleRotation = (int) $vax2titlerotation;
			self::$att_vax2TitleOpacity = (int) $vax2titleopacity;
			self::$att_vax2LabelRotation = (int) $vax2labelrotation;
			self::$att_vax2LabelPrefix = $vax2prefix;
			self::$att_vax2LabelSuffix = $vax2suffix;
			self::$att_vax2Label000Separator = $vax2000separator;
			self::$att_vax2LabelDecimalSeparator = $vax2decimalseparator;
			self::$att_vax2LabelDecimalPlaces = (int) $vax2decimalseparator;
			self::$att_vax2MajorTicsDisplay = $vax2majorticsdisplay;
			self::$att_vax2MajorTicsLength = $vax2majorticslength;
			self::$att_vax2min = $vax2min;
			self::$att_vax2max = $vax2max;

		# Pareto CumPercent Axis
			self::$att_paxTitle = $paxtitle;
			self::$att_paxPosition = $paxposition;
			self::$att_paxTitleRotation = (int) $paxtitlerotation;
			self::$att_paxTitleOpacity = (int) $paxtitleopacity;
			self::$att_paxLabelRotation = (int) $paxlabelrotation;
			self::$att_paxLabelPrefix = $paxprefix;
			self::$att_paxLabelSuffix = $paxsuffix;
			self::$att_paxLabel000Separator = $pax000separator;
			self::$att_paxLabelDecimalSeparator = $paxdecimalseparator;
			self::$att_paxLabelDecimalPlaces = (int) $paxdecimalseparator;
			self::$att_paxMajorTicsDisplay = $paxmajorticsdisplay;
			self::$att_paxMajorTicsLength = $paxmajorticslength;
			self::$att_paxmin = $paxmin;
			self::$att_paxmax = $paxmax;

		# MarkerSeries
			if(self::$att_chartType === "marker") self::$att_trendLine = $trendline;

		# Chart Data
			self::$att_catData = $catdata;
			self::$att_seriesData = $seriesdata;
			self::$att_request = $request;
			self::$att_filename = $filename;
			self::$att_delimiter = $delimiter;
			self::$att_seriesData = file_get_contents(YUI_WIDGETS_PLUGIN_DATA_URL.self::$att_filename);
			if(self::$att_chartType === "xbar"){
				list ($p0, $p1) = csv_to_PARETO_xBar(self::$att_seriesData,self::$att_delimiter,'x');
				self::$att_JSONchartData = $p1;
				self::$array_keys = $p0;
				self::$att_catKey = self::$array_keys[0];
				self::$att_series1Keys = "";
				for ($k = 1; $k<count(self::$array_keys); $k++)
				{
					if($k == (count(self::$array_keys)-1)){
						self::$att_series1Keys .= "'".self::$array_keys[$k]."'";
					}else{
						self::$att_series1Keys .= "'".self::$array_keys[$k]."',";
					}
				}
			}elseif(self::$att_chartType === "rchart"){
				list ($p0, $p1) = csv_to_PARETO_xBar(self::$att_seriesData,self::$att_delimiter,'r');
				self::$att_JSONchartData = $p1;
				self::$array_keys = $p0;
				self::$att_catKey = self::$array_keys[0];
				self::$att_series1Keys = "";
				for ($k = 1; $k<count(self::$array_keys); $k++)
				{
					if($k == (count(self::$array_keys)-1)){
						self::$att_series1Keys .= "'".self::$array_keys[$k]."'";
					}else{
						self::$att_series1Keys .= "'".self::$array_keys[$k]."',";
					}
				}
			}elseif(self::$att_chartType === "abc"){
				list ($p0, $p1, $p2, $p3) = csv_to_ABC(self::$att_seriesData,self::$att_delimiter,'all');
				self::$att_vax1max = $p0;
				self::$array_title = $p1;
				self::$att_JSONchartData = $p2;
				self::$att_abcTableData= $p3;
			}elseif(self::$att_chartType === "pareto"){
				list ($p0, $p1, $p2) = csv_to_PARETO(self::$att_seriesData,self::$att_delimiter,'all');
				self::$att_vax1max = $p0;
				self::$array_title = $p1;
				self::$att_JSONchartData = $p2;
			}elseif(self::$att_chartType === "histogram"){
				self::$att_histBins=$bins;								# <string> APPLIES TO:Number of Histogram Data Bins
				list ($p0, $p1) = self::$att_JSONchartData  = csv_to_histogram(self::$att_seriesData,6);
				self::$att_catKey = 'interval';
				self::$att_catAxisTitle = 'Interval';
				self::$att_JSONchartData = $p1;
			}elseif($type === "marker"){
				self::$att_chartType = 'markerseries';
				if (self::$att_trendLine){
					list ($p0, $p1) = csv_to_JSON_add_trend(self::$att_seriesData,self::$att_delimiter);
				}else{
					list ($p0, $p1) = csv_to_JSON(self::$att_seriesData,self::$att_delimiter);
				}
				self::$att_JSONchartData = $p1;
				self::$array_keys = $p0;
				self::$att_catKey = self::$array_keys[0];
				self::$att_series1Keys = "";
				for ($k = 1; $k<count(self::$array_keys); $k++)
				{
					if($k == (count(self::$array_keys)-1)){
						self::$att_series1Keys .= "'".self::$array_keys[$k]."'";
					}else{
						self::$att_series1Keys .= "'".self::$array_keys[$k]."',";
					}
				}
			}


		# Shortcode input vars
			switch ($type) {
				case "xbar":
					self::$att_chartId = $id.uniqid('_xbar_');
					break;
				case "rchart":
					self::$att_chartId = $id.uniqid('_rchart_');
					break;
				case "combo":
					self::$att_chartId = $id.uniqid('_combo_');
					break;
				case "marker":
					self::$att_chartId = $id.uniqid('_marker_');
					self::$att_catType = 'numeric';
					break;
				case "pareto":
					self::$att_chartId = $id.uniqid('_pareto_');
					self::$att_catType = 'category';
					self::$att_catKey = 'Item';
					self::$att_height = '400px';
					self::$att_series1Keys = "'Usage'";
					self::$att_showMarkers = 1;
					self::$att_paxKeys = 'CumPercent';
					self::$att_catAxisTitle = self::$array_title[0];
					self::$att_catAxisLabelRotation = '-90';
					self::$att_catAxisMajorTicsDisplay = 'inside';
					self::$att_catAxisMajorTicsLength = '4';
					self::$att_vax1Title = self::$array_title[1];
					self::$att_paxTitle = 'Cumulative Percent Usage';
					self::$att_paxPosition = 'right';
					self::$att_paxTitleRotation = '-90';
					self::$att_paxTitleOpacity = 1;
					self::$att_paxLabelRotation = '0';
					self::$att_paxLabelPrefix = $paxprefix;
					self::$att_paxLabelSuffix = "%";
					self::$att_paxLabel000Separator = ',';
					self::$att_paxLabelDecimalSeparator = ".";
					self::$att_paxLabelDecimalPlaces = 0;
					self::$att_paxmin = $paxmin;
					self::$att_paxmax = 110;
					self::$att_paxMajorTicsDisplay = $paxmajorticsdisplay;
					self::$att_paxMajorTicsLength = $paxmajorticslength;
					self::$att_legendPosition = 'bottom';
					break;
				case "abc":
					self::$att_chartId = $id.uniqid('_abc_');
					self::$att_catType = 'category';
					self::$att_catKey = 'Item';
					self::$att_height = '600px';
					self::$att_series1Keys = "'aUsage','bUsage','cUsage'";
					self::$att_showMarkers = 1;
					self::$att_paxKeys = 'CumPercent';
					self::$att_catAxisTitle = self::$array_title[0];
					self::$att_catAxisLabelRotation = '-90';
					self::$att_catAxisMajorTicsDisplay = 'inside';
					self::$att_catAxisMajorTicsLength = '4';
					self::$att_vax1Title = self::$array_title[1];
					self::$att_paxTitle = 'Cumulative Percent Usage';
					self::$att_paxPosition = 'right';
					self::$att_paxTitleRotation = '-90';
					self::$att_paxTitleOpacity = 1;
					self::$att_paxLabelRotation = '0';
					self::$att_paxLabelPrefix = $paxprefix;
					self::$att_paxLabelSuffix = "%";
					self::$att_paxLabel000Separator = ',';
					self::$att_paxLabelDecimalSeparator = ".";
					self::$att_paxLabelDecimalPlaces = 0;
					self::$att_paxmin = $paxmin;
					self::$att_paxmax = 110;
					self::$att_paxMajorTicsDisplay = $paxmajorticsdisplay;
					self::$att_paxMajorTicsLength = $paxmajorticslength;
					self::$att_legendPosition = 'bottom';
					break;
				case "histogram":
					self::$att_chartId = $id.uniqid('_histogram_');
					self::$att_histBarColor = 'lime';							# <string> APPLIES TO:Histogram Bars
					self::$att_catType = 'category';
					self::$att_vax1Title = 'Frequency';
					self::$att_series1Keys = "'frequency'";
					self::$att_vax1Position = $vax1position;
					self::$att_vax1TitleRotation = (int) $vax1titlerotation;
					break;
			}

			if(!self::$att_catAxisTitle) self::$att_catAxisTitle=self::$array_keys[0];
			if(!self::$att_vax1Title) self::$att_vax1Title=self::$array_keys[1];

		#private
			self::$att_myDataValues = "myDataValues"."_".self::$att_chartId;
			self::$att_myStyles = "myStyles"."_".self::$att_chartId;
			self::$att_myAxes = "myAxes"."_".self::$att_chartId;
			self::$att_mySeries = "mySeries"."_".self::$att_chartId;
			self::$att_myTooltip = "myTooltip"."_".self::$att_chartId;
			self::$att_myLegend = "myLegend"."_".self::$att_chartId;

			if(self::$att_chartType === "abc"){
				$yuimagseven_script = "<div class = 'yui-wp-plugin yui-wp-plugin-wrapper yui3-skin-sam '>\n";
				$yuimagseven_script .= "<div id = '".self::$att_chartId."' class = 'yui-wp-charts yui3-skin-sam '> </div>\n";
				$yuimagseven_script .= "<div id = 'datatable_".self::$att_chartId."' class = 'yui-wp-datable yui3-skin-sam clearfix'> </div>\n";
				$yuimagseven_script .= "</div>\n";
			}else{
				$yuimagseven_script = "<div id = '".self::$att_chartId."' class = 'yui-wp-plugin yui-wp-charts yui3-skin-sam '> </div>\n";
			}


			self::add_yui_mag_seven_script();
		return $yuimagseven_script;
	}	
	
	function add_yui_mag_seven_script(){
		wp_enqueue_style( 'yui-plugins' );
		$my_chart_data_path = YUI_WIDGETS_PLUGIN_JSDATA_PATH;
		$my_file = YUI_WIDGETS_PLUGIN_JSDATA_PATH.self::$att_chartId.".js";
		$my_file_url = YUI_WIDGETS_PLUGIN_JSDATA_URL.self::$att_chartId.".js";
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file


		$data = "";
		$data .= "YUI({\n";    
		$data .= "	filter:'raw',\n"; 
		$data .= "	combine:false,\n"; 
    	$data .= "	modules:{\n";
        $data .= "		'datatable-footerview' : {\n";
        $data .= "		    requires: [ 'base-build', 'datatable-base', 'view' ]\n";
        $data .= "		}\n";
    	$data .= "	}\n";
		$data .= "}).use('node','node-core','event','charts-legend','gallery-markout','graphics','datatable', 'datatable-footerview', 'datatype',  function(Y){\n";


		if(self::$att_chartType === "abc"){
			$data .= "	Y.Get.js('".YUI_WIDGETS_PLUGIN_JS_URL."dt_footerview.js', function (err) {\n";
			$data .= "		if (err) {\n";
			$data .= "			return;\n";
			$data .= "		}\n";
			$data .= "	});\n";
		}

/* build chart Html */
		$data .= "	var oMychart = Y.one('#".self::$att_chartId."');\n";
		$data .= "	oMychart.addClass('clearfix');\n";
		$data .= "	var yMychart = Y.Markout(oMychart);\n";
		$data .= "	var yMyChartTitle = yMychart.h4({'class':'yui-chart-title clearfix'}).node();\n";
		$data .= "	Y.Markout(yMyChartTitle).text('".self::$att_chartTitle."');\n";
		$data .= "\n";
		$data .= "	var yMygraf = yMychart.div({\n";
		$data .= "		'class':'graf clearfix',\n";
		$data .= "		'id':'mygraf_".self::$att_chartId."',\n";
		$data .= "		style:{\n";
		$data .= "			'width':'".self::$att_width."',\n";
		$data .= "			'height':'".self::$att_height."',\n";
		$data .= "			'zIndex':0\n";
		$data .= "		}\n";
		$data .= "	}).node();\n";

/* Preparation for the Legend */
		if(self::$att_showLegend){
			$data .= "	var ";
			$data .= self::$att_myLegend;
			$data .= " = {\n";
			$data .= "	position: '".self::$att_legendPosition."',\n";
			$data .= "	width: 200,\n";
			$data .= "	height: 300,\n";
			$data .= "	styles: {\n";
			$data .= "		vAlign: 'top',\n";
			$data .= "		hAlign: 'left',\n";
			$data .= "		vSpacing: 8,\n";
			$data .= "		hSpacing: 100";
			if(self::$att_embedded) {
				$data .= ",\n";
				$data .= "		background: {\n";
				$data .= "			fill: {\n";
				$data .= "				color: '#EDF5FF'\n";
				$data .= "			},\n";
				$data .= "			border: {\n";
				$data .= "				color: '#5575CC',\n";
				$data .= "				weight: 1\n";
				$data .= "			}\n";
				$data .= "		}";
			}else{
				$data .= ",\n";
				$data .= "		background: {\n";
				$data .= "			fill: {\n";
				$data .= "				color: '".self::$att_bgColor."'\n";
				$data .= "			},\n";
				$data .= "			border: {\n";
				$data .= "				color: '".self::$att_borderColor."',\n";
				$data .= "				weight:".self::$att_borderWeight."\n";
				$data .= "			}\n";
				$data .= "		}";
			}
			$data .= "	}";
			$data .= "}\n\n";
		};

	/* Chart Data */
		$data .= "	var ";
		$data .= self::$att_myDataValues;
		$data .= " = ".indent(self::$att_JSONchartData).";\n";
		$data .= "\n";

		/* Chart Styles */
		/* _getDefaultStyles: */
/*
		{
			var defs = {
				background: {
					shape: "rect",
					fill:{
						color:"#faf9f2"
					},
					border: {
						color:"#dad8c9",
						weight: 1
					}
				}
			};
*/
			$data .= "	var ".self::$att_myStyles." = {\n";
			if(self::$att_chartType === "histogram"){
				$data .= "		series:{\n";
				$data .= "			frequency:{\n";
				$data .= "				marker:{\n";
				$data .= "					fill:{\n";
				$data .= "						width: 75\n";
				$data .= "					},\n";
				$data .= "					border:{\n";
				$data .= "						weight:1\n";
				$data .= "					},\n";
				$data .= "					width: 75\n";
				$data .= "				}\n";
				$data .= "			}\n";
				$data .= "		}\n";
				$data .= "	};\n";
				$data .= "\n";
			}else{
				$data .= "		graph:{\n";
				$data .= "			background:{\n";
				$data .= "			shape:'rect',\n";
				$data .= "				fill:{\n";
				$data .= "					color:'".self::$att_bgColor."',\n";
				$data .= "					alpha:'".self::$att_bgOpacity."'\n";
				$data .= "				},\n";
				$data .= "				border:{\n";
				$data .= "					color:'".self::$att_borderColor."',\n";
				$data .= "					weight:".self::$att_borderWeight."\n";
				$data .= "				}\n";
				$data .= "			}\n";
				$data .= "		}\n";
				$data .= "	};\n";
				$data .= "\n";
			}

		/* Define axes for the chart */
		/*
		1.  the horiz axis is set to the value of the category key
			the category key. The examole below also includes the
			minimal markup for a Cartesian grid (on which we render
			the scatter-plot):

			echo("
				var myAxes{
					".self::$att_catKey.":{
						keys:['".self::$att_catKey."'],
						position:'bottom',
						type:'numeric'
					},
					yAxis:{
						keys:['value'],
						position:'left',
						type:'numeric'
					}
				};
			");

		2.  the MarkerSeries chart will be instantiated with
			i.  categoryKey = self::$att_catKey
			ii. axes = self::$att_myAxes
		*/
/* Define category Axis */
		$data .= "	var ".self::$att_myAxes." = {\n";
		$data .= "		'".self::$att_catKey."':{\n";
		$data .= "			keys:['".self::$att_catKey."'],\n";
		$data .= "			position:'".self::$att_catAxisPosition."',\n";
		$data .= "			type:'".self::$att_catType."',\n";
		$data .= "			title:'".self::$att_catAxisTitle."',\n";

		if(self::$att_chartType === "markerseries"){
			$data .= "			alwaysShowZero:".self::$att_alwaysShowZero.",\n";
			if (self::$att_catmin) $data .= "			minimum:".self::$att_catmin.",\n";
			if (self::$att_catmax) $data .= "			maximum:".self::$att_catmax.",\n";
			$data .= "			labelFormat:{\n";
				if (self::$att_catLabelPrefix)
					$data .= "					prefix:'".self::$att_catLabelPrefix."',\n";
				if (self::$att_catLabel000Separator)
					$data .= "					thousandsSeparator:'".self::$att_catLabel000Separator."',\n";
				if (self::$att_catLabelDecimalPlaces)
					$data .= "					decimalSeparator:'".$att_catLabelDecimalSeparator."',\n";
				if (self::$att_catLabelDecimalPlaces)
					$data .= "					decimalPlaces:".self::$att_catLabelDecimalPlaces.",\n";
				if (self::$att_catLabelSuffix)
					$data .= "					suffix:'".self::$att_catLabelSuffix."'\n";
			$data .= "			},\n";
		}
		$data .= "			styles:{\n";
		$data .= "				majorTicks:{\n";
		$data .= "					display:'".self::$att_catAxisMajorTicsDisplay."'\n";
		$data .= "				},\n";
		$data .= "				label:{\n";
		$data .= "					rotation:".self::$att_catAxisLabelRotation.",\n";
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
		$data .= "					rotation:".self::$att_catAxisTitleRotation.",\n";
		$data .= "					alpha:".self::$att_catAxisTitleOpacity.",\n";
		$data .= "					fontSize:'90%',\n";
		$data .= "					letterSpacing:'1px',\n";
		$data .= "					margin:{top:10}\n";
		$data .= "				}\n";
		$data .= "			}\n";
		$data .= "		},\n";
/* Define series1 Axis */
		if((self::$att_chartType === "pareto")Or(self::$att_chartType === "abc")){
			$data .= "		Usage:{\n";
			$data .= "			keys:[".self::$att_series1Keys."],\n";
		}else{
			$data .= "		yAxis:{\n";
			$data .= "			keys:[".self::$att_series1Keys."],\n";
		}
		$data .= "			title:'".self::$att_vax1Title."',\n";
		$data .= "			type:'numeric',\n";
		if(self::$att_chartType === "xbar"){
			$data .= "			alwaysShowZero:".self::$att_alwaysShowZero.",\n";
		}
		if(self::$att_chartType === "rchart"){
			$data .= "			alwaysShowZero:".self::$att_alwaysShowZero.",\n";
		}
		$data .= "			position:'".self::$att_vax1Position."',\n";
		if (self::$att_vax1min) $data .= "			minimum:".self::$att_vax1min.",\n";
		if (self::$att_vax1max) $data .= "			maximum:".self::$att_vax1max.",\n";
		$data .= "			labelFormat:{\n";
		if (self::$att_vax1LabelPrefix)
			$data .= "					prefix:'".self::$att_vax1LabelPrefix."',\n";
		if (self::$att_vax1Label000Separator)
			$data .= "					thousandsSeparator:'".self::$att_vax1Label000Separator."',\n";
		if (self::$att_vax1LabelDecimalSeparator)
			$data .= "					decimalSeparator:'".self::$att_vax1LabelDecimalSeparator."',\n";
		$data .= "					decimalPlaces:".self::$att_vax1LabelDecimalPlaces.",\n";
		if (self::$att_vax1LabelSuffix)
			$data .= "					suffix:'".self::$att_vax1LabelSuffix."'\n";
		$data .= "			},\n";
		$data .= "			styles:{\n";
		$data .= "				majorTicks:{\n";
		$data .= "					display:'".self::$att_vax1MajorTicsDisplay."'\n";
		$data .= "				},\n";
		$data .= "				label:{\n";
		$data .= "					rotation:".self::$att_vax1LabelRotation.",\n";
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
		$data .= "					rotation:".self::$att_vax1TitleRotation.",\n";
		$data .= "					alpha:".self::$att_vax1TitleOpacity.",\n";
		$data .= "					fontSize:'90%',\n";
		$data .= "					letterSpacing:'1px',\n";
		$data .= "					margin:{right:0,left:0,top:5,bottom:5}\n";
		$data .= "				}\n";
		$data .= "			}\n";
		$data .= "		}";
/* Define Pareto Right Axis */
		if((self::$att_chartType === "pareto")Or(self::$att_chartType === "abc")){
			$data .= "		,\n";
			$data .= "		CumPercent:{\n";
			$data .= "			title:'".self::$att_paxTitle."',\n";
			$data .= "			type:'numeric',\n";
			$data .= "			position:'right',\n";
			$data .= "			keys:['".self::$att_paxKeys."'],\n";
			if (self::$att_paxmin) $data .= "			minimum:".self::$att_paxmin.",\n";
			if (self::$att_paxmax) $data .= "			maximum:110,\n";
			$data .= "			labelFormat:{\n";
			$data .= "					decimalSeparator:'".self::$att_paxLabelDecimalSeparator."',\n";
			$data .= "					decimalPlaces:0,\n";
			$data .= "					suffix:'".self::$att_paxLabelSuffix."'\n";
			$data .= "			},\n";
			$data .= "			styles:{\n";
			$data .= "				majorTicks:{\n";
			$data .= "					display:'".self::$att_paxMajorTicsDisplay."'\n";
			$data .= "				},\n";
			$data .= "				label:{\n";
			$data .= "					rotation:".self::$att_paxLabelRotation.",\n";
			if(self::$att_embedded) $data .= "					color:'#444',\n";
			$data .= "				},\n";
			$data .= "			  majorUnit:{count:12},\n";
			$data .= "			  roundingUnit:10,\n";
			$data .= "				title:{\n";
			if(self::$att_embedded) {
				$data .= "					color:'#152057',\n";
				$data .= "					fontWeight:700,\n";
			}else{
				$data .= "					color:'#095275',\n";
				$data .= "					fontWeight:500,\n";
			}
			$data .= "					rotation:".self::$att_paxTitleRotation.",\n";
			$data .= "					alpha:".self::$att_paxTitleOpacity.",\n";
			$data .= "					fontSize:'90%',\n";
			$data .= "					letterSpacing:'1px',\n";
			$data .= "					margin:{right:0,left:5,top:5,bottom:5}\n";
			$data .= "				}\n";
			$data .= "			}\n";
			$data .= "		}\n";
			$data .= "	};\n";
		}else{
			$data .= "	};\n";
		}
/* Missing: Series2 Axis */
/* Define series for the Pareto chart */
		if(self::$att_chartType === "pareto"){
			$data .= "	var ".self::$att_mySeries." = [\n";
			$data .= "		{type:'column', yKey:'Usage', yDisplayName:'".self::$att_vax1Title."', xDisplayName:'".self::$att_catAxisTitle."'},\n";
			$data .= "		{type:'combo', yKey:'".self::$att_paxKeys."', yDisplayName:'".self::$att_paxTitle."', xDisplayName:'".self::$att_catAxisTitle."'}\n";
			$data .= "	];\n";
		}
/* Define series for the abc chart */
		if(self::$att_chartType === "abc"){
			$data .= "	var ".self::$att_mySeries." = [\n";
			$data .= "		{yKey:'aUsage', yDisplayName:'A Items', xDisplayName:'".self::$att_catAxisTitle."'},\n";
			$data .= "		{yKey:'bUsage', yDisplayName:'B Items', xDisplayName:'".self::$att_catAxisTitle."'},\n";
			$data .= "		{yKey:'cUsage', yDisplayName:'C Items', xDisplayName:'".self::$att_catAxisTitle."'},\n";
			$data .= "		{type:'combo', yKey:'".self::$att_paxKeys."', yDisplayName:'".self::$att_paxTitle."', xDisplayName:'".self::$att_catAxisTitle."'}\n";
			$data .= "	];\n";
		}
/* Define series for the MarkerSeries chart with a trendline*/
		if((self::$att_chartType === "markerseries")And(self::$att_trendLine)){
			$data .= "	var ".self::$att_mySeries." = [\n";
			$data .= "		{type:'markerseries', yKey:'".self::$array_keys[1]."', yDisplayName:'".self::$att_vax1Title."', xDisplayName:'".self::$att_catAxisTitle."'},\n";
			$data .= "		{type:'combo',  showLines:true,showMarkers:false,  yKey:'Trend', yDisplayName:'Trend', xDisplayName:'".self::$att_catAxisTitle."'}\n";
			$data .= "	];\n";
		}
/* Define series for the xbar and R charts*/
		if((self::$att_chartType === "xbar")Or(self::$att_chartType === "rchart")){
			$data .= "	var ".self::$att_mySeries." = [\n";
			$data .= "		{type:'combo', showMarkers:true, yKey:'".self::$array_keys[1]."', yDisplayName:'".self::$array_keys[1]."', xDisplayName:'".self::$att_catAxisTitle."',styles: {line:{weight:3,alpha:1}, marker: { shape: 'circle', fill:{weight:1,alpha:0.8},over:{width:12,height:12},width:8,height:8 },width:12,height:12 } },\n";
			$data .= "		{type:'combo', showMarkers:false, yKey:'".self::$array_keys[2]."', yDisplayName:'".self::$array_keys[2]."', xDisplayName:'".self::$att_catAxisTitle."',styles: {line:{color:'#000',weight:3,alpha:1} } },\n";
			$data .= "		{type:'combo', showMarkers:false,   yKey:'".self::$array_keys[3]."', yDisplayName:'".self::$array_keys[3]."', xDisplayName:'".self::$att_catAxisTitle."',styles: {line:{color:'#800000',weight:3,alpha:1} } },\n";
			$data .= "		{type:'combo',  showMarkers:false,  yKey:'".self::$array_keys[4]."', yDisplayName:'".self::$array_keys[4]."', xDisplayName:'".self::$att_catAxisTitle."',styles: {line:{color:'#800000',weight:3,alpha:1} } },\n";
			$data .= "	];\n";
		}

/* Define tooltip for the chart */
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
		$data .= "	};\n\n";

		$data .= "	Y.on('available',function() {\n";
/* Declare the chart */
		$data .= "		var myChart = new Y.Chart({\n";

			/* for a abc chart */
			if(self::$att_chartType === 'abc'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			type:'column',\n";
				$data .= "			stacked:true,\n";
				$data .= "			categoryKey:'Item',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesCollection:".self::$att_mySeries.",\n";
				$data .= "			styles:".self::$att_myStyles.",\n";
				$data .= "			showMarkers:".self::$att_showMarkers.",\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for a pareto chart */
			if(self::$att_chartType === 'pareto'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			categoryKey:'Item',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesCollection:".self::$att_mySeries.",\n";
				$data .= "			styles:".self::$att_myStyles.",\n";
				$data .= "			showMarkers:".self::$att_showMarkers.",\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for a cartesian chart */
			if(self::$att_chartType === 'markerseries'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			categoryKey:'".self::$att_catKey."',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";

				if (self::$att_trendLine){
					$data .= "			seriesCollection:".self::$att_mySeries.",\n";
					$data .= "			showLines:1,\n";
				}else{
					$data .= "			type:'".self::$att_chartType."',\n";
					$data .= "			seriesKeys:[".self::$att_series1Keys."],\n";
				}
				$data .= "			styles:".self::$att_myStyles.",\n";
				if(self::$att_horizontalGridlines)
					$data .= "			horizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } },\n";
				if(self::$att_verticalGridlines)
					$data .= "			verticalGridlines:{styles:{ line:{ color:'".self::$att_verticalGridlinesColor."'} } },\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for a histogram */
			if(self::$att_chartType === 'histogram'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			type:'column',\n";
				$data .= "			categoryKey:'".self::$att_catKey."',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesKeys:[".self::$att_series1Keys."],\n";

				$data .= "			styles:".self::$att_myStyles.",\n";
				$data .= "			showMarkers:".self::$att_showMarkers.",\n";
				if(self::$att_horizontalGridlines)
					$data .= "			horizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } },\n";
				if(self::$att_verticalGridlines)
					$data .= "			verticalGridlines:{styles:{ line:{ color:'".self::$att_verticalGridlinesColor."'} } },\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for a combo chart */
			if(self::$att_chartType === 'combo'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			type:'".self::$att_chartType."',\n";
				$data .= "			categoryKey:'".self::$att_catKey."',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesKeys:[".self::$att_series1Keys."],\n";

				$data .= "			styles:".self::$att_myStyles.",\n";
				if(self::$att_horizontalGridlines)
					$data .= "			horizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } },\n";
				if(self::$att_verticalGridlines)
					$data .= "			verticalGridlines:{styles:{ line:{ color:'".self::$att_verticalGridlinesColor."'} } },\n";
				$data .= "			showMarkers:".self::$att_showMarkers.",\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for an xBar chart */
			if(self::$att_chartType === 'xbar'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			type:'combo',\n";
				$data .= "			categoryKey:'".self::$att_catKey."',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesCollection:".self::$att_mySeries.",\n";

				$data .= "			styles:".self::$att_myStyles.",\n";
				if(self::$att_horizontalGridlines)
					$data .= "			horizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } },\n";
				if(self::$att_verticalGridlines)
					$data .= "			verticalGridlines:{styles:{ line:{ color:'".self::$att_verticalGridlinesColor."'} } },\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}

			/* for an R chart */
			if(self::$att_chartType === 'rchart'){
				$data .= "			dataProvider:".self::$att_myDataValues.",\n";
				$data .= "			type:'combo',\n";
				$data .= "			categoryKey:'".self::$att_catKey."',\n";
				$data .= "			axes:".self::$att_myAxes.",\n";
				$data .= "			seriesCollection:".self::$att_mySeries.",\n";

				$data .= "			styles:".self::$att_myStyles.",\n";
				$data .= "			showMarkers:0,\n";
				if(self::$att_horizontalGridlines)
					$data .= "			horizontalGridlines:{ styles:{ line:{ color:'".self::$att_horizontalGridlinesColor."'} } },\n";
				if(self::$att_verticalGridlines)
					$data .= "			verticalGridlines:{styles:{ line:{ color:'".self::$att_verticalGridlinesColor."'} } },\n";
				$data .= "			legend:".self::$att_myLegend.",\n";
				$data .= "			tooltip: ".self::$att_myTooltip."\n";
			}
		$data .= "		});\n\n";

/*	Draw the chart */
		if(self::$att_embedded){
			$data .= "		renderIntoTabview_".self::$att_TabSet."(myChart, '#mygraf_".self::$att_chartId."', ".self::$att_tabIndex.");\n";
		}else{
			$data .= "		myChart.render(yMygraf);\n";
		}
		if((self::$att_chartType === "pareto")Or(self::$att_chartType === "abc")){
			$data .= "		Y.one('#mygraf_".self::$att_chartId."').all('span.axisLabel').each(function(node) {\n";
			$data .= "			if (node.get('parentNode').hasClass('yui3-categoryaxis-content')) {\n";
			$data .= "				node.setStyles({'whiteSpace':'normal'/*,'width':'200px'*/});\n";
			$data .= "			}\n";
			$data .= "		});\n";
			$data .= "		Y.one('#mygraf_".self::$att_chartId."').all('span.axisLabel').each(function(node) {\n";
			$data .= "			if (node.get('text') === '110%') {\n";
			$data .= "				node.remove();\n";
			$data .= "			}\n";
			if (self::$att_vax1LabelPrefix){
				$data .= "			if (node.get('text') === '".self::$att_vax1LabelPrefix.round(self::$att_vax1max,self::$att_vax1LabelDecimalPlaces)."') {\n";
				$data .= "				node.remove();\n";
				$data .= "			}\n";
			} elseif (self::$att_vax1LabelSuffix){
				$data .= "			if (node.get('text') === '".round(self::$att_vax1max,self::$att_vax1LabelDecimalPlaces).self::$att_catLabelSuffix."') {\n";
				$data .= "				node.remove();\n";
				$data .= "			}\n";
			} elseif (self::$att_vax1LabelPrefix && self::$att_vax1LabelSuffix){
				$data .= "			if (node.get('text') === '".self::$att_vax1LabelPrefix.round(self::$att_vax1max,self::$att_vax1LabelDecimalPlaces).self::$att_vax1LabelSuffix."') {\n";
				$data .= "				node.remove();\n";
				$data .= "			}\n";
			} else {
				$data .= "			if (node.get('text') === '".round(self::$att_vax1max,self::$att_vax1LabelDecimalPlaces)."') {\n";
				$data .= "				node.remove();\n";
				$data .= "			}\n";
			}
			$data .= "		});\n";
		}

		$data .= "	},'#mygraf_".self::$att_chartId."',oMychart);\n\n";


		if(self::$att_chartType === "abc"){
			//build DataTable Html
			$data .= "	var datatableId = '#datatable_".self::$att_chartId."';\n";
			
			$data .= "	var oMyDataTable=Y.one('#datatable_".self::$att_chartId."');\n";
			list ($a, $b) = csv_to_JSON(self::$att_abcTableData,self::$att_delimiter);
			$datatable_JSONrows = indent($b);

	    	$data .= "	var fmtPct2 = function(o) {\n";
    		$data .= "	    return Y.DataType.Number.format( o.value, { decimalPlaces:2, suffix:'%'} );\n";
    		$data .= "	}\n";

    		$data .= "	var fmtBold = function(o) {\n";
    		$data .= "	    var ndec = ( o.column.ndec ) ? o.column.ndec : 0;\n";
    		$data .= "	    return Y.DataType.Number.format( o.value, {thousandsSeparator:',', decimalPlaces:ndec} );\n";
    		$data .= "	}\n";

			$data .= "	var myDataTableCols_".self::$att_chartId." =\n";
			$data .= "		[\n";
				$data .= "			{ key: 'Division', label: 'Division', width: '75px', className:'align-right', allowHTML: true},\n";
				$data .= "			{ key: 'percItems', label:'% Items', width: '75px', formatter:fmtPct2 , className:'align-right', allowHTML: true},\n";
				$data .= "			{ key: 'percUsage', label:'% Usage', width: '75px', formatter:fmtPct2 , className:'align-right', allowHTML: true}\n";
			$data .= "		];\n\n";

			// DataTable Data
			$data .= "	var myDataTableValues_".self::$att_chartId." = ".$datatable_JSONrows.";\n";

					$data .= "	Y.on('available',function() {\n";
						$data .= "	var myLegendLeft= oMychart.one('div.yui3-chartlegend').getComputedStyle('left');\n";
						$data .= "	myLegendLeft= (parseInt(myLegendLeft)+20).toString()+'px';\n";
						$data .= "	oMyDataTable.addClass('clearfix').setStyles({'marginLeft':myLegendLeft});\n";
						// DataTable
						$data .= "		var table = new Y.DataTable({\n";
						$data .= "			columns: myDataTableCols_".self::$att_chartId.",\n";
						$data .= "			data: myDataTableValues_".self::$att_chartId.",\n";
 						$data .= "			caption:'Pareto Table',\n";
						$data .= "			footerView:   Y.FooterView, \n";
						$data .= "			footerConfig: {\n";
						$data .= "				fixed:   true,\n";
						$data .= "				heading: {\n";
						$data .= "					colspan: 1,\n";
						$data .= "					content: 'Totals:  ',\n";
						$data .= "					className: 'align-right'\n";
						$data .= "				},\n";
						$data .= "				columns: [\n";
           				$data .= "					{ key:'percItems',  content:'{SUM}', className:'align-right', formatter:fmtPct2 },\n";
           				$data .= "             		{ key:'percUsage',  content:'{SUM}', className:'align-right', formatter:fmtPct2 }\n";
            			$data .= "              ]\n";
            			$data .= "          }\n";
						$data .= "		});";
						$data .= "		table.render(datatableId);\n";
					$data .= "	},datatableId,oMyDataTable);\n";
				}
		
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
