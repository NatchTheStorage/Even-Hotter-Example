<?php

namespace App\Models;

use App\Pages\MediaHubPage;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class DownloadCard extends DataObject
{
  private static $table_name = "DownloadCards";
  private static $singular_name = "Download Card";
  private static $plural_name = "Download Cards";

  private static $db = [
    "Title" => "Text",
    'Content' => 'Text',
    "SortOrder" => "Int"
  ];

  private static $summary_fields = [
    'Title'
  ];

  private static $has_one = [
    'Image' => Image::class,
    'Downloadable' => File::class,
    'MediaHub' => MediaHubPage::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "SortOrder ASC";

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName([
      'Title', 'SortOrder', 'Image', 'Downloadable', 'DownloadLinkID', 'MediaHubID', 'Content'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Title"),
      TextField::create('Content'),
      UploadField::create('Image'),
      UploadField::create('Downloadable'),
    ]);

    return $fields;
  }
}
