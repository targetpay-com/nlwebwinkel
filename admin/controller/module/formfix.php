<?php

/**

	FormFix module 
	Replace Dutch postal code with city + street name 
	
    (C) Copyright Yellow Melon 2013

 	@file 		Formfix Admin Controller
	@author		Yellow Melon B.V. / www.idealplugins.nl

 */

class ControllerModuleformfix extends Controller {
	private $error = array(); 

	public function index() {
		$this->language->load('module/formfix');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('formfix', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
			}

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		$this->data['entry_key'] = $this->language->get('entry_key');
		$this->data['entry_secret'] = $this->language->get('entry_secret');
		$this->data['entry_status'] = $this->language->get('entry_status');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
			} else {
			$this->data['error_warning'] = '';
			}

		if (isset($this->error['key'])) {
			$this->data['error_key'] = $this->error['key'];
			} else {
			$this->data['error_key'] = '';
			}

		if (isset($this->error['secret'])) {
			$this->data['error_secret'] = $this->error['secret'];
			} else {
			$this->data['error_secret'] = '';
			}

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   			);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   			);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/formfix', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   			);

		$this->data['action'] = $this->url->link('module/formfix', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['formfix_key'])) {
			$this->data['formfix_key'] = $this->request->post['formfix_key'];
			} else {
			$this->data['formfix_key'] = $this->config->get('formfix_key');
			}

        if (!isset($this->data['formfix_key'])) {
            $this->data['formfix_key'] = '';
            }
            
		if (isset($this->request->post['formfix_secret'])) {
            $this->data['formfix_secret'] = $this->request->post['formfix_secret'];
            } else {
            $this->data['formfix_secret'] = $this->config->get('formfix_secret');
			}
            
		if (!isset($this->data['formfix_secret'])) {
			$this->data['formfix_secret'] = '';
			}

		$this->template = 'module/formfix.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
			);
				
		$this->response->setOutput($this->render());
		}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/formfix')) {
			$this->error['warning'] = $this->language->get('error_permission');
			}
		
			if (!$this->request->post['formfix_key']) {
			$this->error['key'] = $this->language->get('error_key');
			}

		if (!$this->request->post['formfix_secret']) {
			$this->error['secret'] = $this->language->get('error_secret');
			}

		if (!$this->error) {
			return true;
			} else {
			return false;
			}
		}


	public function install() {
       $this->load->model('module/formfix');
       $this->load->model('setting/setting');
       $this->model_setting_setting->editSetting('formfix', array('formfix_status'=>1));
	   }
	}
?>
