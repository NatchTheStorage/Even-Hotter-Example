<?php

namespace App\Pages;

use Page;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class DonatePage extends Page
{
  private static $table_name = "DonatePage";
  private static $singular_name = "Donate Page";
  private static $plural_name = "Donate Pages";

  private static $db = [
    'BlockTitle' => 'Text',
    'Content' => 'Text',
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main' ,[
      'Content', 'BlockTitle'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create('BlockTitle', 'Content Title'),
      TextareaField::create('Content')
    ]);

    return $fields;
  }
}