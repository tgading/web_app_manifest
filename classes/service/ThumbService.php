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
class ThumbService {

	/**
	 * @var string
	 */
	protected $thumbsDir = 'system/modules/web_app_manifest/assets/icons';

	/**
	 * @return void
	 */
	public function __construct() {
		$this->thumbsDir = TL_FILES_URL.$this->thumbsDir;
	}

	/**
	 * @param string $origSrc
	 * @param integer $thumbWidth
	 * @param integer $thumbHeight
	 * @param bool $createSquare
	 * @return string
	 */
	public function render($origSrc, $thumbWidth = 0, $thumbHeight = 0, $createSquare = false) {
		$origSrc = (string)$origSrc;
		if (!is_file(TL_ROOT.'/'.$origSrc)) {
			return '';
		}

		if ((int)$thumbWidth == 0 && (int)$thumbHeight == 0) {
			return $origSrc;
		}
		if ((int)$thumbWidth == 0) {
			if ($createSquare) {
				$thumbWidth = (int)$thumbHeight;
			}
			else {
				$thumbWidth = 999999;
			}
		}
		if ((int)$thumbHeight == 0) {
			if ($createSquare) {
				$thumbHeight = (int)$thumbWidth;
			}
			else {
				$thumbHeight = 999999;
			}
		}

		$size = getimagesize(TL_ROOT.'/'.$origSrc);
		$width = $size[0];
		$height = $size[1];
		$fileName = basename($origSrc);
		$fileEnding = mb_strtolower(mb_substr($fileName, mb_strrpos($fileName, '.') + 1));

		if (!in_array($fileEnding, array('jpg', 'png', 'gif'))) {
			return $origSrc;
		}

		if ($createSquare) {
			$newWidth = (int)$thumbWidth;
			$newHeight = (int)$thumbWidth;
		}
		else {
			if (($width / (int)$thumbWidth) > ($height / (int)$thumbHeight)) {
				$newWidth = (int)$thumbWidth;
				$newHeight = round($height / ($width / (int)$thumbWidth));
			}
			else {
				$newHeight = (int)$thumbHeight;
				$newWidth = round($width / ($height / (int)$thumbHeight));
			}
		}

		if ($this->thumbsDir != '' && is_dir(TL_ROOT.'/'.$this->thumbsDir)) {
			$thumbName = $this->thumbsDir.'/'.$newHeight.'/'.md5_file(TL_ROOT.'/'.$origSrc).'.png';
		}
		else {
			$thumbName = dirname($origSrc).'/thumbs/'.$newHeight.'/'.md5_file(TL_ROOT.'/'.$origSrc).'.png';
		}

		if (!is_file(TL_ROOT.'/'.$thumbName)) {
			if (!is_dir(TL_ROOT.'/'.dirname($thumbName))) {
				mkdir(TL_ROOT.'/'.dirname($thumbName), 0777, true);
				@chmod(TL_ROOT.'/'.dirname($thumbName), 0777);
			}

			if ($fileEnding == 'gif') {
				$oldImage = imagecreatefromgif(TL_ROOT.'/'.$origSrc);
			}
			elseif ($fileEnding == 'png') {
				$oldImage = imagecreatefrompng(TL_ROOT.'/'.$origSrc);
			}
			else {
				$oldImage = imagecreatefromjpeg(TL_ROOT.'/'.$origSrc);
			}

			$newImage = imagecreatetruecolor($newWidth, $newHeight);
			$bodyColor = imagecolorallocate($newImage, 255, 255, 255);
			$srcX = 0;
			$srcY = 0;
			if ($createSquare) {
				if ($width > $height) {
					$srcX = round(($width - $height) / 2);
					$width = $height;
				}
				elseif ($width < $height) {
					$srcY = round(($height - $width) / 2);
					$height = $width;
				}
			}
			imagecopyresampled($newImage, $oldImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $width, $height);

			imagepng($newImage, TL_ROOT.'/'.$thumbName);
		}

		return $thumbName;
	}

}