<?php

namespace App\Models;

use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Sponsor extends DataObject
{
  private static $table_name = "Sponsor";
  private static $singular_name = "Sponsor";
  private static $plural_name = "Sponsors";

  private static $db = [
    "Name" => "Text",
    'Type' => 'Text',
    'Subsite' => 'Text',
    "SortOrder" => "Int",
  ];

  private static $summary_fields = [
    'Title', 'Type', 'Subsite'
  ];

  private static $has_one = [
    'Image' => Image::class,
    'Link' => Link::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "SortOrder ASC";

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

    $fields->removeByName([
      'Title', 'SortOrder', 'Type', 'Image', 'LinkID'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Name"),
      DropdownField::create('Type', 'Sponsor Type', [
        'principal' => 'Principal Sponsor',
        'associate' => 'Associate Sponsor',
        'supporting' => 'Supporting Sponsor',
        'tail' => 'Tail Sponsor',
        'belly' => 'Belly Sponsor',
      ])->setEmptyString('- select a type -'),
      CheckboxSetField::create('Subsite', 'Belongs to subsites', $subsite),
      HasOneButtonField::create($this,'Link','Link'),
      UploadField::create('Image')
    ]);

    return $fields;
  }
}
