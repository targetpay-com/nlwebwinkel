<?php
// Text
$_['text_title']       = 'Klarna Invoice';
$_['text_information'] = 'Klarna Informatie';
$_['text_additional']  = 'Klarna heeft wat extra gegevens nodig voordat ze je betaling kunnen verwerken.';
$_['text_wait']        = 'Even geduld a.u.b.';
$_['text_male']        = 'Man';
$_['text_female']      = 'Vrouw';

// Entry
$_['entry_gender']     = 'Geslacht:';
$_['entry_pno']        = 'Geboortedatum:<span class="help">(07071960)</span>';
$_['entry_house_no']   = 'Huisnummer:';
$_['entry_house_ext']  = 'Toevoeging:';
$_['entry_cellno']     = 'Mobiel telefoonnumme:';

// Error
$_['error_gender']     = 'Geslacht is verplicht';
$_['error_dob']        = 'Geboortedatum is verplicht';
$_['error_house_no']   = 'Huisnummer is verplicht';
$_['error_house_ext']  = 'Huisnummer toevoeging is onjuist';
$_['error_dob']        = 'Geboortedatum is verplicht';

$_['text_fee']             = 'Klarna Invoice - Betaling binnen 14 dagen <span id="klarna_invoice_toc_link"></span> (+%s)<script text="javascript\">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\', charge: %s});})</script>';
$_['text_no_fee']          = 'Klarna Invoice - Betaling binnen 14 dagen <span id="klarna_invoice_toc_link"></span><script text="javascript">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\'});})</script>';
$_['text_year']            = 'Jaar';
$_['text_month']           = 'Maand';
$_['text_day']             = 'Dag';
$_['text_comment']         = 'Klarna\'s factuurnummer: %s
%s/%s: %.4f';
$_['entry_dob']            = 'Geboortedatum:';
$_['entry_company']        = 'KvK nummer:';
$_['error_deu_terms']      = 'Je dient akkoord te gaan met de privacy policy van Klarna';
$_['error_address_match']  = 'Factuur en bezorgadres moeten hetzelfde zijn als je Klarna wil gebruiken als betaalwijze';
$_['error_network']        = 'Er kon geen verbinding gemaakt worden met Klarna, probeer het later opnieuw.';
$_['entry_phone_no']       = 'Telefoonnummer:';
$_['entry_street']         = 'Straat:<br /><span class="help">Let op: dit moet gelijk zijn aan het bezorgadres.</span>';

?>
