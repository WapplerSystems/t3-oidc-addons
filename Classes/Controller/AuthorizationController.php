<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

#[AsController]
class AuthorizationController extends ActionController
{

    public function redirectToLogoutAction(): ResponseInterface
    {

        debug('dede');
        exit();

        return $this->htmlResponse();
    }


}
