<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\AsController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

#[AsController]
class AuthorizationStatusController extends ActionController
{

    public function statusAction(): ResponseInterface
    {

        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        $oidcConfig = $extensionConfiguration->get('oidc');
        $oidcEndpointLogout = $oidcConfig['oidcEndpointLogout'] ?? null;
        $oidcClientKey = $oidcConfig['oidcClientKey'] ?? null;

        /** @var Context $context */
        $context = GeneralUtility::makeInstance(Context::class);
        $isLoggedIn = $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');

        $this->view->assign('isLoggedIn', $isLoggedIn);


        $oidcEndpointLogout .= '?client_id='.$oidcClientKey.'&post_logout_redirect_uri=' . urlencode(
                GeneralUtility::getIndpEnv('TYPO3_SITE_URL').'?logintype=logout'
            );
        $this->view->assign('logoutLink', $oidcEndpointLogout);

        $additionalLoginParameters = [];
        if ($this->settings['redirectToPageAfterLogin']) {
            $redirect_url = GeneralUtility::makeInstance(ContentObjectRenderer::class)
                ->typoLink_URL([
                    'parameter' => $this->settings['redirectToPageAfterLogin'],
                    'linkAccessRestrictedPages' => 1,
                    'forceAbsoluteUrl' => 1,
                ]);
            $additionalLoginParameters['redirect_url'] = $redirect_url;
        }

        $this->view->assign('additionalLoginParameters', $additionalLoginParameters);


        if ($this->request->getQueryParams()['loginSuccess'] ?? false) {
            $this->view->assign('showLoginSuccessMessage', true);
        }
        if (($this->request->getQueryParams()['logoutSuccess'] ?? false) || ($this->request->getQueryParams()['logintype'] ?? '' === 'logout')) {
            $this->view->assign('showLogoutSuccessMessage', true);
        }

        return $this->htmlResponse();
    }


}
