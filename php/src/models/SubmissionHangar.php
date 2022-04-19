<?php

namespace App\Models;

use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class SubmissionHangar extends DataObject
{
  private static $table_name = "SubmissionHangar";
  private static $singular_name = "Hangar Submission";
  private static $plural_name = "Hangar Submissions";

  private static $db = [
    "Name" => "Varchar(100)",
    "Email" => "Varchar(150)",
    "Organisation" => "Varchar(100)",
    "Date" => "Date",
    "Subsite" => 'Text'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    "Created", "Name", "Email", "Organisation", "Date", "Subsite"
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
        ->setEmptyString('-- select a subsite --')
        ->setReadonly(true),
      TextField::create("Created")
        ->setReadonly(true),
      TextField::create('Name')
        ->setReadonly(true),
      TextField::create('Email')
        ->setReadonly(true),
      TextField::create('Organisation')
        ->setReadonly(true),
      TextareaField::create('Date')
        ->setReadonly(true),
    ]);

    return $fields;
  }
}