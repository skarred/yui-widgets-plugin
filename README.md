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
			filename = 'pieChart.csv'  
			showlegend = 1  
		]  

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
