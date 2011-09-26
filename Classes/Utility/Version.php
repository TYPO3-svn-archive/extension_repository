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
	 * Utilities to manage versions
	 */
	class Tx_ExtensionRepository_Utility_Version {

		/**
		 * Build version from integer
		 *
		 * @param integer $version The numeric version
		 * @return string Version string
		 */
		public static function versionFromInteger($version) {
			if (empty($version)) {
				return '';
			}

			$parts = t3lib_div::trimExplode('0', (string) $version, TRUE);
			$parts = array_pad($parts, 3, 0);

			return implode('.', $parts);
		}

	}
?>