<?php
class IP_Framework_Controller_Abstract
{

	private $model;
	private $view;

	public function default_action() {
		$this->display();
	}
	
	public function display() {
		
		$this->getView()->display();
	}
	
	public function getView() {
		if ($this->view == null) {
			$viewname = str_replace('Controller', 'View', get_class($this));
			$this->view = new $viewname();
		}
		return $this->view;
	}
	
	public function getModel() {
		if ($this->model == null) {
			$modelname = str_replace('Controller', 'Model', get_class($this));
			$this->model = new $modelname();
		}
		return $this->model;
	}
	
}