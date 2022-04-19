<?php

namespace App\Controllers;

use App\Forms\SubmitDetailsLoginForm;
use App\Models\SubmissionDetails;
use PageController;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\SiteConfig\SiteConfig;

class SubmitDetailsPageController extends PageController implements PermissionProvider
{
  private static $allowed_actions = [
    "SubmitDetailsForm",
    "submitDetails",
    'login',
    'SubmitDetailsLoginForm',
    'new',
    'SubmitDetailsLoginform'
  ];

  private $successful = False;

  public function init()
  {
    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    if ($session->get('SubmitDetails') === 'Success') {
      $this->successful = True;
      $session->clear('SubmitDetails');
    }
    return parent::init();
  }

  public function formSuccess()
  {
    return $this->successful;
  }

  public function SubmitDetailsForm()
  {
    $fields = new FieldList (
      TextField::create("Organisation"),
      TextField::create("Position"),
      TextField::create("OrderNumber"),
      DateField::create("TransportDay"),

      OptionsetField::create("GenderField", "Gender", array("male" => 'Male', 'female' => 'Female')),
      TextField::create('FirstName'),
      TextField::create('LastName'),
      TextField::create('NHI'),
      DateField::create('DateOfBirth', 'DOB'),

      TextField::create('ReferringHospital', 'Referring Hospital'),
      TextField::create('ReferringDoctor', 'Referring Doctor'),
      TextField::create('ReferringContactNumber', 'Contact Number'),
      TextField::create('ReferringContactEmail', 'Contact Email'),
      TextField::create('ReferringWardBed', 'Ward/Bed'),
      TextField::create('ReferringExtensionNumber', 'Extension Number'),

      TextField::create('ReceivingHospital', 'Receiving Hospital'),
      TextField::create('ReceivingDoctor', 'Receiving Doctor'),
      TextField::create('ReceivingContactNumber', 'Contact Number'),
      TextField::create('ReceivingWardBed', 'Ward/Bed'),
      TextField::create('ReceivingExtensionNumber', 'Extension Number'),

      TextareaField::create('Diagnosis', 'Diagnosis / Clinical Condition / Medical History / Reason for Transfer:'),
      TextareaField::create('Medications'),
      TextField::create('DrugAllergies', 'Drug Allergies'),
      TextField::create('Weight'),
      CheckboxSetField::create('InfectionStatus', 'Infection Status', array('nil' => 'Nil', 'MRSA' => 'MRSA', 'VRE' => 'VRE', 'ESBL' => 'ESBL')),
      OptionsetField::create("Mobility", "Mobility",
        array('Stretcher' => 'Stretcher', 'Car Seat (Patient to Supply)' => 'Car Seat (Patient to Supply)', 'Sitting' => 'Sitting', 'Car Seat (WAA to supply)' => 'Car Seat (WAA to supply)')),
      OptionsetField::create('NFRDFR', 'NFR/DFR in Place', array('Yes' => 'Yes', 'No' => 'No')),

      TextField::create('SupportName', 'Name'),
      TextField::create('SupportRelationship', 'Relationship'),
      TextField::create('SupportWeight', 'Weight'),

      CheckboxSetField::create('Documentation', 'Documentation to be included',
        array("Dr's referral letter" => "Dr's referral letter", "ECG's" => "ECG's", 'Nursing referral' => 'Nursing referral',
          'X-ray online / CD' => 'X-ray online / CD', 'Medical notes' => 'Medical notes', 'Discharge summary' => 'Discharge summary',
          'Medication chart' => 'Medication chart', 'Patient ID bracelet' => 'Patient ID bracelet', 'Blood results' => 'Blood results',
          'Other' => 'Other')),

      TextField::create('ACC', 'ACC Number'),
      DateField::create('TransportDate', 'Transport Date'),
      TextField::create('TransportTime', 'Time'),
      TextField::create('CaseNumber', 'Case Number'),
      TextField::create('ContactPerson', 'Contact Person'),

      FileField::create('File1'),
      FileField::create('File2'),
      FileField::create('File3'),
      FileField::create('File4'),

      HiddenField::create('Subsite')->setValue($this->Parent()->Theme),
      CheckboxField::create('Confirm', 'Confirm')
    );

    $actions = new FieldList (
      FormAction::create("submitDetails", "Submit")
        ->addExtraClass('detailform-submit')

    );

    $requiredFields = new RequiredFields([
      'Name',
      'OrderNumber',
      'Confirm'
    ]);

    $form = new Form($this, 'SubmitDetailsForm', $fields, $actions, $requiredFields);
    $form->setTemplate('themes/app/templates/App/Forms/FormSubmitDetails.ss');

    $form->enableSpamProtection();

    return $form;
  }

  public function submitDetails($data, Form $form)
  {
    $submission = new SubmissionDetails();
    $form->saveInto($submission);
    $submission->write();

    $to = SiteConfig::current_site_config()->ContactFormEmail;
    $bcc = "forms@baa.co.nz";

    $email = Email::create();
    $email->setTo($to)
      ->setBCC($bcc)
      ->setSubject('Ambulance Request')
      ->setData($submission)
      ->setHTMLTemplate('EmailSubmitDetails');

    $email->send();

    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    $session->set('SubmitDetails', 'Success');

    return $this->redirect($this->Link());
  }

  public function index()
  {

    //check login
    if (Member::currentUserID() == FALSE) {
      return $this->redirect($this->Link() . 'login');
    }
    $profile = Member::currentUser();
    if (!empty($profile)) {
      if (!Permission::check('ACCESS_SUBMITDETAILS')) {
        return $this->redirect($this->Link() . 'login');
      }
    }

    return [];
  }

  public function SubmitDetailsLoginForm()
  {
    return new SubmitDetailsLoginForm($this, SubmitDetailsLoginForm::class, 'SubmitDetailsLoginForm');
  }

  public function login()
  {
    if (Member::currentUserID()) {
      $profile = Member::currentUser();
      if (Permission::check('ACCESS_SUBMITDETAILS')) {
        return $this->redirect($this->Link());
      }
    }

    return [];
  }

  public function new()
  {
    return [];
  }

  public function providePermissions()
  {
    return [
      'ACCESS_SUBMITDETAILS' => 'Access the Submit Details form on the Westpac Air Ambulance subsite'
    ];
  }
}
