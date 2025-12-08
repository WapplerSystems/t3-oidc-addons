<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\AsController;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

#[AsController]
class AuthorizationStatusController extends ActionController
{

    public function statusAction(): ResponseInterface
    {

        /** @var Context $context */
        $context = GeneralUtility::makeInstance(Context::class);
        $isLoggedIn = $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');

        $this->view->assign('isLoggedIn', $isLoggedIn);

        if ($this->request->getQueryParams()['loginSuccess'] ?? false) {
            $this->view->assign('showLoginSuccessMessage', true);
        }
        if (($this->request->getQueryParams()['logoutSuccess'] ?? false) || ($this->request->getQueryParams()['logintype'] ?? '' === 'logout')) {
            $this->view->assign('showLogoutSuccessMessage', true);
        }

        return $this->htmlResponse();
    }


}
