<?php

namespace App\Pages;

use App\Controllers\GetInvolvedPageController;
use gorriecoe\Link\Models\Link;
use Page;
use SilverStripe\CMS\Model\RedirectorPage;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class GetInvolvedPage extends RedirectorPage
{
  private static $table_name = "GetInvolvedPage";
  private static $singular_name = "Get Involved Page";
  private static $plural_name = "Get Involved Pages";

  private static $db = [
  ];

  private static $has_one = [];

  private static $has_many = [
    'Links' => Link::class
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'Content', 'Links'
    ]);

    $fields->addFieldsToTab('Root.Links', [
      GridField::create('Links', 'Links', $this->Links(), GridFieldConfig_RecordEditor::create())
    ]);
    return $fields;
  }

  public function IfGetInvolved()
  {
    if ($this) {
      return true;
    }
    return false;
  }
}