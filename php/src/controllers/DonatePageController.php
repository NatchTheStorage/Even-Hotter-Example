<?php

namespace App\Controllers;

use App\Models\Story;
use PageController;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\SiteConfig\SiteConfig;

class DonatePageController extends PageController
{
  private static $allowed_actions = [
    "DonateForm", "submitDonate"
  ];

  private $successful = False;

  public function init()
  {
    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    if ($session->get('Donate') === 'Success') {
      $this->successful = True;
      $session->clear('Donate');
    }
    return parent::init();
  }

  public function formSuccess()
  {
    return $this->successful;
  }

  public function DonateForm()
  {
    $fields = new FieldList (
      OptionsetField::create("DonationType", "Donation Type", array("single" => 'Single Donation', 'regular' => 'Regular Donation')),
      HiddenField::create('Subsite')->setValue($this->Parent()->Theme)
    );
    $actions = new FieldList(
      FormAction::create("submitStory", "SUBMIT")
        ->addExtraClass('storyform-submit')
    );
    $requiredFields = new RequiredFields([
      'Name',
      'Email',
      'PhoneNumber',
      'Title',
      'Date'
    ]);

    $form = new Form($this, 'StoryForm', $fields, $actions, $requiredFields);
    $form->setTemplate('themes/app/templates/App/Forms/FormStoryCreation.ss');

    $form->enableSpamProtection();

    return $form;
  }

  public function submitStory($data, Form $form)
  {
    $submission = new Story();

    $form->saveInto($submission);
    $submission->write();

    $to = SiteConfig::current_site_config()->ContactFormEmail;
    $bcc = "forms@baa.co.nz";

//    $email = Email::create();
//    $email->setTo($to)
//      ->setBCC($bcc)
//      ->setSubject('Story Created')
//      ->setData($submission)
//      ->setHTMLTemplate('EmailStory');
//    $email->send();

    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    $session->set('Donate', 'Success');

    return $this->redirect($this->Link());
  }
}