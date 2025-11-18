<?php


use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use WapplerSystems\OidcAddons\Controller\AuthorizationStatusController;

ExtensionUtility::configurePlugin(
    'oidc_addons',
    'LoginLogoutButton',
    [
        AuthorizationStatusController::class => 'status',
    ],
    [
        AuthorizationStatusController::class => 'status',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
