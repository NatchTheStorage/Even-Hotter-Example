<?php

namespace App\Models;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class SubmissionRequestAccess extends DataObject
{
  private static $table_name = "SubmissionRequestAccess";
  private static $singular_name = "Restricted Page Access Request";
  private static $plural_name = "Restricted Page Access Requests";

  private static $db = [
    "Email" => "Text",
    'Option' => 'Text'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    "Email", "Created", 'Option'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Created")
        ->setReadonly(true),
      TextField::create("Option")
        ->setReadonly(true),
      TextField::create('Name')
        ->setReadonly(true)
    ]);

    return $fields;
  }
}