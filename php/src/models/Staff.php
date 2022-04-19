<?php

namespace App\Models;

use App\Elements\TeamElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class Staff extends DataObject
{
  private static $table_name = "Staff";
  private static $singular_name = "Staff";
  private static $plural_name = "Staff";

  private static $db = [
    'Name' => 'Text',
    'Job' => 'Text',
    'Description' => 'Text',
    'Email' => 'Text',
    'SortOrder' => 'Int',
  ];

  private static $has_one = [
    'Image' => Image::class,
    'Subsite' => TeamElement::class
  ];

  private static $owns = [
    'Image'
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    'Name', 'Job', 'Subsite.Title' => 'Team'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->removeFieldsFromTab('Root.Main', [
      'SortOrder',
    ]);
    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Name"),
      TextField::create('Job'),
      TextareaField::create('Description'),
      TextField::create('Email'),
      UploadField::create('Image')
    ]);

    return $fields;
  }
}