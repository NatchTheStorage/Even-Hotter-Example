<?php

namespace App\Models;

use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Event extends DataObject
{
  private static $table_name = "Events";
  private static $singular_name = "Event";
  private static $plural_name = "Events";

  private static $db = [
    'Title' => 'Text',
    'Date' => 'Date',
    'Time' => 'Text',
    'Location' => 'Text',
    'Content' => 'Text',
    'Subsite' => 'Text',
    'SortOrder' => 'Int'
  ];

  private static $has_one = [
    'Image' => Image::class,
    'InternalLink' => Link::class,
    'ExternalLink' => Link::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    'Created', 'Title', 'Subsite'
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
      'SortOrder', 'Title', 'Date', 'Time', 'Content', 'Image', 'Location', 'InternalLinkID', 'ExternalLinkID'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Title"),
      DropdownField::create('Subsite', 'Belongs to Subsite', $subsite)
      ->setEmptyString('-- select a subsite --'),
      DateField::create('Date'),
      TextField::create('Time'),
      HasOneButtonField::create($this->owner,'ExternalLink')
      ->setDescription('This is the link button that appears in the details box at the top<br><br>'),
      TextField::create('Location'),

      TextareaField::create('Content'),
      UploadField::create('Image'),

      HasOneButtonField::create($this->owner,'InternalLink')
      ->setDescription('This is the link button that appears below the content')
    ]);

    return $fields;
  }

  public function Link($inclEventPage = false)
  {
    $segment = "fundraising-events/event/{$this->ID}";

    if ($inclEventPage) {
      $eventPages = Event::get()->filter('ID', $this->ID);
      $eventPage = $eventPages
        ->first();

      if (!$eventPage) {
        $eventPage = $eventPages->first();
      }
    }
    return $segment;
  }
}