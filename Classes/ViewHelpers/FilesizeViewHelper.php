<?php
	/*******************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2011 Kai Vogel <kai.vogel@speedprogs.de>, Speedprogs.de
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as
	 *  published by the Free Software Foundation; either version 2 of
	 *  the License, or (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ******************************************************************/

	/**
	 * Filesize view helper
	 */
	class Tx_ExtensionRepository_ViewHelpers_FilesizeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

		/**
		 * Disable the escaping interceptor
		 */
		protected $escapingInterceptorEnabled = FALSE;


		/**
		 * Renders filesize in given format
		 *
		 * @param integer $filesize Filesize in bytes
		 * @param string $format Output format
		 * @return string New file size in given format
		 */
		public function render($filesize = NULL, $format = 'kb') {
			if ($filesize === NULL) {
				$filesize = $this->renderChildren();
			}

			$filesize = (int) $filesize;
			if (empty($format) || empty($filesize)) {
				return $filesize;
			}

			switch (strtolower($format)) {
				case 'kb' :
					return round($filesize / 1024);
				case 'mb' :
					return round(($filesize / 1024) / 1024);
				case 'gb' :
					return round((($filesize / 1024) / 1024) / 1024);
				default :
					return $filesize;
			}
		}

	}
?>