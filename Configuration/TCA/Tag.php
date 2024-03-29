<?php
	if (!defined ('TYPO3_MODE')) {
		die ('Access denied.');
	}

	$TCA['tx_extensionrepository_domain_model_tag'] = array(
		'ctrl'      => $TCA['tx_extensionrepository_domain_model_tag']['ctrl'],
		'interface' => array(
			'showRecordFieldList' => 'title,extensions',
		),
		'types' => array(
			'1' => array('showitem' => 'title'),
		),
		'palettes' => array(
			'1' => array('showitem' => ''),
		),
		'columns' => array(
			'sys_language_uid' => array(
				'exclude'       => 1,
				'label'         => 'LLL:EXT:lang/locallang_general.php:LGL.language',
				'config'        => array(
					'type'                => 'select',
					'foreign_table'       => 'sys_language',
					'foreign_table_where' => 'ORDER BY sys_language.title',
					'items'               => array(
						array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
						array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
					),
				),
			),
			'l18n_parent' => array(
				'displayCond' => 'FIELD:sys_language_uid:>:0',
				'exclude'     => 1,
				'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
				'config'      => array(
					'type'                => 'select',
					'foreign_table'       => 'tx_extensionrepository_domain_model_tag',
					'foreign_table_where' => 'AND tx_extensionrepository_domain_model_tag.uid=###REC_FIELD_l18n_parent### AND tx_extensionrepository_domain_model_tag.sys_language_uid IN (-1,0)',
					'items'               => array(
						array('', 0),
					),
				),
			),
			'l18n_diffsource' => array(
				'config'       => array(
					'type'      => 'passthrough',
				),
			),
			't3ver_label' => array(
				'displayCond' => 'FIELD:t3ver_label:REQ:true',
				'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
				'config'      => array(
					'type'     => 'none',
					'cols'     => 27,
				),
			),
			'hidden' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
				'config'  => array(
					'type' => 'check',
				),
			),
			'title' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_tag.title',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim,required',
				),
			),
			'extensions' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_tag.extensions',
				'config'  => array(
					'type'              => 'select',
					'size'              => 10,
					'minitems'          => 0,
					'maxitems'          => 9999,
					'autoSizeMax'       => 30,
					'multiple'          => 0,
					'foreign_table'     => 'tx_extensionrepository_domain_model_extension',
					'MM'                => 'tx_extensionrepository_extension_tag_mm',
					'MM_opposite_field' => 'tags',
				),
			),
		),
	);
?>