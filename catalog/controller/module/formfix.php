<?php

/**

	FormFix module 
	Replace Dutch postal code with city + street name 
	
    (C) Copyright Yellow Melon 2013

 	@file 		Formfix Catalog Controller
	@author		Yellow Melon B.V. / www.idealplugins.nl

 */

class ControllerModuleformfix extends Controller {
	
	protected $provinces = array(
		"Drenthe" => "2329",
		"Flevoland" => "2330",
		"Friesland" => "2331",
		"Gelderland" => "2332", 
		"Groningen" => "2333",
		"Limburg" => "2334",
		"Noord-Brabant" => "2335",
		"Noord-Holland" => "2336", 
		"Overijssel" => "2337",
		"Utrecht" => "2338",
		"Zeeland" => "2339", 
		"Zuid-Holland" => "2340"
		);

    /**
    		Index
	*/

	protected function index() {
		}

    /**
    		Start 
    */

	public function lookup() {

		$result = array(
			"street" => "",
			"city" => "",
			"province" => ""
			);
					
		if (!isset($_POST["postcode"]) || !isset($_POST["nr"])) {
			} else {
			$postcode = ltrim($_POST["postcode"]);
			$postcode = str_replace(" ","",$postcode);
			$postcode = strtoupper(substr($postcode, 0, 6));
			$nr = (int) $_POST["nr"];
		
			if (strlen($postcode)!=6) {
				} else {
				$process = curl_init("https://api.postcode.nl/rest/addresses/".$postcode."/".$nr);
				curl_setopt($process, CURLOPT_USERPWD, $this->config->get('formfix_key') . ":" . $this->config->get('formfix_secret'));
				curl_setopt($process, CURLOPT_TIMEOUT, 30);
				curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
				$http_response = curl_exec($process);
				curl_close($process);
				if (isset($http_response)) {
					$result = json_decode($http_response, true);
					if (isset($result['province'])) {
						$result['province'] = $this->provinces[$result['province']];
						$result['street'] .= ' '.strtoupper(htmlentities(substr($_POST["nr"],0,10))); // Append number, but only if OK
						}
					}
				}
			}

		$this->response->setOutput(json_encode($result));
		}
	}
