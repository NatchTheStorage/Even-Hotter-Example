<?php

namespace App\Pages;

use Page;
use SilverStripe\Forms\TextField;

class ElementalPage extends Page
{
  private static $table_name = "ElementalPage";
  private static $singular_name = "Elemental Page";
  private static $plural_name = "Elemental Pages";

  private static $db = [
    "Title" => 'Text',
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'Content'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create('Title'),
    ]);

    return $fields;
  }
}