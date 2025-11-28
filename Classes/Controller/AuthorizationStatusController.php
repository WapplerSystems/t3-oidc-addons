<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AuthorizationStatusController extends ActionController
{

    public function statusAction(): ResponseInterface
    {

        /** @var Context $context */
        $context = GeneralUtility::makeInstance(Context::class);
        $isLoggedIn = $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');

        $this->view->assign('isLoggedIn', $isLoggedIn);

        return $this->htmlResponse();
    }


}
