<?php
// Text
$_['text_title']       = 'Klarna Invoice';
$_['text_information'] = 'Klarna Information';
$_['text_additional']  = 'Klarna requires some additional information before they can proccess your order.';
$_['text_wait']        = 'Please wait!';
$_['text_male']        = 'Male';
$_['text_female']      = 'Female';

// Entry
$_['entry_gender']     = 'Gender:';
$_['entry_pno']        = 'PNO / BIRTH DATA:<span class="help">(07071960)</span>';
$_['entry_house_no']   = 'House No.:';
$_['entry_house_ext']  = 'House Ext.:';
$_['entry_cellno']     = 'Cell Phone:';

// Error
$_['error_gender']     = 'Gender Required!';
$_['error_dob']        = 'Date of birth Required!';
$_['error_house_no']   = 'House No. Required!';
$_['error_house_ext']  = 'House Extension Required!';
$_['error_dob']        = 'Date of birth Required!';

// Toegevoegd 23-08-2013 (EvdB)

$_['text_fee']             = 'Klarna Invoice - Pay within 14 days <span id="klarna_invoice_toc_link"></span> (+%s)<script text="javascript\">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\', charge: %s});})</script>';
$_['text_no_fee']          = 'Klarna Invoice - Pay within 14 days <span id="klarna_invoice_toc_link"></span><script text="javascript">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\'});})</script>';
$_['text_year']            = 'Year';
$_['text_month']           = 'Month';
$_['text_day']             = 'Day';
$_['text_comment']         = 'Klarna\'s Invoice ID: %s
%s/%s: %.4f';
$_['entry_dob']            = 'Date of Birth:';
$_['entry_phone_no']       = 'Phone number:<br /><span class="help">Please enter your phone number.</span>';
$_['entry_street']         = 'Street:<br /><span class="help">Please note that delivery can only take place to the registered address when paying with Klarna.</span>';
$_['entry_company']        = 'Company Registration Number:<br /><span class="help">Please enter your Company\'s registration number</span>';
$_['error_deu_terms']      = 'You must agree to Klarna\'s privacy policy (Datenschutz)';
$_['error_address_match']  = 'Billing and Shipping addresses must match if you want to use Klarna Invoice';
$_['error_network']        = 'Error occurred while connecting to Klarna. Please try again later.';
?>