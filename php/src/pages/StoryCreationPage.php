<?php

namespace App\Pages;

use App\Controllers\StoryCreationPageController;
use Page;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class StoryCreationPage extends Page
{
  private static $table_name = "StoryCreationPage";
  private static $singular_name = "Story Creation Page";
  private static $plural_name = "Story Creation Pages";
  private static $controller_name = StoryCreationPageController::class;

  private static $db = [
    "SuccessMessage" => 'HTMLText'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'SuccessMessage'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      HTMLEditorField::create('SuccessMessage', 'Success Message')
        ->setDescription('The message displayed when the user successfully submits the form')
    ]);

    return $fields;
  }
}