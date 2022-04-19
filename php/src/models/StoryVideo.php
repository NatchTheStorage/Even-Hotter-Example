<?php

namespace App\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class StoryVideo extends DataObject
{
  private static $table_name = "StoryVideos";
  private static $singular_name = "Story Video";
  private static $plural_name = "Story Videos";

  private static $db = [
    'Name' => 'Text',
    'Date' => 'Date',
    'VideoLink' => 'Text',
    'Subsite' => 'Text'
  ];

  private static $has_one = [
    'Thumbnail' => Image::class
  ];

  private static $owns = [
    'Thumbnail'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    'Created', 'Title', 'Name', 'Subsite'
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
    $fields->removeFieldsFromTab('Root.Main', [
      'Name', 'Date', 'VideoLink', 'Subsite'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      DropdownField::create('Subsite', 'Belongs to Subsite', $subsite)->setEmptyString('-- select a subsite --'),
      TextField::create("Name"),
      DateField::create("Date"),
      UploadField::create('Thumbnail'),
      TextField::create("VideoLink", 'Video Link'),
    ]);

    return $fields;
  }
}