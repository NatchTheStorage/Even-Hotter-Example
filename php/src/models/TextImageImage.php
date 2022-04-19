<?php

namespace App\Models;

use App\Elements\TextImageElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class TextImageImage extends DataObject
{
  private static $table_name = "TextImageImages";
  private static $singular_name = "Text-Image Element Image";
  private static $plural_name = "Text-Image Element Images";

  private static $db = [
    "Title" => "Text",
    "SortOrder" => "Int"
  ];

  private static $summary_fields = [
    'Title'
  ];

  private static $has_one = [
    'Parent' => TextImageElement::class,
    'Image' => Image::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "SortOrder ASC";

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName([
      'Title', 'SortOrder', 'Image'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Title"),
      UploadField::create('Image')
    ]);

    return $fields;
  }
}
