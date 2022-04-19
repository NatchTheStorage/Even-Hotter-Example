<?php

namespace App\Pages;

use App\Controllers\StoryHolderPageController;
use gorriecoe\Link\Models\Link;
use Page;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class StoryHolderPage extends Page
{
  private static $table_name = "StoryHolderPage";
  private static $singular_name = "Story Holder Page";
  private static $plural_name = "Story Holder Pages";
  private static $controller_name = StoryHolderPageController::class;

  private static $db = [
    'Content' => 'HTMLText',
    'SubbannerText' => 'Text',
    'PageHeader' => 'Text'
  ];

  private static $has_one = [
    'SubbannerLink' => Link::class
  ];

  private static $sort_order = [

  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main' ,[
      'Content'
    ]);
    $fields->addFieldsToTab("Root.Main", [
      HTMLEditorField::create('Content'),
      HeaderField::create('hf1', 'Area below Banner'),
      TextField::create('SubbannerText', 'Sub-banner Title'),
      HasOneButtonField::create($this, 'SubbannerLink', 'Link')
      ->setDescription('The name of the link will be displayed as text in the button')
    ]);

    return $fields;
  }
}