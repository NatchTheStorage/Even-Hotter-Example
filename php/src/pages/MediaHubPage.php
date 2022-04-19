<?php

namespace App\Pages;

use App\Models\DownloadCard;
use MediaHubPageController;
use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;

class MediaHubPage extends Page
{
  private static $table_name = "MediaHubPage";
  private static $singular_name = "Media Hub Page";
  private static $plural_name = "Media Hub Pages";
  private static $controller_name = MediaHubPageController::class;

  private static $db = [
  ];

  private static $has_one = [
  ];

  private static $has_many = [
    'DownloadCards' => DownloadCard::class,
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->removeFieldsFromTab('Root.Main', [
      'Content'
    ]);
    $fields->addFieldsToTab('Root.Main', [
      HeaderField::create('hf3', 'Download Cards'),
      LiteralField::create('lf1','<br>'),
      GridField::create(
        "DownloadCards",
        "Download Cards",
        $this->DownloadCards(),
        GridFieldConfig_RecordEditor::create())
    ]);
    return $fields;
  }
}