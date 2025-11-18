<?php

namespace WapplerSystems\OidcAddons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AuthorizationStatusController extends ActionController
{

    public function statusAction(): ResponseInterface
    {

        return $this->htmlResponse();
    }


}
