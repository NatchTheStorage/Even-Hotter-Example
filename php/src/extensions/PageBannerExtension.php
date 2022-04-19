<?php

namespace App\Extensions;

use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class PageBannerExtension extends DataExtension
{
  private static $db = [
    'PageBannerTitle' => 'Text',
    'PageBannerSubtitle' => 'Text',


  ];

  private static $defaults = [
    "PageBannerTitle" => "Title!",
    "PageBannerSubtitle" => "Subtitle!",
  ];

  private static $has_one = [
    "PageBannerImage" => Image::class,
    "PageBannerLink" => Link::class,
    'PageBannerVideo' => File::class,
    "PageBannerGIF" => File::class
  ];

  private static $owns = [
    "PageBannerImage",
    "PageBannerLink",
    "PageBannerGIF"
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->removeFieldsFromTab('Root.Banner', [
      'PageBannerTitle', 'PageBannerSubtitle', 'PageBannerLink', 'PageBannerImage'
    ]);
    $fields->addFieldsToTab('Root.Banner', [
      TextField::create('PageBannerTitle', 'Title'),
      TextField::create('PageBannerSubtitle', 'Subtitle'),
      HasOneButtonField::create($this->owner, 'PageBannerLink'),
      UploadField::create('PageBannerImage', 'Image')
        ->setDescription('If both an image and video are added, the video takes priority.'),
      UploadField::create('PageBannerGIF', 'Page Banner GIF')
        ->setDescription('This is displayed on mobile only, not on larger views'),
      UploadField::create('PageBannerVideo', 'Video')
        ->setDescription('If both an image and video are added, the video takes priority'),
    ]);
  }
}