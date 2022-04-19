<?php

namespace App\Pages;

use App\Controllers\EventHolderPageController;
use Page;


class EventHolderPage extends Page
{
  private static $table_name = "EventHolderPage";
  private static $singular_name = "Event Holder Page";
  private static $plural_name = "Event Holder Pages";
  private static $controller_name = EventHolderPageController::class;

  private static $db = [
  ];

  private static $has_one = [
  ];

  private static $has_many = [
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
    ]);

    return $fields;
  }
}