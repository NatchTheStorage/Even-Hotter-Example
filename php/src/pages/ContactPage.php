<?php

namespace App\Pages;

use App\Controllers\ContactPageController;
use Page;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class ContactPage extends Page
{
  private static $table_name = "ContactPages";
  private static $singular_name = "Contact Page";
  private static $plural_name = "Contact Pages";
  private static $controller_name = ContactPageController::class;

  private static $db = [
    "Content" => 'Text',
    "SuccessMessage" => 'Text'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'Content', 'SuccessMessage'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextareaField::create('Content'),
      TextField::create('SuccessMessage', 'Success Message')
        ->setDescription('The message displayed when the user successfully submits the form')
    ]);

    return $fields;
  }
}