<?php
/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */

if (!defined('TL_ROOT')) die('You can not access this file directly!');

$GLOBALS['TL_DCA']['tl_twam_settings'] = array(
	'config' => array(
		'dataContainer' => 'File',
		'closed' => true,
		'notDeletable' => true,
		'switchToEdit' => false,
		'onsubmit_callback' => array(
			array('WebAppManifest\Callback\SettingsDcaCallback', 'writeManifestFile'),
		),
	),
	'palettes' => array(
		'__selector__' => array('twam_enable'),
		'default' => '{web_app_manifest_legend},twam_enable',
	),
	'subpalettes' => array(
		'twam_enable' => '',
	),
);


include_once __DIR__.'/../classes/domain/repository/LanguageRepository.php';
$LanguageRepository = new \WebAppManifest\Domain\Repository\LanguageRepository;
$languages = $LanguageRepository->findAll();

foreach ($languages as $language) {
	$GLOBALS['TL_DCA']['tl_twam_settings']['subpalettes']['twam_enable'] .= ',twam_name_'.$language;
	$GLOBALS['TL_DCA']['tl_twam_settings']['subpalettes']['twam_enable'] .= ',twam_short_name_'.$language;
	$GLOBALS['TL_DCA']['tl_twam_settings']['subpalettes']['twam_enable'] .= ',twam_description_'.$language;
	$GLOBALS['TL_DCA']['tl_twam_settings']['subpalettes']['twam_enable'] .= ',twam_start_url_'.$language;
}

$GLOBALS['TL_DCA']['tl_twam_settings']['subpalettes']['twam_enable'] .= ',twam_icon,twam_dir,twam_display,twam_orientation,twam_background_color,twam_theme_color';


$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_enable'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_enable'],
	'inputType' => 'checkbox',
	'eval' => array(
		'submitOnChange' => true,
		'tl_class' => 'clr',
	),
);

foreach ($languages as $language) {
	$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_name_'.$language] = array(
		'label' => array(
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_name'][0].' ('.$language.')',
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_name'][1]
		),
		'inputType' => 'text',
		'eval' => array(
			'maxlength' => 255,
			'tl_class' => 'w50',
		),
	);
	$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_short_name_'.$language] = array(
		'label' => array(
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_short_name'][0].' ('.$language.')',
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_short_name'][1]
		),
		'inputType' => 'text',
		'eval' => array(
			'maxlength' => 255,
			'tl_class' => 'w50',
		),
	);
	$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_description_'.$language] = array(
		'label' => array(
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_description'][0].' ('.$language.')',
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_description'][1]
		),
		'inputType' => 'textarea',
		'eval' => array(
			'style' => 'height:60px',
			'tl_class' => 'clr',
		),
	);
	$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_start_url_'.$language] = array(
		'label' => array(
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_start_url'][0].' ('.$language.')',
			$GLOBALS['TL_LANG']['tl_twam_settings']['twam_start_url'][1]
		),
		'inputType' => 'pageTree',
		'foreignKey' => 'tl_page.title',
		'relation' => array(
			'type' => 'hasOne',
			'load' => 'lazy'
		),
		'eval' => array(
			'fieldType'=>'radio',
			'tl_class' => 'clr',
		),
	);
}

$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_icon'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_icon'],
	'inputType' => 'fileTree',
	'eval' => array(
		'files' => true,
		'filesOnly' => true,
		'extensions' => 'jpg,png,gif',
		'fieldType' => 'radio',
		'tl_class' => 'clr',
	),
);
$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_dir'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir'],
	'inputType' => 'select',
	'options' => array(
		'auto',
		'ltr',
		'rtl',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label'],
	'eval' => array(
		'maxlength' => 255,
		'tl_class' => 'w50',
	),
);
$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_display'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display'],
	'inputType' => 'select',
	'options' => array(
		'standalone',
		'fullscreen',
		'minimal-ui',
		'browser',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label'],
	'eval' => array(
		'maxlength' => 255,
		'tl_class' => 'w50',
	),
);
$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_orientation'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation'],
	'inputType' => 'select',
	'options' => array(
		'any',
		'natural',
		'portrait',
		'portrait-primary',
		'portrait-secondary',
		'landscape',
		'landscape-primary',
		'landscape-secondary',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label'],
	'eval' => array(
		'maxlength' => 255,
		'tl_class' => 'clr',
	),
);
$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_background_color'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_background_color'],
	'inputType' => 'text',
	'eval' => array(
		'tl_class' => 'w50',
	),
	'save_callback' => array(
		array('WebAppManifest\Callback\SettingsDcaCallback', 'entityDecode')
	),
);
$GLOBALS['TL_DCA']['tl_twam_settings']['fields']['twam_theme_color'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_twam_settings']['twam_theme_color'],
	'inputType' => 'text',
	'eval' => array(
		'tl_class' => 'w50',
	),
	'save_callback' => array(
		array('WebAppManifest\Callback\SettingsDcaCallback', 'entityDecode')
	),
);
