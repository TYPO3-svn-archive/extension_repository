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
	 * Repository for Tx_ExtensionRepository_Domain_Model_ExtensionManagerCacheEntry
	 */
	class Tx_ExtensionRepository_Domain_Repository_ExtensionManagerCacheEntryRepository extends Tx_ExtensionRepository_Domain_Repository_AbstractRepository {

		/**
		 * Get all updated extension rows
		 *
		 * @param integer $lastUpdateDate Date of the last update
		 * @param integer $offset Offset to start with
		 * @param integer $count Extension count to load
		 * @return array Objects
		 */
		public function findLastUpdated($lastUpdateDate, $offset = 0, $count = 0) {
			$query = $this->createQuery($offset, $count);
			$query->getQuerySettings()->setRespectStoragePage(FALSE);
			$query->getQuerySettings()->setRespectSysLanguage(FALSE);
			$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
			$query->matching($query->greaterThan('lastuploaddate', (int) $lastUpdateDate));
			return $query->execute();
		}


		/**
		 * Returns one extension row by given extKey and versionString
		 *
		 * @param string $extKey Extension Key
		 * @param string $versionString Version of the extension
		 * @return array Objects
		 */
		public function findOneByExtKeyAndVersionString($extKey, $versionString) {
			$query = $this->createQuery(0, 1);
			$query->getQuerySettings()->setRespectStoragePage(FALSE);
			$query->getQuerySettings()->setRespectSysLanguage(FALSE);
			$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
			$query->matching(
				$query->logicalAnd(
					$query->equals('extkey', $extKey),
					$query->equals('version', $versionString)
				)
			);

			$rows = $query->execute();
			if (is_array($rows)) {
				return reset($rows);
			}

			return array();
		}

	}
?>