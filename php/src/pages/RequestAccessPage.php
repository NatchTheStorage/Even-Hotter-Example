<?php

namespace App\Pages;

use App\Controllers\RequestAccessPageController;
use Page;
use SilverStripe\Forms\TextField;

class RequestAccessPage extends Page
{
  private static $table_name = "RequestAccessPage";
  private static $singular_name = "Request Access Page";
  private static $plural_name = "Request Access Pages";
  private static $controller_name = RequestAccessPageController::class;

  private static $db = [
    'Title' => 'Text',
    'Blurb' => 'Text',
    'SuccessMessage' => 'Text'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main' , [
      'Content', 'Title', 'Blurb', 'SuccessMessage'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create('Title'),
      TextField::create('Blurb'),
      TextField::create('SuccessMessage', 'Success Message')
    ]);

    return $fields;
  }

  public function isHome()
  {
    return true;
  }
}