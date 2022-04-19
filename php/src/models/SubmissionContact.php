<?php

namespace App\Models;

use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class SubmissionContact extends DataObject
{
  private static $table_name = "SubmissionContact";
  private static $singular_name = "Contact Submission";
  private static $plural_name = "Contact Submissions";

  private static $db = [
    "Name" => "Varchar(100)",
    "Email" => "Varchar(150)",
    "Phone" => "Varchar(30)",
    "Message" => "Text",
    "Subsite" => 'Text'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    "Created", "Name", "Email", "Phone", "Subsite"
  ];

  public function getCMSFields()
  {
    $subsite = [
      "Waikato" => "Waikato Westpac Rescue Helicopter",
      "TECT" => "Tect Rescue Helicopter",
      "Greenlea" => "Greenlea Rescue Helicopter",
      "Palmerston" => "Palmerston North Rescue Helicopter",
      "Westpac" => "Westpac Air Ambulance",
    ];

    $fields = parent::getCMSFields();

    $fields->addFieldsToTab("Root.Main", [
      DropdownField::create('Subsite', 'Belongs to subsite', $subsite)
        ->setEmptyString('-- select a subsite --'),
      TextField::create("Created")
        ->setReadonly(true),
      TextField::create('Name')
        ->setReadonly(true),
      TextField::create('Email')
        ->setReadonly(true),
      TextField::create('Phone')
        ->setReadonly(true),
      TextareaField::create('Message')
        ->setReadonly(true)
    ]);

    return $fields;
  }
}