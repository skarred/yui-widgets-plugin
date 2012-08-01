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
			title='Weekday Taxes'  
			type='pie'  
			cataxistitle='Month'  
			valueaxis1title='Sales'  
			valueaxis1prefix = '$'  
			filename = 'pieChart.csv'  
			showlegend = 1  
			position = 'right'  
		]  

2.  A Multiple Series Chart  

		[yuichart  
			title='Five-Year Sales by Month'  
			cataxistitle='Month'  
			valueaxis1title='Sales'  
			valueaxis1prefix = '$'  
			filename = 'seriesChart.csv'  
			valueaxis1decimalplaces = 0  
			showmarkers = 1  
			showlegend = 1  
			position = 'right'  
			hgridlines= 1  
			vgridlines= 1  
		]  

####Notes:  
To display a leged  

+  set showlegend to 1  
+  set position to 'top', 'bottom', left', or 'right'  

the default position is 'right'

###The yuidatatable Shortcode  
####A Sortable DataTable  

		[yuidatatable  
			filename = 'test3.csv'  
			caption='Multiple-Series Data Table'  
			sortable=1  
		]  

###The yuitabview Shortcode
1.  A Simple example with HTML markup  

		[yuitabview]  
			[yuitab title='But I Must Explain']  
				<h2>But I Must Explain</h2>
				<p>Sed ut perspiciatis unde ...</p	 
			[/yuitab]  
			[yuitab title='Sed Ut Pespiciatis']  
				<h2>Sed Ut Pespiciatis</h2>
				<p>But I must explain to you how all this mistaken...</p	 
			[/yuitab]  
			[yuitab title='On the other Hand']  
				<h2>On the other Hand</h2>
				<p>At vero eos et accusamus et iusto odio...</p	 
			[/yuitab]  
		[/yuitabview]  

2.  In this example, tabs contain charts and DataTables  

		[yuitabview]  
			[yuitab title="But I Must Explain"]  
				<h2>But I Must Explain</h2	 
				<p>Sed ut perspiciatis unde omnis...</p	 
			[/yuitab]  
			[yuitab title="Weekday Taxes"]   
				[yuichart  
				embed = 1   
				index = 1  
				type='pie'  
				filename = 'pieChart.csv'  
				...  
				]  
			[/yuitab]  
			[yuitab title="Five-Year Sales by Month"]   
				[yuichart]  
				embed = 1   
				index = 2  
				title='Five-Year Sales by Month'  
				filename = 'seriesChart.csv'  
				showmarkers = 1  
				...  
				]  
			[/yuitab]  
			[yuitab title="Five-Year Sales by Month Data"]  
				[yuidatatable  
				filename = 'tableData.csv'  
				caption='Multiple-Series Data Table'  
				sortable=1  
				]  
			[/yuitab]  
		[/yuitabview]  

####Notes:
When embedding a chart widget inside a tab panel, the following shortcode attributes must be set as follows:  

1.  embed = 1  
2.  index = x  

where x is the index of the tab in which the chart is embedded. Indices begin with 0 for the first tab, then 1, 2, etc...
