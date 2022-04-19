<?php

namespace App\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;

class SubmissionDetails extends DataObject
{
  private static $table_name = "SubmissionDetails";
  private static $singular_name = "Detail Submission";
  private static $plural_name = "Detail Submissions";

  private static $db = [
    "Organisation" => "Text",
    'Position' => 'Text',
    'OrderNumber' => 'Text',
    'TransportDay' => 'Text',

    'GenderField' => 'Text',
    'FirstName' => 'Text',
    'LastName' => 'Text',
    'NHI' => 'Text',
    'DateOfBirth' => 'Text',

    'ReferringHospital' => 'Text',
    'ReferringDoctor' => 'Text',
    'ReferringContactNumber' => 'Text',
    'ReferringContactEmail' => 'Text',
    'ReferringWardBed' => 'Text',
    'ReferringExtensionNumber' => 'Text',

    'ReceivingHospital' => 'Text',
    'ReceivingDoctor' => 'Text',
    'ReceivingContactNumber' => 'Text',
    'ReceivingWardBed' => 'Text',
    'ReceivingExtensionNumber' => 'Text',

    'Diagnosis' => 'Text',
    'Medications' => 'Text',
    'DrugAllergies' => 'Text',
    'Weight' => 'Text',

    'InfectionStatus' => 'Text',
    'Mobility' => 'Text',
    'NFRDFR' => 'Text',

    'SupportName' => 'Text',
    'SupportRelationship' => 'Text',
    'SupportWeight' => 'Text',

    'Documentation' => 'Text',

    'ACC' => 'Text',
    'TransportDate' => 'Text',
    'TransportTime' => 'Text',
    'CaseNumber' => 'Text',
    'ContactPerson' => 'Text',

    'Subsite' => 'Text',

    "SortOrder" => "Int"
  ];

  private static $default_sort = "Created DESC";

  private static $summary_fields = [
    'Created', 'Organisation', 'OrderNumber', 'Subsite'
  ];

  private static $has_one = [
    'File1' => File::class,
    'File2' => File::class,
    'File3' => File::class,
    'File4' => File::class,
  ];



  public function getCMSFields()
  {
    $subsite = [
      "Waikato" => "Waikato Westpac Rescue Helicopter",
      "TECT" => "Tect Rescue Helicopter",
      "Greenlea" => "Greenlea Rescue Helicopter",
      "Palmerston" => "Palmerston North Rescue Helicopter",
      "Westpac" => "Westpac Air Ambulance",
    ];

    $fields = parent::getCMSFields();

    $fields->removeByName([
      'Title', 'SortOrder','Subsite'
    ]);

    $fields->addFieldsToTab("Root.Main", [
      DropdownField::create('Subsite', 'Belongs to subsite', $subsite)
        ->setEmptyString('-- select a subsite --'),
      ReadonlyField::create("Organisation", "Organisation"),
//      DropdownField::create("UnknownField", "Unknown Field", [
//        0 => "Test",
//        1 => "Test, but second"
//      ])->setAttribute('readonly', 'true'),
      ReadonlyField::create("Position"),
      ReadonlyField::create("OrderNumber", "Order Number"),
      ReadonlyField::create("TransportDay", "Transport Day"),

      ReadonlyField::create("GenderField", "Gender Field"),
      ReadonlyField::create("FirstName", "First Name"),
      ReadonlyField::create("LastName", "Last Name"),
      ReadonlyField::create("NHI"),
      ReadOnlyField::create("DateOfBirth", "Date of Birth"),

      ReadonlyField::create("ReferringHospital", "Referring Hospital"),
      ReadonlyField::create("ReferringDoctor", "Referring Doctor"),
      ReadonlyField::create("ReferringContactNumber", "Referring Contact Number"),
      ReadonlyField::create("ReferringContactEmail", "Referring Contact Email"),
      ReadonlyField::create("ReferringWardBed", "Referring Ward Bed"),
      ReadonlyField::create("ReferringExtensionNumber", "Referring Extension Number"),

      ReadonlyField::create("ReceivingHospital", "Receiving Hospital"),
      ReadonlyField::create("ReceivingDoctor", "Receiving Doctor"),
      ReadonlyField::create("ReceivingContactNumber", "Receiving Contact Number"),
      ReadonlyField::create("ReceivingWardBed", "Receiving Ward Bed"),
      ReadonlyField::create("ReceivingExtensionNumber", "Receiving Extension Number"),

      TextareaField::create("Diagnosis")->setAttribute('readonly', 'true'),
      TextareaField::create("Medications")->setAttribute('readonly', 'true'),
      ReadonlyField::create("DrugAllergies", "Drug Allergies"),
      ReadonlyField::create("Weight"),

      CheckboxSetField::create('InfectionStatus', 'Infection Status', array(0 => 'Nil', 1 => 'MRSA', 2 => 'VRE', 3 => 'ESBL')),
      OptionsetField::create("Mobility", "Mobility",
        array(0 => 'Stretcher', 1 => 'Car Seat (Patient to Supply)', 2 => 'Sitting', 3 => 'Car Seat (WAA to supply)')),
      OptionsetField::create('NFRDFR', 'NFR/DFR in Place', array(0 => 'Yes', 1 => 'No')),

      ReadonlyField::create('SupportName', 'Name'),
      ReadonlyField::create('SupportRelationship', 'Relationship'),
      ReadonlyField::create('SupportWeight', 'Weight'),

      CheckboxSetField::create('Documentation', 'Documentation to be included',
        array(0 => "Dr's referral letter", 1 => "ECG's", 2 => 'Nursing referral', 3 => 'X-ray online / CD',
          4 => 'Medical notes', 5 => 'Discharge summary', 6 => 'Medication chart', 7 => 'Patient ID bracelet',
          8 => 'Blood results', 9 => 'Other')),

      ReadonlyField::create('ACC', 'ACC Number'),
      ReadonlyField::create('TransportDate', 'Transport Date'),
      ReadonlyField::create('TransportTime', 'Time'),
      ReadonlyField::create('CaseNumber', 'Case Number'),
      ReadonlyField::create('ContactPerson', 'Contact Person'),

      UploadField::create('File1'),
      UploadField::create('File2'),
      UploadField::create('File3'),
      UploadField::create('File4'),
    ]);

    return $fields;
  }
}
