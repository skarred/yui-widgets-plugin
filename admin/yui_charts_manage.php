<?php
    if(!current_user_can('manage_options')) {
	    die('Access Denied');
    }
    ?>
<div style="text-align:center">
<img src="<?php echo plugins_url( '/images/', __FILE__ ) ?>Screenshot1.png" alt="YUI Charts Plugin for WordPress" title="yui-charts" width="672" height="535" class="size-thumbnail wp-image-4163" />
<div>
<?php
    ?>

