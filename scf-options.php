<h2>Super Contact Form Options</h2>
<form name="scf-option" id="scf-option" method="POST" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<p>Enter the email address, you want to recieve emails from the contact page</p>
<label>Email Address: </label>
<input type="text" name="scf_email_option" size="30" value="<?php echo get_option('scf_email_option'); ?>" />
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="scf_email_option" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>