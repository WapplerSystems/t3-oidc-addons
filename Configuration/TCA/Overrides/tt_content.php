<?php

use TYPO3\CMS\Core\Schema\Struct\SelectItem;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addPlugin(
    new SelectItem(
        type: 'select',
        label: 'Login / Logout Button',
        value: 'LoginLogoutButton',
        icon: 'ext-oidc-icon'
    ),
    'CType',
    'oidc_addons'
);
