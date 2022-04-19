<?php

namespace App\Models;

use App\Elements\HelicoptersElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Helicopter extends DataObject
{
  private static $table_name = "Helicopter";
  private static $singular_name = "Helicopter";
  private static $plural_name = "Helicopters";

  private static $db = [
    "Name" => "Text",
    "SortOrder" => "Int",
    'Description' => 'Text',
    'Footer' => 'Text'
  ];

  private static $summary_fields = [
    'Title', 'Subsite.Title' => 'Subsite'
  ];

  private static $has_one = [
    'Image' => Image::class,
    'Subsite' => HelicoptersElement::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "SortOrder ASC";

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName([
      'Title', 'SortOrder', 'AboutUsID', 'ElementID', 'Name', 'Image', 'Description', 'Footer'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Name"),
      UploadField::create('Image'),
      TextareaField::create('Description'),
      TextareaField::create('Footer')
    ]);

    return $fields;
  }
}
