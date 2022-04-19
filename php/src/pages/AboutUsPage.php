<?php

namespace App\Pages;

use gorriecoe\Link\Models\Link;
use Page;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class AboutUsPage extends Page
{
  private static $table_name = "AboutUsPage";
  private static $singular_name = "About Us Page";
  private static $plural_name = "About Us Pages";

  private static $db = [
    'FeatureTitle' => 'Text',
    'FeatureContent' => 'Text',
  ];

  private static $has_one = [
    'FeatureImage' => Image::class,
    'FeatureLink' => Link::class,
  ];

  private static $has_many = [
    'Links' => Link::class
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'Content', 'Links'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create('FeatureTitle', 'Top Section Title'),
      TextareaField::create('FeatureContent', 'Top Section Content'),
      HasOneButtonField::create($this, 'FeatureLink'),
      UploadField::create('FeatureImage'),
    ]);

    $fields->addFieldsToTab('Root.Links', [
      GridField::create('Links', 'Links', $this->Links(), GridFieldConfig_RecordEditor::create()
      )
    ]);

    return $fields;
  }

  public function IfAboutUs() {
    if ($this) {
      return true;
    }
    return false;
  }
}