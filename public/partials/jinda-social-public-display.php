<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.jindatheme.com
 * @since      1.0.0
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/public/partials
 */
?>

<?php 
	$options = get_option($this->plugin_name); 
	if ($options['facebook-page-url'] == ""){
		$link = "https://www.facebook.com/jindatheme";
	}else{
		$link = $options['facebook-page-url'];
	}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<style>
<?php if (isset($options['button-color'])) { ?>
	#jinda-close-button{ background-color: <?php echo $options['button-color']; ?>;}
<?php } ?>
<?php if (isset($options['lightbox-color'])) { ?>
	#jinda-close-button{ color: <?php echo $options['lightbox-color']; ?>;}
<?php } ?>
<?php if (isset($options['override-css'])) { ?>
	<?php echo $options['override-css']; ?>
<?php } ?>

</style>

<!-- facebook SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=564475063661430";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- facebook SDK -->

<div class="jinda-wrapper">
	<div class="jinda-overlay-background">		
	</div>
	<div class="jinda-content-block">
		<p class="jinda-content-before-text"><?php echo $options['text-before'] ?></p>
		<div class="jinda-facebook-like-box">
			<script>
				var pluginSize = 0;
				if ( jQuery(window).width() < 480 ){ pluginSize = 260 }
				else if ( jQuery(window).width() < 768 ){ pluginSize = 420 }
				else { pluginSize = 500 }
				document.write('<div class="fb-page" data-href="<?php echo $link ?>" data-width="'+pluginSize+'" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"></div></div>');
			</script>
		</div>
		<p class="jinda-content-after-text"><?php echo $options['text-after'] ?></p>
		<a href="#" id="jinda-close-button">CLOSE</a>
	</div>
</div>