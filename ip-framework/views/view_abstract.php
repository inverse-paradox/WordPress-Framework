<?php
class IP_Framework_View_Abstract
{

	private $model = null;
	private $message = null;
	private $messageType = null;
	
	public function display($template = 'default', $folder = 'default') {

		$this->showMessage();
		
		include IP_FRAMEWORK_PLUGIN_PATH . 'templates/global/header.php';
		if (file_exists(IP_FRAMEWORK_PLUGIN_PATH . 'templates/' . $folder . '/' . $template . '.php')) {
			include IP_FRAMEWORK_PLUGIN_PATH . 'templates/' . $folder . '/' . $template . '.php';
		} else {
			echo 'Template file ' . $folder . '/' . $template . '.php not found.';
		}
		include IP_FRAMEWORK_PLUGIN_PATH . 'templates/global/footer.php';
	}
	
	private function showMessage() {
		$this->getMessage();
		if ($this->message != '') {
			echo '<div class="'.$this->messageType.'">';
			echo $this->message;
			echo '</div>';
		}
	}
	
	private function getMessage() {
		if ($this->message === null) {
			$message_data = $this->model->getMessage();
			$this->message = $message_data[0];
			$this->messageType = $message_data[1];
		}
	}
	
	public function getModel() {
		if ($this->model == null) {
			$modelname = str_replace('View', 'Model', get_class($this));
			$this->model = new $modelname();
		}
		return $this->model;
	}
	
	public function classname() {
		$modelname = str_replace('View', 'Model', get_class($this));
		return $modelname;
	}
	
}