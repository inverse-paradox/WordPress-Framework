<?php
class IP_Framework_Model_Image_Sizes extends IP_Framework_Model_Abstract
{

	function save() {

		if (get_magic_quotes_gpc()) {
			$post = stripslashes_deep($_POST);
		} else {
			$post = $_POST;
		}
		$image_sizes = array();

		foreach ($post['options'] as $size) {

			$name = $size['name'];
			$width = $size['width'];
			$height = $size['height'];
			$crop = ($size['crop'] == 'true') ? true : false;
			$image_sizes[] = array(
				'name' => $name,
				'width' => $width,
				'height' => $height,
				'crop' => $crop
			);

		}

		if (!add_option('ip_framework_image_sizes', $image_sizes, null, 'no')) {
			update_option('ip_framework_image_sizes', $image_sizes);
		}

		$this->message = 'Image sizes saved.';
		$this->messageType = 'success';

	}

	public function getSizes() {

		$sizes = get_option('ip_framework_image_sizes');
		$ided_sizes = array();
		if ($sizes) {
			foreach ($sizes as $size) {
				$id = md5($size['name']);
				$ided_size = array(
					'id' => $id,
					'name' => $size['name'],
					'width' => $size['width'],
					'height' => $size['height'],
					'crop' => $size['crop']
				);
				$ided_sizes[] = $ided_size;
			}
		}
		return $ided_sizes;

	}

}