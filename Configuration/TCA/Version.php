<?php
	if (!defined ('TYPO3_MODE')) {
		die ('Access denied.');
	}

	$TCA['tx_extensionrepository_domain_model_version'] = array(
		'ctrl'      => $TCA['tx_extensionrepository_domain_model_version']['ctrl'],
		'interface' => array(
			'showRecordFieldList' => 'title,description,version_number,version_string,upload_date,upload_comment,download_counter,frontend_download_counter,state,em_category,load_order,priority,shy,internal,do_not_load_in_fe,uploadfolder,clear_cache_on_load,module,create_dirs,modify_tables,lock_type,cgl_compliance,cgl_compliance_note,review_state,manual,media,experiences,software_relations,author,file_hash,extension_provider,has_zip_file,has_images',
		),
		'types' => array(
			'1' => array('showitem' => 'title,description,version_number,version_string,upload_date,upload_comment,download_counter,frontend_download_counter,state,em_category,load_order,priority,shy,internal,do_not_load_in_fe,uploadfolder,clear_cache_on_load,module,create_dirs,modify_tables,lock_type,cgl_compliance,cgl_compliance_note,review_state,manual,media,experiences,software_relations,author,file_hash,extension_provider,has_zip_file,has_images'),
		),
		'palettes' => array(
			'1' => array('showitem' => ''),
		),
		'columns' => array(
			'sys_language_uid' => array(
				'exclude'      => 1,
				'label'        => 'LLL:EXT:lang/locallang_general.php:LGL.language',
				'config'       => array(
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
					'type'     => 'select',
					'items'    => array(
						array('', 0),
					),
					'foreign_table'       => 'tx_extensionrepository_domain_model_version',
					'foreign_table_where' => 'AND tx_extensionrepository_domain_model_version.uid=###REC_FIELD_l18n_parent### AND tx_extensionrepository_domain_model_version.sys_language_uid IN (-1,0)',
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
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.title',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim,required',
				),
			),
			'description' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.description',
				'config'  => array(
					'type' => 'text',
					'cols' => 30,
					'rows' => 5,
				),
			),
			'version_number' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.version_number',
				'config'  => array(
					'type' => 'input',
					'size' => 12,
					'eval' => 'int,required',
				),
			),
			'version_string' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.version_string',
				'config'  => array(
					'type' => 'input',
					'size' => 12,
					'eval' => 'trim,required',
				),
			),
			'upload_date' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.upload_date',
				'config'  => array(
					'type'     => 'input',
					'size'     => 12,
					'max'      => 20,
					'eval'     => 'datetime,required',
					'default'  => '0',
				),
			),
			'upload_comment' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.upload_comment',
				'config'  => array(
					'type' => 'text',
					'rows' => 30,
					'rows' => 5,
				),
			),
			'download_counter' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.download_counter',
				'config'  => array(
					'type' => 'none',
					'size' => 12,
				),
			),
			'frontend_download_counter' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.frontend_download_counter',
				'config'  => array(
					'type' => 'none',
					'size' => 12,
				),
			),
			'state' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state',
				'config'  => array(
					'type' => 'select',
					'size' => 1,
					'minitems' => 1,
					'maxitems' => 1,
					'items'    => array(
						array('', ''),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.alpha', 'alpha'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.beta', 'beta'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.stable', 'stable'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.experimental', 'experimental'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.test', 'test'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.state.obsolete', 'obsolete'),
					),
				),
			),
			'em_category' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category',
				'config'  => array(
					'type' => 'select',
					'size' => 1,
					'minitems' => 1,
					'maxitems' => 1,
					'items'    => array(
						array('', ''),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.fe', 'fe'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.plugin', 'plugin'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.be', 'be'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.module', 'module'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.services', 'services'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.example', 'example'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.misc', 'misc'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.templates', 'templates'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.em_category.doc', 'doc'),
					),
				),
			),
			'load_order' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.load_order',
				'config'  => array(
					'type' => 'select',
					'size' => 1,
					'minitems' => 0,
					'maxitems' => 1,
					'items'    => array(
						array('', ''),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.load_order.top', 'top'),
						array('LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.load_order.bottom', 'bottom'),
					),
				),
			),
			'priority' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.priority',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'shy' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.shy',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'internal' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.internal',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'do_not_load_in_fe' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.do_not_load_in_fe',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'uploadfolder' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.uploadfolder',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'clear_cache_on_load' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.clear_cache_on_load',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'module' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.module',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'create_dirs' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.create_dirs',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'modify_tables' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.modify_tables',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'lock_type' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.lock_type',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'cgl_compliance' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.cgl_compliance',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'cgl_compliance_note' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.cgl_compliance_note',
				'config'  => array(
					'type' => 'text',
					'cols' => 30,
					'rows' => 5,
				),
			),
			'review_state' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.review_state',
				'config'  => array(
					'type' => 'input',
					'size' => 5,
					'eval' => 'trim',
				),
			),
			'manual' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.manual',
				'config'  => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim',
				),
			),
			'media' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.media',
				'config'  => array(
					'type'          => 'inline',
					'foreign_table' => 'tx_extensionrepository_domain_model_media',
					'foreign_field' => 'version',
					'maxitems'      => 9999,
					'appearance'    => array(
						'collapse'              => 0,
						'newRecordLinkPosition' => 'bottom',
					),
				),
			),
			'experiences' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.experiences',
				'config'  => array(
					'type'          => 'inline',
					'foreign_table' => 'tx_extensionrepository_domain_model_experience',
					'foreign_field' => 'version',
					'maxitems'      => 9999,
					'appearance'    => array(
						'collapse'              => 0,
						'newRecordLinkPosition' => 'bottom',
					),
				),
			),
			'software_relations' => array(
				'exclude' => 0,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.software_relations',
				'config'  => array(
					'type'          => 'inline',
					'foreign_table' => 'tx_extensionrepository_domain_model_relation',
					'foreign_field' => 'version',
					'maxitems'      => 9999,
					'appearance'    => array(
						'collapse'              => 0,
						'newRecordLinkPosition' => 'bottom',
					),
				),
			),
			'author' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.author',
				'config' => array(
					'type'          => 'inline',
					'foreign_table' => 'tx_extensionrepository_domain_model_author',
					'maxitems'      => 1,
				),
			),
			'extension' => array(
				'config' => array(
					'type' => 'passthrough',
				),
			),
			'file_hash' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.file_hash',
				'config'  => array(
					'type'    => 'input',
					'size'    => 30,
					'eval'    => 'trim',
				),
			),
			'extension_provider' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.extension_provider',
				'config'  => array(
					'type'    => 'input',
					'size'    => 30,
					'eval'    => 'trim',
				),
			),
			'has_zip_file' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.has_zip_file',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			'has_images' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:extension_repository/Resources/Private/Language/locallang_db.xml:tx_extensionrepository_domain_model_version.has_images',
				'config'  => array(
					'type'    => 'check',
					'default' => 0,
				),
			),
			't3x_file_size' => array(
				'config' => array(
					'type' => 'passthrough',
				),
			),
			'zip_file_size' => array(
				'config' => array(
					'type' => 'passthrough',
				),
			),
		),
	);
?>