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

$GLOBALS['TL_LANG']['tl_twam_settings']['web_app_manifest_legend'] = 'Web App Manifest Einstellungen';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_enable'] = array('Web App Manifest aktivieren', 'Bitte wählen Sie aus, ob das Web App Manifest aktiv ist.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_short_name'] = array('Kurztitel', 'Wird ausgegeben, falls der Platz zum Anzeigen des vollen Titels nicht ausreicht.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_name'] = array('Titel', 'Der Titel der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_description'] = array('Beschreibung', 'Eine Beschreibung der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_start_url'] = array('Startpunkt', 'Startseite innerhalb der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_icon'] = array('Icon', 'Bitte wählen Sie ein Icon aus. Erlaubt sind die Dateiformate JPEG, PNG und GIF.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir'] = array('Textrichtung', 'Definiert die Textrichtung innerhalb der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display'] = array('Anzeigemodus', 'Definiert den Anzeigemodus der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation'] = array('Ausrichtung', 'Definiert die Ausrichtung der Web-App.');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_background_color'] = array('Hintergrundfarbe als hexadezimale Farbdefinition', 'Definiert die Hintergrundfarbe der Web-App (z. B. #f1f1f1).');
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_theme_color'] = array('Theme-Color als hexadezimale Farbdefinition', 'Definiert die Theme-Color der Web-App (z. B. #f1f1f1).');

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['auto'] = 'automatisch';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['ltr'] = 'von links nach rechts';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_dir_label']['rtl'] = 'von rechts nach links';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['standalone'] = 'Stand-alone App';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['fullscreen'] = 'Vollbild';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['minimal-ui'] = 'Minimale Stand-alone App';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_display_label']['browser'] = 'Browser';

$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['any'] = 'alle';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['natural'] = 'natural';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait'] = 'portrait';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait-primary'] = 'portrait-primary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['portrait-secondary'] = 'portrait-secondary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape'] = 'landscape';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape-primary'] = 'landscape-primary';
$GLOBALS['TL_LANG']['tl_twam_settings']['twam_orientation_label']['landscape-secondary'] = 'landscape-secondary';
