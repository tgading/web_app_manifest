<?php
/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */

// Back end modules
array_insert($GLOBALS['BE_MOD'], 3, array(
		'web_app_manifest' => array(
			'twam_settings' => array(
				'tables' => array('tl_twam_settings'),
				'icon' => 'system/modules/web_app_manifest/assets/icons/settings.png',
			),
		),
	)
);

// Hooks
$Config = \Contao\Config::getInstance();
if ($Config->get('twam_enable')) {
	$GLOBALS['TL_HOOKS']['generatePage'][] = array('WebAppManifest\Service\WebAppManifestService', 'addManifest');
}