<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\AsController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Http\RedirectResponse as RedirectResponseAlias;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

#[AsController]
class AuthorizationController extends ActionController
{

    public function redirectToLogoutAction(): ResponseInterface
    {

        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        $oidcConfig = $extensionConfiguration->get('oidc');
        $oidcEndpointLogout = $oidcConfig['oidcEndpointLogout'] ?? null;

        $oidcEndpointLogout .= '?redirect_uri=' . urlencode(
            GeneralUtility::getIndpEnv('TYPO3_SITE_URL')
        );

        return new RedirectResponseAlias($oidcEndpointLogout);
    }


}
