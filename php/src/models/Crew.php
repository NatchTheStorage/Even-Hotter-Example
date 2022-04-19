<?php

namespace App\Models;

use App\Elements\CrewElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Crew extends DataObject
{
  private static $table_name = "Crew";
  private static $singular_name = "Crew";
  private static $plural_name = "Crew";

  private static $db = [
    "Name" => "Text",
    'CrewType' => 'Text',
    "SortOrder" => "Int",
  ];

  private static $summary_fields = [
    'Title' => 'Name', 'CrewType', 'Subsite.Title' => 'Team'
  ];

  private static $has_one = [
    'Image' => Image::class,
    'Subsite' => CrewElement::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "SortOrder ASC";

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName([
      'Title', 'SortOrder'
    ]);

    $roles = [
      "Pilot" => "Pilot",
      "Paramedic" => "Paramedic",
      "Crewman" => 'Crewman',
      "Operations" => 'Operations Team',
      "Board" => 'Board Members'
    ];

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Name"),
      DropdownField::create('CrewType', 'Crew Job', $roles)
        ->setEmptyString('-- choose a role --'),
      UploadField::create('Image')
    ]);

    return $fields;
  }
}
