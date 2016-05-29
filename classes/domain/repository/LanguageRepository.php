<?php

namespace WebAppManifest\Domain\Repository;

/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */
class LanguageRepository extends \Backend {

	/**
	 * @var \Contao\Config
	 */
	protected $Config;

	/**
	 * @return void
	 */
	public function __construct() {
		$this->Config = \Contao\Config::getInstance();
		parent::__construct();
	}
	
	/**
	 * @return array
	 */
	public function findAll() {
		$query = "SELECT DISTINCT language ".
					"FROM tl_page ".
					"WHERE type = 'root' ".
						"AND published = '1' ".
					"ORDER BY language ASC ";
		$DbResult = $this->Database->prepare($query)->execute();

		$languages = array();
		if ($DbResult->numRows > 0) {
			while ($DbResult->next()) {
				$languages[] = $DbResult->language;
			}
		}

		return $languages;
	}

}