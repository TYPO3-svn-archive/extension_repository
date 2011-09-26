<?php
	$extensionClassesPath = t3lib_extMgm::extPath('extension_repository', 'Classes/');

	return array(
		'tx_extensionrepository_controller_abstractcontroller'                          => $extensionClassesPath . 'Controller/AbstractController.php',
		'tx_extensionrepository_controller_authorcontroller'                            => $extensionClassesPath . 'Controller/AuthorController.php',
		'tx_extensionrepository_controller_categorycontroller'                          => $extensionClassesPath . 'Controller/CategoryController.php',
		'tx_extensionrepository_controller_extensioncontroller'                         => $extensionClassesPath . 'Controller/ExtensionController.php',
		'tx_extensionrepository_controller_mediacontroller'                             => $extensionClassesPath . 'Controller/MediaController.php',
		'tx_extensionrepository_controller_tagcontroller'                               => $extensionClassesPath . 'Controller/TagController.php',
		'tx_extensionrepository_domain_model_abstractentity'                            => $extensionClassesPath . 'Domain/Model/AbstractEntity.php',
		'tx_extensionrepository_domain_model_abstractvalueobject'                       => $extensionClassesPath . 'Domain/Model/AbstractValueObject.php',
		'tx_extensionrepository_domain_model_author'                                    => $extensionClassesPath . 'Domain/Model/Author.php',
		'tx_extensionrepository_domain_model_category'                                  => $extensionClassesPath . 'Domain/Model/Category.php',
		'tx_extensionrepository_domain_model_experience'                                => $extensionClassesPath . 'Domain/Model/Experience.php',
		'tx_extensionrepository_domain_model_extension'                                 => $extensionClassesPath . 'Domain/Model/Extension.php',
		'tx_extensionrepository_domain_model_extensionmanagercacheentry'                => $extensionClassesPath . 'Domain/Model/ExtensionManagerCacheEntry.php',
		'tx_extensionrepository_domain_model_media'                                     => $extensionClassesPath . 'Domain/Model/Media.php',
		'tx_extensionrepository_domain_model_relation'                                  => $extensionClassesPath . 'Domain/Model/Relation.php',
		'tx_extensionrepository_domain_model_tag'                                       => $extensionClassesPath . 'Domain/Model/Tag.php',
		'tx_extensionrepository_domain_model_version'                                   => $extensionClassesPath . 'Domain/Model/Version.php',
		'tx_extensionrepository_domain_repository_abstractrepository'                   => $extensionClassesPath . 'Domain/Repository/AbstractRepository.php',
		'tx_extensionrepository_domain_repository_authorrepository'                     => $extensionClassesPath . 'Domain/Repository/AuthorRepository.php',
		'tx_extensionrepository_domain_repository_categoryrepository'                   => $extensionClassesPath . 'Domain/Repository/CategoryRepository.php',
		'tx_extensionrepository_domain_repository_extensionmanagercacheentryrepository' => $extensionClassesPath . 'Domain/Repository/ExtensionManagerCacheEntryRepository.php',
		'tx_extensionrepository_domain_repository_extensionrepository'                  => $extensionClassesPath . 'Domain/Repository/ExtensionRepository.php',
		'tx_extensionrepository_domain_repository_mediarepository'                      => $extensionClassesPath . 'Domain/Repository/MediaRepository.php',
		'tx_extensionrepository_domain_repository_tagrepository'                        => $extensionClassesPath . 'Domain/Repository/TagRepository.php',
		'tx_extensionrepository_domain_repository_versionrepository'                    => $extensionClassesPath . 'Domain/Repository/VersionRepository.php',
		'tx_extensionrepository_provider_abstractprovider'                              => $extensionClassesPath . 'Provider/AbstractProvider.php',
		'tx_extensionrepository_provider_mirrorprovider'                                => $extensionClassesPath . 'Provider/MirrorProvider.php',
		'tx_extensionrepository_provider_fileprovider'                                  => $extensionClassesPath . 'Provider/FileProvider.php',
		'tx_extensionrepository_provider_providerinterface'                             => $extensionClassesPath . 'Provider/ProviderInterface.php',
		'tx_extensionrepository_provider_providermanager'                               => $extensionClassesPath . 'Provider/ProviderManager.php',
		'tx_extensionrepository_provider_soapprovider'                                  => $extensionClassesPath . 'Provider/SoapProvider.php',
		'tx_extensionrepository_object_objectbuilder'                                   => $extensionClassesPath . 'Object/ObjectBuilder.php',
		'tx_extensionrepository_persistence_abstractpersistence'                        => $extensionClassesPath . 'Persistence/AbstractPersistence.php',
		'tx_extensionrepository_persistence_persistenceinterface'                       => $extensionClassesPath . 'Persistence/PersistenceInterface.php',
		'tx_extensionrepository_persistence_registry'                                   => $extensionClassesPath . 'Persistence/Registry.php',
		'tx_extensionrepository_persistence_session'                                    => $extensionClassesPath . 'Persistence/Session.php',
		'tx_extensionrepository_service_documentation'                                  => $extensionClassesPath . 'Service/Documentation.php',
		'tx_extensionrepository_service_image'                                          => $extensionClassesPath . 'Service/Image.php',
		'tx_extensionrepository_service_mirror'                                         => $extensionClassesPath . 'Service/Mirror.php',
		'tx_extensionrepository_service_soap'                                           => $extensionClassesPath . 'Service/Soap.php',
		'tx_extensionrepository_service_ter'                                            => $extensionClassesPath . 'Service/Ter.php',
		'tx_extensionrepository_task_abstracttask'                                      => $extensionClassesPath . 'Task/AbstractTask.php',
		'tx_extensionrepository_task_abstractadditionalfieldprovider'                   => $extensionClassesPath . 'Task/AbstractAdditionalFieldProvider.php',
		'tx_extensionrepository_task_createextensionfilestask'                          => $extensionClassesPath . 'Task/CreateExtensionFilesTask.php',
		'tx_extensionrepository_task_createextensionfilestaskadditionalfieldprovider'   => $extensionClassesPath . 'Task/CreateExtensionFilesTaskAdditionalFieldProvider.php',
		'tx_extensionrepository_task_updatedownloadstask'                               => $extensionClassesPath . 'Task/UpdateDownloadsTask.php',
		'tx_extensionrepository_task_updatedownloadstaskadditionalfieldprovider'        => $extensionClassesPath . 'Task/UpdateDownloadsTaskAdditionalFieldProvider.php',
		'tx_extensionrepository_task_updateextensionlisttask'                           => $extensionClassesPath . 'Task/UpdateExtensionListTask.php',
		'tx_extensionrepository_task_updateextensionlisttaskadditionalfieldprovider'    => $extensionClassesPath . 'Task/UpdateExtensionListTaskAdditionalFieldProvider.php',
		'tx_extensionrepository_utility_archive'                                        => $extensionClassesPath . 'Utility/Archive.php',
		'tx_extensionrepository_utility_array'                                          => $extensionClassesPath . 'Utility/Array.php',
		'tx_extensionrepository_utility_datetime'                                       => $extensionClassesPath . 'Utility/Datetime.php',
		'tx_extensionrepository_utility_file'                                           => $extensionClassesPath . 'Utility/File.php',
		'tx_extensionrepository_utility_typoscript'                                     => $extensionClassesPath . 'Utility/TypoScript.php',
		'tx_extensionrepository_utility_version'                                        => $extensionClassesPath . 'Utility/Version.php',
		'Tx_ExtensionRepository_view_extension_listjson'                                => $extensionClassesPath . 'View/Extension/ListJson.php',
		'Tx_ExtensionRepository_view_extension_listlatestjson'                          => $extensionClassesPath . 'View/Extension/ListLatestJson.php',
		'tx_extensionrepository_viewhelpers_cdataviewhelper'                            => $extensionClassesPath . 'ViewHelpers/CdataViewHelper.php',
		'tx_extensionrepository_viewhelpers_chartviewhelper'                            => $extensionClassesPath . 'ViewHelpers/ChartViewHelper.php',
		'tx_extensionrepository_viewhelpers_cropviewhelper'                             => $extensionClassesPath . 'ViewHelpers/CropViewHelper.php',
		'tx_extensionrepository_viewhelpers_datetimeviewhelper'                         => $extensionClassesPath . 'ViewHelpers/DateTimeViewHelper.php',
		'tx_extensionrepository_viewhelpers_documentationlinkviewhelper'                => $extensionClassesPath . 'ViewHelpers/DocumentationLinkViewHelper.php',
		'tx_extensionrepository_viewhelpers_extensioniconviewhelper'                    => $extensionClassesPath . 'ViewHelpers/ExtensionIconViewHelper.php',
		'tx_extensionrepository_viewhelpers_extensionimageviewhelper'                   => $extensionClassesPath . 'ViewHelpers/ExtensionImageViewHelper.php',
		'tx_extensionrepository_viewhelpers_filesizeviewhelper'                         => $extensionClassesPath . 'ViewHelpers/FilesizeViewHelper.php',
		'tx_extensionrepository_viewhelpers_formatviewhelper'                           => $extensionClassesPath . 'ViewHelpers/FormatViewHelper.php',
		'tx_extensionrepository_viewhelpers_rawviewhelper'                              => $extensionClassesPath . 'ViewHelpers/RawViewHelper.php',
	);
?>