<?php
class ControllerUpgrade extends Controller {
	private $error = array();

	public function index() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('upgrade');

			$this->model_upgrade->mysql();
			
			$this->redirect($this->url->link('upgrade/success'));
		}		
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		$this->data['action'] = $this->url->link('upgrade');

		$this->template = 'upgrade.tpl';
		$this->children = array(
			'header',
			'footer'
		);

		$this->response->setOutput($this->render());
	}

	public function success() {
		$this->template = 'success.tpl';
		$this->children = array(
			'header',
			'footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (DB_DRIVER == 'mysql') {		
			if (!$connection = @mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)) {
				$this->error['warning'] = 'Fout: kon niet verbinden met de database server, controleer server adres, gebruikersnaam en wachtwoord in config.php';
			} else {
				if (!mysql_select_db(DB_DATABASE, $connection)) {
					$this->error['warning'] = 'Fout: database "'. DB_DATABASE . '" bestaat niet!';
				}
	
				mysql_close($connection);
			}
		}

    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
	}
}
?>
