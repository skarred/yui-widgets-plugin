<?php
global $yui_TabView_tabcount, $yui_TabView_tabs, $yui_tab_id, $renderIntoTabview, $handlerArray;
$yui_TabView_tabcount = 0;

class YUI_TabView_Plugin{
	# 
	# Private
	# 
	static $att_TabViewID;
	
	function yuitabs_shortcode($atts,$content)
	{
		global $yui_TabView_tabcount, $post, $yui_TabView_tabs, $yui_tab_id, $renderIntoTabview, $handlerArray;
		extract(shortcode_atts(array(
			'title' => null,
		), $atts));
		
		ob_start();
	
		if($title):
			$yui_TabView_tabs[] = array( 
				"title" => $title, 
				"id" => ereg_replace("[^A-Za-z0-9]", "", $title)."-".$yui_TabView_tabcount
			 );
			?><div id="<?php echo ereg_replace("[^A-Za-z0-9]", "", $title)."-".$yui_TabView_tabcount; ?>" >
				
				<?php echo do_shortcode( $content ); ?>
			
			</div>
			
			<?php
		elseif($post->post_title):
			$yui_TabView_tabs[] = array( 
				"title" => $post->post_title, 
				"id" => ereg_replace("[^A-Za-z0-9]", "", $post->post_title)."-".$yui_TabView_tabcount
			 );
			?>
			<div id="<?php echo ereg_replace('[^A-Za-z0-9]', '', $post->post_title).'-'.$yui_TabView_tabcount; ?>" >
			
				<?php echo do_shortcode( $content ); ?>
				
			</div>
			
			<?php
		else:
			?>
			<span style="color:red">Please enter a title attribute like [tab title="title name"]tab content[tab]</span>
			<?php 	
		endif;
		$yui_TabView_tabcount++;
		return ob_get_clean();
	}



	function yuitabview_shortcode( $attr, $content )
	{
		// wordpress function 
	
		global $yui_TabView_tabcount,$post, $yui_TabView_tabs, $yui_tab_id, $renderIntoTabview, $handlerArray;
	

		YUI_Widgets_Plugin::$add_script= true;

		// $attr['disabled'] =	 (bool)$attr['disabled'];
		$id = uniqid('yuiwidget_yuitabview_');
		$yui_tab_id = $id;
		self::$att_TabViewID=$id;
		$renderIntoTabview = "renderIntoTabview_".$id;
		$handlerArray = "handlerArray_".$id;
	
		ob_start();
		?>
		<div id="<?php echo $id ?>" class="yui3-skin-sam yui-wp-tabview"><?php
		
				$content = (substr($content,0,6) =="<br />" ? substr( $content,6 ): $content);
				$content = str_replace("]<br />","]",$content);
				$contentr = str_replace("[yuichart","[yuichart tabset='".self::$att_TabViewID."'",$content);
				$str = do_shortcode( $contentr ); ?>
				
				<ul>
				<?php
				foreach( $yui_TabView_tabs as $li_tab ): 
			
				?>
					<li><a href="#<?php echo $li_tab['id']; ?>"><?php echo $li_tab['title']; ?></a></li>
				<?php 
				endforeach;
			
			
				
				?>
				
				</ul>
				<div>
				<?php echo $str; ?>
				</div>
			</div>

		<?php
		wp_enqueue_style( 'yui-plugins' );

		$my_tabview_data_path = YUI_WIDGETS_PLUGIN_JSDATA_PATH;
		$my_file = YUI_WIDGETS_PLUGIN_JSDATA_PATH.$id.".js";
		$my_file_url = YUI_WIDGETS_PLUGIN_JSDATA_URL.$id.".js";
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file

		$data = "";
		$data .= "var ".$renderIntoTabview.", ".$handlerArray." = [];";
		$data .= "YUI().use('tabview',function(Y){\n";
		//$data .= "	Y.Get.css([{url:'".YUI_WIDGETS_PLUGIN_CSS_URL."yui_plugins.css'}])\n";
		//build DataTable Html
		$data .= "	var oMyTabView=Y.one('#".$id."');\n";
		$data .= "	oMyTabView.addClass('clearfix');\n";
		$data .= "	Y.on('available',function() {\n";
		$data .= "		var ".self::$att_TabViewID." = new Y.TabView({srcNode:'#".$id."'}).render();\n";

		$data .= "		".$renderIntoTabview." = function(chart, node, index)\n";
		$data .= "		{\n";
		$data .= "			if(".self::$att_TabViewID.".item(index) === ".self::$att_TabViewID.".get('selection'))\n";
		$data .= "			{\n";
		$data .= "				chart.render(node);\n";
		$data .= "			}\n";
		$data .= "			else\n";
		$data .= "			{\n";
		$data .= "				".$handlerArray."[index] = ".self::$att_TabViewID.".item(index).after('tab:selectedChange', function(e) {\n";
		$data .= "					if(".self::$att_TabViewID.".item(index) === ".self::$att_TabViewID.".get('selection'))\n";
		$data .= "					{\n";
		$data .= "						chart.render(node);\n";
		$data .= "						".$handlerArray."[index].detach();\n";
		$data .= "					}\n";
		$data .= "				});\n";
		$data .= "			}\n";
		$data .= "		}\n";
		$data .= "	},'#".$id."',oMyTabView);\n";

		$data .= "});\n";

		fwrite($handle, $data);
		fclose($handle);

		//wp_enqueue_script( $id.'_script', $my_file_url, array('yui-min'), null,true );
		//echo("<script type='text/javascript' src=$my_file_url></script>");
		wp_enqueue_script( $id.'_script', $my_file_url, array('yui-min'), null,true );

		$post_content = ob_get_clean();
	
		$yui_TabView_tabs = array();
		return str_replace("\r\n", '',$post_content);
	}


}
?>
