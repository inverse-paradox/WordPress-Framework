<?php
class IP_Framework_View_Image_Sizes extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'image_sizes') {

		$this->page_title = 'Manage Image Sizes';
		$this->sizes = $this->getModel()->getSizes();

		parent::display($template, $folder);

	}

}