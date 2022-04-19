<?php

namespace App\Pages;

use App\Controllers\SubmitDetailsPageController;
use Page;
use SilverStripe\Forms\TextField;

class SubmitDetailsPage extends Page
{
  private static $table_name = "SubmitDetailsPage";
  private static $singular_name = "Submit Details Page";
  private static $plural_name = "Submit Details Pages";
  private static $controller_name = SubmitDetailsPageController::class;

  private static $db = [
    "SuccessMessage" => 'Text',
    "PhoneNumber" => 'Text'
  ];

  private static $has_one = [
  ];

  private static $has_many = [
  ];

  private static $sort_order = [

  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main' ,[
      'Content'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create('PhoneNumber', 'Phone Number'),
      TextField::create('SuccessMessage', 'Success Message')
        ->setDescription('The message displayed when the user successfully submits the form')
    ]);

    return $fields;
  }
}