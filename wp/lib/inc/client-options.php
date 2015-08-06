<?php

function h5bs_client_options() {

	if ( count($_POST) > 0 && isset($_POST['h5bs_client_settings']) ) {
		$options = array ( 'logo_url', 'logo_alt_text', 'google_analytics', 'facebook_url', 'twitter_url', 'instagram_url', 'pinterest_username', 'gplus_username' );
		
		foreach ( $options as $opt ) {
			delete_option ( 'client_'.$opt, $_POST[$opt] );
			add_option ( 'client_'.$opt, $_POST[$opt] );
		}
	}
	add_menu_page( 'Client Settings', 'Client Options', 'manage_options', 'h5bs_client_settings', 'h5bs_client_settings' );
}

add_action( 'admin_menu', 'h5bs_client_options' );


function h5bs_client_settings() { ?>
	<div class="wrap">  
		<?php screen_icon('themes'); ?> <h2>Client Options</h2>

		<form method="post" action="">
			<h3>General Settings</h3>
			<table class="form-table">
				<tr>
					<th><label for="logo_url">Logo URL</label></th>
					<td><input type="text" name="logo_url" id="logo_url" value="<?php echo get_option( 'client_logo_url' ); ?>" class="regular-text" /> <span class="description">( ex. /wp-content/uploads/logo.png )</span></td>
				</tr>
				<tr>
					<th><label for="logo_alt_text">Logo Alt Text</label></th> 
					<td><input type="text" name="logo_alt_text" id="logo_alt_text" value="<?php echo get_option( 'client_logo_alt_text' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="google_analytics">Google Analytics Tracking #</label></th> 
					<td><input type="text" name="google_analytics" id="google_analytics" value="<?php echo get_option( 'client_google_analytics' ); ?>" class="regular-text" /> <span class="description">( ex. UA-XXXXX-X )</span></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="h5bs_client_settings" value="save" style="display:none;" />
			</p>
			
			<h3>Social Links</h3>
			<table class="form-table">
                <tr>
                    <th><label for="instagram_url">Instagram Url</label></th>
                    <td><input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option( 'client_instagram_url' ); ?>" class="regular-text" /></td>
                </tr>
				<tr>
					<th><label for="facebook_url">Facebook Url</label></th>
					<td><input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option( 'client_facebook_url' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="pinterest_username">Pinterest Url</label></th>
					<td><input type="text" name="pinterest_username" id="pinterest_username" value="<?php echo get_option( 'client_pinterest_username' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="twitter_url">Twitter Url</label></th>
					<td><input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option( 'client_twitter_url' ); ?>" class="regular-text" /></td>
				</tr>
				<tr>
					<th><label for="gplus_username">Google plus url</label></th>
					<td><input type="text" name="gplus_username" id="gplus_username" value="<?php echo get_option( 'client_gplus_username' ); ?>" class="regular-text" /></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="h5bs_client_settings" value="save" style="display:none;" />
			</p>
			

		</form>
	</div><!-- end wrap -->
	<?php
}
