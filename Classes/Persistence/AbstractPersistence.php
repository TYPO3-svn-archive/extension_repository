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
	 * Abstract persistence handler
	 */
	abstract class Tx_ExtensionRepository_Persistence_AbstractPersistence implements Tx_ExtensionRepository_Persistence_PersistenceInterface {

		/**
		 * @var string
		 */
		protected $name = 'Tx_ExtensionRepository';

		/**
		 * @var boolean
		 */
		protected $isLoaded = FALSE;

		/**
		 * @var boolean
		 */
		protected $saveImmediately = TRUE;

		/**
		 * @var array
		 */
		protected $content = array();


		/**
		 * Set name
		 *
		 * @param string $name Name to set
		 * @return void
		 */
		public function setName($name) {
			$this->name = $name;
		}


		/**
		 * Get name
		 *
		 * @return string Name of the persistence
		 */
		public function getName() {
			if (empty($this->name)) {
				$this->setName(get_class($this));
			}
			return $this->name;
		}


		/**
		 * Set isLoaded
		 *
		 * @param boolean $isLoaded Is loaded state
		 * @return void
		 */
		public function setIsLoaded($isLoaded) {
			$this->isLoaded = (bool) $isLoaded;
		}


		/**
		 * Get isLoaded
		 *
		 * @return boolean Is loaded state
		 */
		public function isLoaded() {
			return (bool) $this->isLoaded;
		}


		/**
		 * Set saveImmediately
		 *
		 * @param boolean $saveImmediately Save immediately
		 * @return void
		 */
		public function setSaveImmediately($saveImmediately) {
			$this->saveImmediately = (bool) $saveImmediately;
		}


		/**
		 * Get saveImmediately
		 *
		 * @return boolean Save immediately state
		 */
		public function saveImmediately() {
			return (bool) $this->saveImmediately;
		}


		/**
		 * Set value
		 *
		 * @param string $key Name of the value
		 * @param mixed $value Value content
		 * @return void
		 */
		public function set($key, $value) {
			if (empty($key)) {
				throw new Exception('Empty keys are not allowed');
			}
			if (!$this->isLoaded()) {
				$this->load();
			}
			$this->content[$key] = $value;
			if ($this->saveImmediately()) {
				$this->save();
			}
		}


		/**
		 * Add value
		 *
		 * @param string $key Name of the value
		 * @param mixed $value Value content
		 * @return void
		 */
		public function add($key, $value) {
			$this->set($key, $value);
		}


		/**
		 * Add multiple values
		 *
		 * @param array $value Key <-> value pairs
		 * @return void
		 */
		public function addMultiple(array $values) {
			foreach ($values as $key => $value) {
				$this->add($key, $value);
			}
		}


		/**
		 * Check if content contains given key
		 *
		 * @param string $key Name of the value
		 * @return boolean TRUE if exists
		 */
		public function has($key) {
			if (!$this->isLoaded()) {
				$this->load();
			}
			return isset($this->content[$key]);
		}


		/**
		 * Get value
		 *
		 * @param string $key Name of the value
		 * @return mixed Value content
		 */
		public function get($key) {
			if ($this->has($key)) {
				return $this->content[$key];
			}
			return NULL;
		}


		/**
		 * Get all values
		 *
		 * @return array Key <-> value pairs
		 */
		public function getAll() {
			if (!$this->isLoaded()) {
				$this->load();
			}
			return $this->content;
		}


		/**
		 * Remove a value
		 *
		 * @param string $key Name of the value
		 * @return void
		 */
		public function remove($key) {
			if ($this->has($key)) {
				unset($this->content[$key]);
			}
			if ($this->saveImmediately()) {
				$this->save();
			}
		}


		/**
		 * Remove all values
		 *
		 * @return void
		 */
		public function removeAll() {
			if (!$this->isLoaded()) {
				$this->load();
			}
			$this->content = array();
			if ($this->saveImmediately()) {
				$this->save();
			}
		}

	}
?>