<?php include 'style.inc.php'; ?>

<div id="<?php echo $id; ?>" class="optin-box optin-box-6"<?php echo $style_str; ?>>
	<div class="optin-box-content">
    	<?php echo $form_open.$hidden_str ?>
            <div class="text-boxes">
		  <?php 
    		if (isset($order)) {
                foreach ($order as $field) {
                    if ($field === 'email_field') {
                        op_get_var_e($fields,'email_field');        
                    } else if ($field === 'name_field') {
                        op_get_var_e($fields,'name_field');     
                    } else if (isset($extra_fields[$field])) {
                        op_get_var_e($extra_fields, $field);
                    }
                }
            } else {
                op_get_var_e($fields,'name_field');
                op_get_var_e($fields,'email_field');
                echo implode('',$extra_fields);
            }   
            ?>
            </div>
            <?php wp_nonce_field('op_optin', 'op_optin_nonce'); ?>
            <?php echo $submit_button ?>
        </form>
	<?php op_get_var_e($content,'privacy','','<p class="privacy"><img src="'.OP_ASSETS_URL.'images/optin_box/privacy.png" alt="privacy" width="16" height="15" /> %1$s</p>') ?>
    </div>
</div>