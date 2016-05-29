<?php

namespace WebAppManifest\Service;

/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */
class WebAppManifestService {

	/**
	 * @var string
	 */
	protected $language = 'en';

	/**
	 * @var string
	 */
	protected $manifestFilePath = 'system/modules/web_app_manifest/assets';

	/**
	 * @return void
	 */
	public function __construct() {
		if (isset($GLOBALS['TL_LANGUAGE']) && $GLOBALS['TL_LANGUAGE'] != '') {
			$this->language = $GLOBALS['TL_LANGUAGE'];
		}
	}

	/**
	 * @return string
	 */
	public function addManifest() {
		$manifestFileName = $this->language.'_manifest.json';

		if (is_file($this->manifestFilePath.'/'.$manifestFileName)) {
			$GLOBALS['TL_HEAD'][] = '<link rel="manifest" href="'.$this->manifestFilePath.'/'.$manifestFileName.'" />';
		}
	}

	/**
	 * @return string
	 */
	public function getManifestFilePath() {
		return $this->manifestFilePath;
	}

}