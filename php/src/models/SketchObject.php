<?php

namespace App\Models;

use App\Elements\SketchObjectsElement;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class SketchObject extends DataObject
{
  private static $table_name = "SketchObjects";
  private static $singular_name = "Sketch Object";
  private static $plural_name = "Sketch Objects";

  private static $db = [
    "Title" => "Text",
    'UID' => 'Text',
    "SortOrder" => "Int"
  ];

  private static $has_one = [
    'ParentElement' => SketchObjectsElement::class
  ];


  private static $summary_fields = [
    'Title', 'UID'
  ];

  private static $default_sort = "SortOrder ASC";

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeFieldsFromTab('Root.Main', [
      'ParentElementID', 'SortOrder'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      TextField::create("Title")->setDescription('Just for organisational purposes, the title does not appear on the front end'),
      TextField::create('UID'),
      LiteralField::create('lf1', "<p>To find the UID of the sketch object, go to the SketchFab page with
        your desired object.  In the Page URL, the UID is the string of letters/numbers at the end.</p>
        <p>An example is for sketchfab.com/3d-models/waikato-rescue-helicopter-f806efd65ed84036aeea9c4a1f75b590</p>
        <p>The UID would be f806efd65ed84036aeea9c4a1f75b590</p>")

    ]);

    return $fields;
  }
}
