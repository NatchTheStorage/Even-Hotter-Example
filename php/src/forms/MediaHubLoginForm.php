<?php

namespace App\Forms;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Security\MemberAuthenticator\LoginHandler;
use SilverStripe\Security\MemberAuthenticator\MemberAuthenticator;
use SilverStripe\Security\MemberAuthenticator\MemberLoginForm;

class MediaHubLoginForm extends MemberLoginForm {
  public function __construct($controller, $action)
  {
    parent::__construct(...func_get_args());
  }

  public function dologin($data, $form){
    $errors = array();

    $request = Injector::inst()->get(HTTPRequest::class);
    $loginHandler = new LoginHandler($request->getUrl(), new MemberAuthenticator());
    $loginHandler->setRequest($request);

    if (!$loginHandler->doLogin($data, $form, $request)){
      $errors[] = 'Incorrect email address or password.';
    }

    if ( ! empty($errors)){
      $this->sessionMessage(implode("\n", $errors), 'bad');
    }

    $this->getController()->redirect($this->getController()->Link() . 'login');
  }
}