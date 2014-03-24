<?php
class IP_Framework_Model_Abstract
{

	private $db;
	private $message = null;
	private $messageType = null;

	function __construct() {
		global $wpdb;
		$this->db =& $wpdb;
	}

	public function getMessage() {
		$message = array($this->messageType, $this->message);
		return $message;
	}

}