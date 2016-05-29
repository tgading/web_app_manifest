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

$GLOBALS['TL_LANG']['tl_twam_settings']['web_app_manifest_legend'] = 'Web App Manifest settings';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_enable'] = array('Enable Web App Manifest', 'Please choose whether the  Web App Manifest should be activated.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_short_name'] = array('Short name', 'This is intended to be used where there is insufficient space to display the full name.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_name'] = array('Name', 'A name, which is displayed for the user.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_description'] = array('Description', 'Specifies a description of what the web application does.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_start_url'] = array('Start URL', 'Specifies the URL that will be loaded when a user launches the app. ');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_icon'] = array('Icon', 'Choose an icon. Allowed file types are JPEG, GIF and PNG.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir'] = array('Text-direction', 'Specifies the primary text-direction.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display'] = array('Display mode', 'The developers preferred display mode for the web application.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation'] = array('Orientation', 'Defines the default orientation for all the web app top level browsing contexts.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_background_color'] = array('Background color as hexadecimal color definition', 'Defines the expected background color for the web app (e. g. #f1f1f1).');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_theme_color'] = array('Theme color as hexadecimal color definition', 'Defines the default theme color for the web app (e. g. #f1f1f1).');

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['auto'] = 'automatically';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['ltr'] = 'left to right';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['rtl'] = 'right to left';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['standalone'] = 'stand-alone app';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['fullscreen'] = 'full screen';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['minimal-ui'] = 'stand-alone app with minimal set of UI elements';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['browser'] = 'browser';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['any'] = 'any';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['natural'] = 'natural';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait'] = 'portrait';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait-primary'] = 'portrait-primary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait-secondary'] = 'portrait-secondary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape'] = 'landscape';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape-primary'] = 'landscape-primary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape-secondary'] = 'landscape-secondary';
