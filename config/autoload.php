<?php
/**
 * Copyright (c) 2016 Thorsten Gading
 *
 * @copyright 2016 Thorsten Gading  <info@tossn.de>
 * @author Thorsten Gading <info@tossn.de>
 * @license LGPL
 * @package WebAppManifest
 */

/**
 * Register the classes
 */
\ClassLoader::addClasses(array(
	'WebAppManifest\Callback\SettingsDcaCallback' => 'system/modules/web_app_manifest/classes/callback/SettingsDcaCallback.php',
	'WebAppManifest\Service\WebAppManifestService' => 'system/modules/web_app_manifest/classes/service/WebAppManifestService.php',
	'WebAppManifest\Service\ThumbService' => 'system/modules/web_app_manifest/classes/service/ThumbService.php',
	'WebAppManifest\Domain\Repository\LanguageRepository' => 'system/modules/web_app_manifest/classes/domain/repository/LanguageRepository.php',
));