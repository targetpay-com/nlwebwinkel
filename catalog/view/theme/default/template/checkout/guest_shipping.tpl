<table class="form">
  <tr>
    <td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
    <td><input type="text" name="firstname" value="<?php echo $firstname; ?>" class="large-field" /></td>
  </tr>
  <tr>
    <td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
    <td><input type="text" name="lastname" value="<?php echo $lastname; ?>" class="large-field" /></td>
  </tr>
  <tr>
    <td><?php echo $entry_company; ?></td>
    <td><input type="text" name="company" value="<?php echo $company; ?>" class="large-field" /></td>
  </tr>

  <tr>
    <td><span class="required">*</span> <?php echo $entry_country; ?></td>
    <td><select name="country_id" class="large-field">
        <option value=""><?php echo $text_select; ?></option>
        <?php foreach ($countries as $country) { ?>
        <?php if ($country['country_id'] == $country_id) { ?>
        <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
        <?php } ?>
        <?php } ?>
      </select></td>
  </tr>

  <tr>
    <td><span id="shipping-postcode-required" class="required">*</span> <?php echo $entry_postcode; ?></td>
    <td><input type="text" name="postcode" value="<?php echo $postcode; ?>" class="large-field" /></td>
  </tr>

  <div class="payment-housenumber" style="display: none">
  <tr>
  <td>Huisnummer:</td>
  <td><input type="text" name="housenumber" value="" class="large-field" /></d>
  </tr>
  </div>

  <tr>
    <td><span class="required">*</span> <?php echo $entry_address_1; ?></td>
    <td><input type="text" name="address_1" value="<?php echo $address_1; ?>" class="large-field" /></td>
  </tr>

  <!-- FormFix -->
  <input type="hidden" name="address_2" value="<?php echo $address_2; ?>">
  <!-- /FormFix -->

  <tr>
    <td><span class="required">*</span> <?php echo $entry_city; ?></td>
    <td><input type="text" name="city" value="<?php echo $city; ?>" class="large-field" /></td>
  </tr>

  <tr>
    <td><span class="required">*</span> <?php echo $entry_zone; ?></td>
    <td><select name="zone_id" class="large-field">
      </select></td>
  </tr>
</table>
<br />
<div class="buttons">
  <div class="right"><input type="button" value="<?php echo $button_continue; ?>" id="button-guest-shipping" class="button" /></div>
</div>
<script type="text/javascript"><!--

/* FormFix */

function get_address(waitmode) {
	var postcode = $('input[name=\'postcode\']').val();
	var nr = $('input[name=\'housenumber\']').val();
	if (postcode.length < 4) {
		}else{
		if (nr.length < 1) {
			}else{
			jQuery.ajax({
				type: "POST",
				url: "index.php?route=module/formfix/lookup",
				data: 'postcode='+postcode+'&nr='+nr,
				cache: false,
	            async: waitmode,
				success: function(response){
						var result = $.parseJSON(response);
						$('input[name=\'address_1\']').val(result.street);
						$('input[name=\'city\']').val(result.city);
						$('select[name=\'zone_id\']').val(result.province);
					}
		   		});
			}
		}
    }
$('input[name=\'housenumber\']').bind('change', function() { get_address(true); });
$('input[name=\'postcode\']').bind('change', function() { get_address(true); });
$('input[type=\'submit\']').click(function() { get_address(false); });


/* FormFix */

$('#shipping-address select[name=\'country_id\']').bind('change', function() {
	if (this.value == '') return;

    /* FormFix */

    if (this.value==150) {
        $('.payment-housenumber').show();
        $('input[name=\'address_1\']').attr('disabled', 'disabled');
        $('input[name=\'city\']').attr('disabled', 'disabled');
        $('select[name=\'zone_id\']').attr('disabled', 'disabled');
        } else {
        $('.payment-housenumber').hide();
        $('input[name=\'address_1\']').removeAttr('disabled');
        $('input[name=\'city\']').removeAttr('disabled');
        $('select[name=\'zone_id\']').removeAttr('disabled');
        }

    /* /FormFix */

	$.ajax({
		url: 'index.php?route=checkout/checkout/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('#shipping-address select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#shipping-postcode-required').show();
			} else {
				$('#shipping-postcode-required').hide();
			}
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('#shipping-address select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('#shipping-address select[name=\'country_id\']').trigger('change');
//--></script>
