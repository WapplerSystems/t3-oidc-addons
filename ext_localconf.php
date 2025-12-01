<?php


use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use WapplerSystems\OidcAddons\Controller\AuthorizationController;
use WapplerSystems\OidcAddons\Controller\AuthorizationStatusController;

ExtensionUtility::configurePlugin(
    'oidc_addons',
    'LoginLogoutButton',
    [
        AuthorizationStatusController::class => 'status',
        AuthorizationController::class => 'redirectToLogout',
    ],
    [
        AuthorizationStatusController::class => 'status',
        AuthorizationController::class => 'redirectToLogout',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
