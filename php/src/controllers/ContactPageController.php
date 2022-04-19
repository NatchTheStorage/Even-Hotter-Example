<?php

namespace App\Controllers;

use PageController;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\Form;
use App\Models\SubmissionContact;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\SiteConfig\SiteConfig;

class ContactPageController extends PageController
{
  private static $allowed_actions = [
    "ContactForm", "submitContact"
  ];

  private $successful = False;

  public function init()
  {
    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    if ($session->get('Contact') === 'Success') {
      $this->successful = True;
      $session->clear('Contact');
    }
    return parent::init();
  }
  public function formSuccess()
  {
    return $this->successful;
  }

  public function ContactForm()
  {
    $form = new Form(
      $this,
      __FUNCTION__,
      FieldList::create(
        TextField::create("Name"),
        EmailField::create("Email", "Email Address"),
        TextField::create("Phone"),
        TextareaField::create('Message'),
        HiddenField::create('Subsite')->setValue($this->Parent()->Theme)
      ),
      FieldList::create(
        FormAction::create("submitContact", "Submit")
      ),
      RequiredFields::create([
        "Name", "Email", "Message"
      ])

    );

    $form->enableSpamProtection();

    return $form;
  }

  public function submitContact($data, Form $form)
  {
    $submission = new SubmissionContact();
    $form->saveInto($submission);
    $submission->write();

    $to = SiteConfig::current_site_config()->ContactFormEmail;
    $bcc = "forms@baa.co.nz";

    $email = Email::create();
    $email->setTo($to)
      ->setBCC($bcc)
      ->setSubject('Contact Enquiry')
      ->setData($submission)
      ->setHTMLTemplate('EmailContact');

    $email->send();

    $request = Injector::inst()->get(HTTPRequest::class);
    $session = $request->getSession();
    $session->set('Contact', 'Success');

    return $this->redirect($this->Link());
  }
}