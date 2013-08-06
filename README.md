# yui-widgets-plugin

With this WordPress Plugin, users can add YUI widgets to their posts and pages.

##Supported YUI Widgets  
+  Charts  
   +  Pie charts  
   +  Multiple series charts  
   +  supports    
      +  legend  
      +  markers  
      +  customization  
+  DataTables  
   +  Sortable  
+  TabView  
   +  HTML markup in tab panels  
   +  Chart and DataTable widgets in tab panels  


##Use shortcodes to add a widget to your post  
###Available Shortcodes  
+  [yuichart]  
+  [yuidatatable]  
+  [yuitabview][yuitab title='Tab1']...[/yuitab][yuitab title='Tab2']...[/yuitab][/yuitabview]  

##Examples  
###The yuichart Shortcode  
1.  A Pie Chart  

		[yuichart  
			title = 'Weekday Taxes'  
			type = 'pie'  
			filename = 'pieChart.csv'  
			showlegend = 1  
		]  

    The rendered YUI3 pie chart can be viewed [here](http://karalli.net/archives/yui-pie-chart/).

2.  A Multiple Series Chart  

  		[yuichart  
	  		title = 'Five-Year Sales by Month'
		    	filename = 'test3.csv'
		    	type = 'combo'
		    	categorytype = 'category'
		    	cataxtitle = 'Month'
		    	catlabelrotation = '0'
		    	vax1title = 'Sales'
		    	vax1labelrotation = '0'
		    	vax1prefix = '\$'
		    	vax1suffix = '  '
		    	vax1decimalplaces = 0
		    	showareafill = 1
		    	showlines = 1 
		      	showmarkers = 1
		      	showlegend = 1
		      	hgridlines= 1
		      	vgridlines= 1
  	      	]  

    The rendered YUI3 combo chart can be viewed [here](http://karalli.net/archives/yui-charts/).

3. A Scatter Plot

		[yuichart
		      	title = 'Ice Cream Sales vs Temperature °F'
		      	filename = 'scatter.csv'
		      	type = 'marker'
		      	categorytype = 'numeric'
		      	cataxtitle = 'Temperature'
		      	alwaysShowZero = 0
		      	catmin = 50
		      	catmax = 120
		      	catdecimalplaces = 0
		      	catlabelrotation = '-90'
		      	catlabelsuffix = ' °F'
		      	vax1min = 110
		      	vax1max = 420
		      	vax1title='Ice Cream Sales'
		      	vax1labelrotation = '0'
		      	vax1prefix = '\$'
		      	vax1decimalplaces = 2 
		      	showlines = 0 
		      	showmarkers = 1
		      	showareafill = 0 
		      	showlegend = 1
		      	hgridlines = 1
		      	vgridlines = 1
		]

    The rendered YUI3 scatter plot can be viewed [here](http://karalli.net/archives/yui-charts/).

####Notes:  
To display a legend  

+  set showlegend to 1  
+  set position to 'top', 'bottom', left', or 'right'  

the default position is 'right'

###The yuidatatable Shortcode  
####A Sortable DataTable  

		[yuidatatable  
			filename = 'test3.csv'  
			caption = 'Multiple-Series Data Table'  
			sortable = 1  
		]  

The rendered YUI3 DataTable can be viewed [here](http://karalli.net/archives/yui-datatable/).

###The yuitabview Shortcode
1.  A Simple example with HTML markup  

		[yuitabview]  
			[yuitab title='But I Must Explain']  
				<h2>But I Must Explain</h2>
				<p>Sed ut perspiciatis unde ...</p>	 
			[/yuitab]  
			[yuitab title='Sed Ut Pespiciatis']  
				<h2>Sed Ut Pespiciatis</h2>
				<p>But I must explain to you how all this mistaken...</p>	 
			[/yuitab]  
			[yuitab title='On the other Hand']  
				<h2>On the other Hand</h2>
				<p>At vero eos et accusamus et iusto odio...</p>	 
			[/yuitab]  
		[/yuitabview]  

    The rendered YUI3 TabView can be viewed [here](http://karalli.net/archives/yui-tabview/).


2.  In this example, tabs contain charts and DataTables  

		[yuitabview]  
			[yuitab title="But I Must Explain"]  
				<h2>But I Must Explain</h2	 
				<p>Sed ut perspiciatis unde omnis...</p>	 
			[/yuitab]  
			[yuitab title="Weekday Taxes"]   
				[yuichart  
				embed = 1   
				index = 1  
				type = 'pie'  
				filename = 'pieChart.csv'  
				...  
				]  
			[/yuitab]  
			[yuitab title="Five-Year Sales by Month"]   
				[yuichart]  
				embed = 1   
				index = 2  
				title = 'Five-Year Sales by Month'  
				filename = 'seriesChart.csv'  
				showmarkers = 1  
				...  
				]  
			[/yuitab]  
			[yuitab title = "Five-Year Sales by Month Data"]  
				[yuidatatable  
				filename = 'tableData.csv'  
				caption = 'Multiple-Series Data Table'  
				sortable = 1  
				]  
			[/yuitab]  
		[/yuitabview]  

    The rendered YUI3 TabView with enbedded YUI3 widgets can be viewed [here](http://karalli.net/archives/yui-tabs-2/).

####Notes:
When embedding a chart widget inside a tab panel, the following shortcode attributes must be set as follows:  

1.  embed = 1  
2.  index = x  

where x is the index of the tab in which the chart is embedded. Indices begin with 0 for the first tab, then 1, 2, etc...

###Shortcode for Specialized Charts
1.  A Pareto Chart
			
		[magseven 
			title = 'Pareto Chart' 
			type = 'pareto'	
			filename = 'pareto.csv'
			showlegend = 1
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).
	
2.  ABC Analysis

		[magseven 
			title = 'ABC Analysis' 
			type = 'abc'
			filename = 'pareto.csv'
			showlegend = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).

3.  A Histogram

		[magseven 
			title = 'Average SAT Math Score' 
			type = 'histogram'
		        bins = 6
			filename = 'histogram.csv'
			showlegend = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).

4.  A MarkerSeries Chart or Scatter-Plot

		[magseven 
			title = 'Study Hours vs. Exam Scores' 
			filename = 'scatter2.csv'
			type = 'marker'
			categorytype = 'numeric'
			cataxtitle = 'Study Hours' 
			alwaysShowZero = 1 
			catmax = 9
			catdecimalplaces = 1 
			catlabelrotation = '-90' 
			vax1decimalplaces = 0  
			vax1title = 'Exam Score' 
			vax1labelrotation = '0' 
			vax1min = 30 
			vax1max = 110
			showlegend = 1 
			hgridlines = 1 
			vgridlines = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).
		
5.  A MarkerSeries Chart with an Added Trenline

		[magseven 
			title = 'Ice Cream Sales vs. Temperature °F' 
			filename = 'scatter.csv'
			type = 'marker'
			trendline = 1
			categorytype = 'numeric'
			cataxtitle = 'Temperature' 
			alwaysShowZero = 0
			catmin = 60
			catmax = 110
			catdecimalplaces = 0 
			catlabelrotation = '-90' 
			catlabelsuffix = ' °F'
			vax1min = 110 
			vax1max = 400
			vax1title = 'Ice Cream Sales' 
			vax1labelrotation = '0' 
			vax1prefix = '\$' 
			vax1decimalplaces = 2  
			showlegend = 1 
			hgridlines = 1 
			vgridlines = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).
     
6.  An Xbar Control Chart

		[magseven 
			title = 'xBar Chart' 
			type = 'xbar'
			filename = 'control.csv'
			alwaysShowZero = 0 
			catdecimalplaces = 1 
			catlabelrotation = '-90' 
			showlines = 0  
			showmarkers = 0
			showareafill = 0 
			showlegend = 1 
			hgridlines = 1 
			vgridlines = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).

7.  An R Control Chart

		[magseven 
			title = 'R Chart' 
			type = 'rchart'
			filename = 'control.csv'
			alwaysShowZero = 0 
			catdecimalplaces = 1 
			catlabelrotation = '-90' 
			showlines = 0  
			showmarkers = 0
			showareafill = 0 
			showlegend = 1 
			hgridlines = 1 
			vgridlines = 1 
		]

     The rendered Pareto Chart can be viewed [here](http://karalli.net/archives/yui-special-charts/).
