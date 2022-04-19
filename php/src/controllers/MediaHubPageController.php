<?php

use SilverStripe\Security\Permission;
use \SilverStripe\Security\PermissionProvider;
use App\Forms\MediaHubLoginForm;
use SilverStripe\Security\Member;

class MediaHubPageController extends PageController implements PermissionProvider
{
  private static $allowed_actions = [
    'login',
    'MediaHubLoginForm',
    'new',
    'SubmitMediaHubLoginform'
  ];

  public function index()
  {

    //check login
    if (Member::currentUserID() == FALSE) {
      return $this->redirect($this->Link() . 'login');
    }
    $profile = Member::currentUser();
    if (!empty($profile)) {
      if (!Permission::check('ACCESS_MEDIAHUB')) {
        return $this->redirect($this->Link() . 'login');
      }
    }

    return [];
  }

  public function MediaHubLoginForm()
  {
    return new MediaHubLoginForm($this, MediaHubLoginForm::class, 'MediaHubLoginForm');
  }

  public function login()
  {
    if (Member::currentUserID()) {
      $profile = Member::currentUser();
      if (Permission::check('ACCESS_MEDIAHUB')) {
        return $this->redirect($this->Link());
      }
    }

    return [];
  }

  public function new()
  {
    return [];
  }

  public function providePermissions()
  {
    return [
      'ACCESS_MEDIAHUB' => 'Access the Media Hub'
    ];
  }
}