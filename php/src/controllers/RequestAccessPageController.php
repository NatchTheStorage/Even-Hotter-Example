<?php

namespace App\Controllers;

use App\Models\SubmissionRequestAccess;
use App\Pages\HomePage;
use PageController;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\RequiredFields;

class RequestAccessPageController extends PageController
{
  private static $allowed_actions = [
    "RequestAccessForm", "submitRequestAccess"
  ];

  private $successful = False;

  public function init()
  {
    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    if ($session->get('RequestAccess') === 'Success') {
      $this->successful = True;
      $session->clear('RequestAccess');
    }
    return parent::init();
  }

  public function formSuccess()
  {
    return $this->successful;
  }

  public function RequestAccessForm()
  {
    $fields = new FieldList (
      EmailField::create("Email")
        ->addExtraClass('storyform-textfield'),
      OptionsetField::create('Option', 'Page', array('Media Hub' => 'Media Hub', 'Air Ambulance Form' => 'Air Ambulance Form')),
    );
    $actions = new FieldList(
      FormAction::create("submitRequestAccess", "SUBMIT")
        ->addExtraClass('storyform-submit')
    );
    $requiredFields = new RequiredFields([
      "Email", "Option"
    ]);

    $form = new Form($this, 'RequestAccessForm', $fields, $actions, $requiredFields);
    $form->setTemplate('themes/app/templates/App/Forms/FormRequestAccess.ss');


//    $form->enableSpamProtection();

    return $form;
  }

  public function submitRequestAccess($data, Form $form)
  {
    $submission = new SubmissionRequestAccess();

    $form->saveInto($submission);
    $submission->write();

    $to = $submission->Option == 'Air Ambulance Form' ? $this->getEmailTarget('airambulance') : $this->getEmailTarget();
    $bcc = "forms@baa.co.nz";

    $email = Email::create();
    $email->setTo($to)
      ->setBCC($bcc)
      ->setSubject('Request to Access a Restricted Page')
      ->setData($submission)
      ->setHTMLTemplate('EmailRequest');

    $email->send();

    $form->sessionMessage("You've sent in a request gain access!", 'good');

    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    $session->set('RequestAccess', 'Success');


    return $this->redirect($this->Link());
  }

  private function getEmailTarget($target = null) {
    $homepage = HomePage::get()->filter('Theme', $this->init())->first();
    if ($target === 'airambulance') {
      return $homepage->SubmitDetailsEmail;
    }
    return $homepage->MediaHubEmail;
  }
}