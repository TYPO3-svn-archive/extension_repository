<?php
	if (!defined ('TYPO3_MODE')) {
		die ('Access denied.');
	}

	$TCA['tx_extensionrepository_domain_model_experience'] = array(
		'ctrl'      => $TCA['tx_extensionrepository_domain_model_experience']['ctrl'],
		'interface' => array(
			'showRecordFieldList' => 'date_time,comment,rating',
		),
		'types' => array(
			'1' => array('showitem' => 'date_time,comment,rating'),
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
					'foreign_table'       => 'tx_extensionrepository_domain_model_experience',
					'foreign_table_where' => 'AND tx_extensionrepository_domain_model_experience.uid=###REC_FIELD_l18n_parent### AND tx_extensionrepository_domain_model_experience.sys_language_uid IN (-1,0)',
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
			'date_time' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_experience.date_time',
				'config'  => array(
					'type'     => 'input',
					'size'     => 12,
					'max'      => 20,
					'eval'     => 'datetime,required',
					'checkbox' => '0',
					'default'  => '0',
				),
			),
			'comment' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_experience.comment',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'rating' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_experience.rating',
				'config'  => array(
					'type' => 'input',
					'size' => 4,
					'eval' => 'int',
				),
			),
			'version' => array(
				'config' => array(
					'type' => 'passthrough',
				),
			),
		),
	);
?>