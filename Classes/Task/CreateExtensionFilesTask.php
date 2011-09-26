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
	 * Create zip archives from t3x files and generate images
	 */
	class Tx_ExtensionRepository_Task_CreateExtensionFilesTask extends Tx_ExtensionRepository_Task_AbstractTask {

		/**
		 * @var Tx_ExtensionRepository_Domain_Repository_VersionRepository
		 */
		protected $versionRepository;

		/**
		 * @var Tx_ExtensionRepository_Provider_ProviderManager
		 */
		protected $providerManager;

		/**
		 * @var Tx_Extbase_Persistence_Manager
		 */
		protected $persistenceManager;

		/**
		 * @var string
		 */
		protected $mediaRootPath = '';

		/**
		 * @var array
		 */
		protected $imageSizes = array('small', 'large');


		/**
		 * Initialize task
		 *
		 * @return void
		 */
		public function initializeTask() {
			$this->versionRepository  = $this->objectManager->get('Tx_ExtensionRepository_Domain_Repository_VersionRepository');
			$this->providerManager    = $this->objectManager->get('Tx_ExtensionRepository_Provider_ProviderManager');
			$this->persistenceManager = $this->objectManager->get('Tx_Extbase_Persistence_Manager');

			if (empty($this->setup['settings.']['mediaRootPath'])) {
				throw new Exception('Please configure "plugin.tx_extensionrepository.settings.mediaRootPath" in TypoScript setup');
			}
			$this->mediaRootPath = $this->setup['settings.']['mediaRootPath'];
		}


		/**
		 * Execute the task
		 *
		 * @param integer $lastRun Timestamp of the last run
		 * @param integer $offset Starting point
		 * @param integer $count Element count to process at once
		 * @return boolean TRUE on success
		 */
		protected function executeTask($lastRun, $offset, $count) {
				// Get all unprocessed versions
			$versions = $this->versionRepository->findForMediaCreation($offset, $count);
			if (empty($versions)) {
				return FALSE;
			}

				// Simulate working directory "htdocs", required for file_exists check
				// in t3lib_stdGraphic::getImageDimensions
			$currentDir = getcwd();
			chdir(PATH_site);

			foreach ($versions as $version) {
					// Get media path for the extension
				$extKey = $version->getExtension()->getExtKey();
				$extensionMediaPath = Tx_ExtensionRepository_Utility_File::getAbsoluteDirectory($this->mediaRootPath . $extKey);

					// Create zip file
				$zipFile = $this->createZipFile($version, $extensionMediaPath);
				if (!empty($zipFile)) {
					$version->setZipFileSize(filesize($zipFile));
					$version->setHasZipFile(TRUE);
				}

					// Create images
				if ($this->createImages($version, $extensionMediaPath)) {
					$version->setHasImages(TRUE);
				}

				$this->persistenceManager->persistAll();
			}

				// Revert working directory
			chdir($currentDir);

			return TRUE;
		}


		/**
		 * Create a zip file for given version
		 * 
		 * @param Tx_ExtensionRepository_Domain_Model_Version $version Path to t3x file
		 * @param string $extensionMediaPath Path to media files
		 * @return string Name of the zip file
		 */
		protected function createZipFile(Tx_ExtensionRepository_Domain_Model_Version $version, $extensionMediaPath) {
			if (empty($extensionMediaPath)) {
				return '';
			}

			$provider = $this->providerManager->getProvider($version->getExtensionProvider());
			$t3xFileName = $provider->getFileUrl($version, 't3x');
			$zipFileName = $extensionMediaPath . basename($provider->getFileName($version, 'zip'));

				// Check if zip file already exists
			if (Tx_ExtensionRepository_Utility_File::fileExists($zipFileName)) {
				return $zipFileName;
			}

				// Check file hash
			$fileHash = Tx_ExtensionRepository_Utility_File::getFileHash($t3xFileName);
			if ($fileHash != $version->getFileHash()) {
				throw new Exception('File was changed and is therefore corrupt');
			}

				// Create zip file
			$result = Tx_ExtensionRepository_Utility_Archive::convertT3xToZip($t3xFileName, $zipFileName);
			if (!empty($result)) {
				return $zipFileName;
			}

			return '';
		}


		/**
		 * Create images for given version
		 * 
		 * @param Tx_ExtensionRepository_Domain_Model_Version $version Path to t3x file
		 * @param string $extensionMediaPath Path to media files
		 * @return boolean TRUE if success
		 */
		protected function createImages(Tx_ExtensionRepository_Domain_Model_Version $version, $extensionMediaPath) {
			if (empty($extensionMediaPath)) {
				return FALSE;
			}

				// Get image files
			$imageFiles = array();
			$mediaObjects = $version->getMedia();
			foreach ($mediaObjects as $media) {
				if ($media->getType() === 'image') {
						// Source must contains only image file name without path
					$imageFiles[] = $extensionMediaPath . $media->getSource();
				}
			}

			if (empty($imageFiles)) {
				return TRUE;
			}

			foreach ($this->imageSizes as $imageSize) {
				if (empty($this->setup['settings.'][$imageSize . 'Image'])) {
					continue;
				}
				$images = Tx_ExtensionRepository_Service_Image::processImages($imageFiles, $this->setup['settings.'][$imageSize . 'Image']);
				if (empty($images)) {
					throw new Exception('Could not create image files');
				}
			}

			return TRUE;
		}

	}
?>