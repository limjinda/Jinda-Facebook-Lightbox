<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.jindatheme.com
 * @since      1.0.0
 *
 * @package    Jinda_Social
 * @subpackage Jinda_Social/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<h2><i class="dashicons dashicons-images-alt2"></i> <?php echo esc_html(get_admin_page_title()); ?></h2>

	<p>A smart simple way to show Facebook Page Plugin in lightbox to your website. with Jinda Lightbox, You can custom some content that show before and after Page Plugin or invetal and delay for lightbox. if you got any problem or wanna report bug to us, please contact support@jindatheme.com</p>

	<form action="options.php" method="POST" name="lightbox_options">

		<?php 
			$options = get_option($this->plugin_name);
			settings_fields($this->plugin_name); 
			do_settings_sections($this->plugin_name);

		?>

		<table class="form-table">
			<!-- facebook page url -->
			<tr>
				<td>
					<label for="<?php echo $this->plugin_name; ?>-facebook-page-url"><?php _e("Your Facebook Page URL", $this->plugin_name) ?></label>
				</td>
				<td>
					<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-facebook-page-url" name="<?php echo $this->plugin_name; ?>[facebook-page-url]" value="<?php echo $options['facebook-page-url'] ?>">
				</td>
			</tr>
			<!-- close click overlay -->
			<tr>
				<td><label><?php _e("Close when user click on overlay background?", $this->plugin_name) ?></label></td>
				<td>
					<label for="<?php echo $this->plugin_name; ?>-close-click-overlay">
						<input type="checkbox" id="<?php echo $this->plugin_name; ?>-close-click-overlay" name="<?php echo $this->plugin_name; ?>[close-click-overlay]" value="1" <?php checked($options['close-click-overlay'], 1); ?> />
						<span><?php _e('Yes, Please', $this->plugin_name); ?></span>
					</label>	
				</td>
			</tr>
			<!-- show on what page? -->
			<tr>
				<td><label><?php _e("Where you wanna show popup?", $this->plugin_name) ?></label></td>
				<td>
					<!-- checkbox -->
					<label for="<?php echo $this->plugin_name; ?>-show-homepage">
						<input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-homepage" name="<?php echo $this->plugin_name; ?>[show-homepage]" value="1" <?php checked($options['show-homepage'], 1); ?>>
						<span style="margin-right: 20px;">Homepage</span>
					</label> 
					<!-- checkbox -->
					<label for="<?php echo $this->plugin_name; ?>-show-post">
						<input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-post" name="<?php echo $this->plugin_name; ?>[show-post]" value="1" <?php checked($options['show-post'], 1); ?>>
						<span style="margin-right: 20px;">Post</span>
					</label>
					<!-- checkbox -->
					<label for="<?php echo $this->plugin_name; ?>-show-page">
						<input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-page" name="<?php echo $this->plugin_name; ?>[show-page]" value="1" <?php checked($options['show-page'], 1); ?>>
						<span style="margin-right: 20px;">Page</span>
					</label>
				</td>
			</tr>
			<!-- show popup every..hours -->
			<tr>
				<td><label for="<?php echo $this->plugin_name; ?>-show-interval"><?php _e("Show popup in every.. (hour)", $this->plugin_name) ?></label></td>
				<td>
					<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-show-interval" name="<?php echo $this->plugin_name; ?>[show-interval]" value="<?php echo $options['show-interval'] ?>">
				</td>
			</tr>
			<!-- popup delay -->
			<tr>
				<td><label for="<?php echo $this->plugin_name; ?>-popup-delay"><?php _e("Delay that wait to show(in ms.)", $this->plugin_name) ?></label></td>
				<td>
					<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-popup-delay" name="<?php echo $this->plugin_name; ?>[popup-delay]" value="<?php echo $options['popup-delay'] ?>">
				</td>
			</tr>			
		</table>

		<!-- new section -->
		<h2><i class="dashicons dashicons-admin-settings"></i> <?php _e("Color & Content", $this->plugin_name) ?></h2>
		<table class="form-table">
			<!-- Button Color -->
			<tr>
				<td style="vertical-align: top">
					<label for="<?php echo $this->plugin_name; ?>-button-color"><?php _e("Button Color", $this->plugin_name) ?></label>
				</td>
				<td>
					<input type="text" class="<?php echo $this->plugin_name; ?>-color-picker regular-text" id="<?php echo $this->plugin_name; ?>-button-color" name="<?php echo $this->plugin_name; ?>[button-color]" value="<?php echo $options['button-color'] ?>">
				</td>
			</tr>
			<!-- Text Color -->
			<tr>
				<td style="vertical-align: top">
					<label for="<?php echo $this->plugin_name; ?>-lightbox-color"><?php _e("Text Color", $this->plugin_name) ?></label>
				</td>
				<td>
					<input type="text" class="<?php echo $this->plugin_name; ?>-color-picker regular-text" id="<?php echo $this->plugin_name; ?>-lightbox-color" name="<?php echo $this->plugin_name; ?>[lightbox-color]" value="<?php echo $options['lightbox-color'] ?>">
				</td>
			</tr>
			<!-- Text before Lightbox -->
			<tr>
				<td style="vertical-align: top"><label for="<?php echo $this->plugin_name; ?>-text-before"><?php _e("Content Before Page Plugin", $this->plugin_name) ?></label></td>
				<td>
					<textarea id="<?php echo $this->plugin_name; ?>-text-before" name="<?php echo $this->plugin_name; ?>[text-before]" class="large-text" rows="5"><?php echo $options['text-before'] ?></textarea>
				</td>
			</tr>
			<!-- Text after Lightbox -->
			<tr>
				<td style="vertical-align: top"><label for="<?php echo $this->plugin_name; ?>-text-after"><?php _e("Content After Page Plugin", $this->plugin_name) ?></label></td>
				<td>
					<textarea id="<?php echo $this->plugin_name; ?>-text-after" name="<?php echo $this->plugin_name; ?>[text-after]" class="large-text" rows="5"><?php echo $options['text-after'] ?></textarea>
				</td>
			</tr>
			<!-- override CSS -->
			<tr>
				<td style="vertical-align: top"><label for="<?php echo $this->plugin_name; ?>-override-css"><?php _e("Your custom CSS", $this->plugin_name) ?></label></td>
				<td>
					<textarea class="code-textarea large-text code" id="<?php echo $this->plugin_name; ?>-override-css" name="<?php echo $this->plugin_name; ?>[override-css]" rows="10"><?php echo $options['override-css'] ?></textarea>
				</td>
			</tr>
		</table>

		<?php submit_button(__('Save All Changes', $this->plugin_name), 'primary','submit', TRUE); ?>

	</form>
</div>