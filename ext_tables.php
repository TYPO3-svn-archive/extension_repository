<?php
	if (!defined ('TYPO3_MODE')) {
		die ('Access denied.');
	}

		// Add plugin to list
	Tx_Extbase_Utility_Extension::registerPlugin(
		$_EXTKEY,
		'Pi1',
		'Extension Repository'
	);

		// Add static TypoScript files
	t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Default/', 'TER Frontend - Default Configuration');
	t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Rss/',     'TER Frontend - RSS Output');
	t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Json/',    'TER Frontend - JSON Output');

		// Add flexform to field list of the Backend form
	$extIdent = strtolower(t3lib_div::underscoredToUpperCamelCase($_EXTKEY)) . '_pi1';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$extIdent] = 'layout,select_key,recursive';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][$extIdent] = 'pi_flexform';
	t3lib_extMgm::addPiFlexFormValue($extIdent, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

		// Domain models and their label / search fields
	$models = array(
		'extension'  => array('ext_key', 'ext_key'),
		'category'   => array('title', 'title,description'),
		'tag'        => array('title', 'title'),
		'version'    => array('title', 'title,description,state,em_category'),
		'media'      => array('title', 'title,type,language,source,description'),
		'experience' => array('date_time', 'comment'),
		'relation'   => array('relation_key', 'relation_type,relation_key'),
		'author'     => array('name', 'name,email,username'),
	);

		// Add entities and value objects
	foreach ($models as $modelName => $modelConfiguration) {
			// Add help text to the Backend form
		t3lib_extMgm::addLLrefForTCAdescr(
			'tx_extensionrepository_domain_model_' . $modelName,
			'EXT:extension_repository/Resources/Private/Language/locallang_csh_tx_extensionrepository_domain_model_' . $modelName . '.xml'
		);

			// Allow datasets on standard pages
		t3lib_extMgm::allowTableOnStandardPages('tx_extensionrepository_domain_model_' . $modelName);

			// Add table configuration
		$TCA['tx_extensionrepository_domain_model_' . $modelName] = array (
			'ctrl' => array (
				'title'                    => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_' . $modelName,
				'label'                    => $modelConfiguration[0],
				'searchFields'             => $modelConfiguration[1],
				'tstamp'                   => 'tstamp',
				'crdate'                   => 'crdate',
				'versioningWS'             => 2,
				'versioning_followPages'   => TRUE,
				'origUid'                  => 't3_origuid',
				'languageField'            => 'sys_language_uid',
				'transOrigPointerField'    => 'l18n_parent',
				'transOrigDiffSourceField' => 'l18n_diffsource',
				'delete'                   => 'deleted',
				'enablecolumns'            => array(
					'disabled'                 => 'hidden'
				),
				'dynamicConfigFile'        => t3lib_extMgm::extPath($_EXTKEY)    . 'Configuration/TCA/' . ucfirst($modelName) . '.php',
				'iconfile'                 => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/' . $modelName . '.gif'
			)
		);
	}
?>