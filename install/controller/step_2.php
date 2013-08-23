<?php
class ControllerStep2 extends Controller {
	private $error = array();
	
	public function index() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->redirect($this->url->link('step_3'));
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';	
		}
		
		$this->data['action'] = $this->url->link('step_2');

		$this->data['config_catalog'] = DIR_OPENCART . 'config.php';
		$this->data['config_admin'] = DIR_OPENCART . 'admin/config.php';
		
		$this->data['cache'] = DIR_SYSTEM . 'cache';
		$this->data['logs'] = DIR_SYSTEM . 'logs';
		$this->data['image'] = DIR_OPENCART . 'image';
		$this->data['image_cache'] = DIR_OPENCART . 'image/cache';
		$this->data['image_data'] = DIR_OPENCART . 'image/data';
		$this->data['download'] = DIR_OPENCART . 'download';
		
		$this->data['back'] = $this->url->link('step_1');
		
		$this->template = 'step_2.tpl';
		$this->children = array(
			'header',
			'footer'
		);		
		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (phpversion() < '5.0') {
			$this->error['warning'] = 'Waarschuwing: PHP5 is nodig voor deze versie van Opencart!';
		}

		if (!ini_get('file_uploads')) {
			$this->error['warning'] = 'Waarschuwing: uploads moeten aan staan!';
		}
	
		if (ini_get('session.auto_start')) {
			$this->error['warning'] = 'Waarschuwing: Opencart werkt niet met session.auto_start aan!';
		}
		
		if (!extension_loaded('mysql')) {
			$this->error['warning'] = 'Waarschuwing: MySQL extensie moet geladen zijn om OpenCart te laten werken!';
		}
				
		if (!extension_loaded('gd')) {
			$this->error['warning'] = 'Waarschuwing: GD moet geinstalleerd zijn';
		}

		if (!extension_loaded('curl')) {
			$this->error['warning'] = 'Waarschuwing: curl moet geinstalleerd zijn';
		}

		if (!function_exists('mcrypt_encrypt')) {
			$this->error['warning'] = 'Waarschuwing: mcrypt moet geinstalleerd zijn';
		}
				
		if (!extension_loaded('zlib')) {
			$this->error['warning'] = 'Waarschuwing: de ZLIB extentie moet geinstalleerd zijn';
		}
		
		if (!file_exists(DIR_OPENCART . 'config.php')) {
			$this->error['warning'] = 'Waarschuwing: config.php bestaat niet, kopieer config-dist.php naar config.php en geef het schrijfrechten';
		} elseif (!is_writable(DIR_OPENCART . 'config.php')) {
			$this->error['warning'] = 'Waarschuwing: config.php moet overschrijfbaar zijn';
		}
		
		if (!file_exists(DIR_OPENCART . 'admin/config.php')) {
			$this->error['warning'] = 'Waarschuwing: admin/config.php bestaat niet, kopieer config-dist.php naar config.php en geef het schrijfrechten';
		} elseif (!is_writable(DIR_OPENCART . 'admin/config.php')) {
			$this->error['warning'] = 'Waarschuwing: admin/config.php moet overschrijfbaar zijn';
		}

		if (!is_writable(DIR_SYSTEM . 'cache')) {
			$this->error['warning'] = 'Waarschuwing: Cache directory moet beschrijfbaar zijn om Opencart te laten werken';
		}
		
		if (!is_writable(DIR_SYSTEM . 'logs')) {
			$this->error['warning'] = 'Waarschuwing: Logs directory moet beschrijfbaar zijn om Opencart te laten werken';
		}
		
		if (!is_writable(DIR_OPENCART . 'image')) {
			$this->error['warning'] = 'Waarschuwing: Image directory moet beschrijfbaar zijn om Opencart te laten werken';
		}

		if (!is_writable(DIR_OPENCART . 'image/cache')) {
			$this->error['warning'] = 'Waarschuwing: Image/Cache directory moet beschrijfbaar zijn om Opencart te laten werken';
		}
		
		if (!is_writable(DIR_OPENCART . 'image/data')) {
			$this->error['warning'] = 'Waarschuwing: Image/Data directory moet beschrijfbaar zijn om Opencart te laten werken';
		}
		
		if (!is_writable(DIR_OPENCART . 'download')) {
			$this->error['warning'] = 'Waarschuwing: Download directory moet beschrijfbaar zijn om Opencart te laten werken';
		}
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
	}
}
?>