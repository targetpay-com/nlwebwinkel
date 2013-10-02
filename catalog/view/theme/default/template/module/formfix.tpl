<?php

/**

	FormFix module 
	Replace Dutch postal code with city + street name 
	
    (C) Copyright Yellow Melon 2013

 	@file 		Formfix Catalog Template
	@author		Yellow Melon B.V. / www.idealplugins.nl

 */

?>

<h2><?php echo $text_credit_card; ?></h2>
<div class="content" id="module">
  <table class="form">
  	<tr>
      <td height=10></td>
    </tr>
    <tr>
      <td><?php echo $entry_bank_id; ?></td>
      <td><select name="bank_id">
          <?php 
          foreach ($bankList as $id => $name) {
          	echo "<option value=\"".$id."\">".$name."</option>\r\n";
          	}
          ?>
        </select></td>
    </tr>
  </table>
</div>
<div class="buttons">
  <div class="right">
    <input type="hidden" name="custom" value="<?php echo $custom; ?>" />   
    <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button" />
  </div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
	$.ajax({
		url: 'index.php?route=module/formfix/send',
		type: 'post',
		data: $('#module :input'),
		dataType: 'json',		
		beforeSend: function() {
			$('#button-confirm').attr('disabled', true);
			$('#module').before('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-confirm').attr('disabled', false);
			$('.attention').remove();
		},				
		success: function(json) {
			if (json['error']) {
				alert(json['error']);
			}
			
			if (json['success']) {
				location = json['success'];
			}
		}
	});
});
//--></script> 
