<?php

namespace WebAppManifest\Callback;

/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */
class SettingsDcaCallback extends \Backend {

	/**
	 * @var string
	 */
	protected $defaultIcon = 'icons/default.png';

	/**
	 * @var array
	 */
	protected $iconSizes = array(48, 72, 96, 144, 168, 192);

	/**
	 * @var array
	 */
	protected $properties = array(
		'background_color' => '',
		'description' => '',
		'dir' => 'auto',
		'display' => 'standalone',
		'icons' => '',
		'lang' => '', // will be set automatically
		'name' => '',
		'orientation' => 'any',
		'scope' => '', // will be set automatically
		'short_name' => '',
		'start_url' => '/',
		'theme_color' => '',
	);

	/**
	 * @param mixed $varValue
	 * @param \Contao\DC_File $DC
	 * @return string
	 */
	public function entityDecode($varValue, \Contao\DC_File $DC) {
		return html_entity_decode($varValue, ENT_QUOTES, 'utf-8');
	}

	/**
	 * @param \DataContainer $DC
	 * @return void
	 */
	public function writeManifestFile(\DataContainer $DC) {
		$WebAppManifestService = new \WebAppManifest\Service\WebAppManifestService;
		$ThumbService = new \WebAppManifest\Service\ThumbService;
		$Config = \Contao\Config::getInstance();
		$baseUrl = $this->getBaseUrl();

		$manifestFilePath = $WebAppManifestService->getManifestFilePath();

		$icon = '';
		if ($Config->get('twam_icon') != '') {
			$objFile = \FilesModel::findByPk($Config->get('twam_icon'));
			$icon = TL_FILES_URL.(string)$objFile->path;
		}

		$LanguageRepository = new \WebAppManifest\Domain\Repository\LanguageRepository;
		$languages = $LanguageRepository->findAll();

		foreach ($languages as $language) {
			$fileName = $language.'_manifest.json';

			$properties = $this->properties;
			$properties['background_color'] = $Config->get('twam_background_color') != '' ? $Config->get('twam_background_color') : $properties['background_color'];
			$properties['description'] = $Config->get('twam_description_'.$language) != '' ? $Config->get('twam_description_'.$language) : $properties['description'];
			$properties['dir'] = $Config->get('twam_dir') != '' ? $Config->get('twam_dir') : $properties['dir'];
			$properties['display'] = $Config->get('twam_display') != '' ? $Config->get('twam_display') : $properties['display'];
			$properties['icons'] = $icon != '' ? $icon : $manifestFilePath.'/'.$this->defaultIcon;
			$properties['name'] = $Config->get('twam_name_'.$language) != '' ? $Config->get('twam_name_'.$language) : $Config->get('websiteTitle');
			$properties['orientation'] = $Config->get('twam_orientation') != '' ? $Config->get('twam_orientation') : $properties['orientation'];
			$properties['short_name'] = $Config->get('twam_short_name_'.$language) != '' ? $Config->get('twam_short_name_'.$language) : $Config->get('websiteTitle');
			$properties['theme_color'] = $Config->get('twam_theme_color') != '' ? $Config->get('twam_theme_color') : $Config->get('theme_color');

			if ($Config->get('twam_start_url_'.$language) != '') {
				if ($pageData = \PageModel::findByPk($Config->get('twam_start_url_'.$language))) {
					$properties['start_url'] = $baseUrl.'/'.\Controller::generateFrontendUrl($pageData->row());
				}
			}

			if ($properties['icons'] != '') {
				$tmpIcon = $properties['icons'];
				$properties['icons'] = array();
				foreach ($this->iconSizes as $iconSize) {
					$properties['icons'][] = array(
						'src' => $baseUrl.'/'.$ThumbService->render($tmpIcon, $iconSize, $iconSize, true),
						'sizes' => $iconSize.'x'.$iconSize,
						'type' => 'image/png'
					);
				}
			}
			//$properties['scope'] = \Environment::get('path');
			$properties['lang'] = str_replace('_', '-', $language);

			foreach ($properties as $index => $property) {
				if (!$property) {
					unset($properties[$index]);
				}
			}

			$handle = fopen(TL_ROOT.'/'.$manifestFilePath.'/'.$fileName, 'w+');
			fwrite($handle, str_replace('\/', '/', json_encode($properties)));
			fclose($handle);
		}
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		$baseUrl = \Idna::decode(\Environment::get('base'));
		if ($baseUrl == '') {
			$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, -9);
		}

		if (substr($baseUrl, -1) == '/') {
			$baseUrl = substr($baseUrl, 0, -1);
		}

		return $baseUrl;
	}

}