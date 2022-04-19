<?php

namespace App\Extensions;

use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends DataExtension
{
  private static $db = [
    "GoogleTagManagerCode" => "Varchar(16)",

    "ContactPhoneNumber" => "Varchar(255)",
    "ContactFormEmail" => "Varchar(255)",
    "StoryEmail" => "Varchar(255)",
    "CharityNumber" => 'Varchar(127)',

    'SocialLandingFacebook' => 'Text',
    'SocialLandingYoutube' => 'Text',
    'SocialLandingInstagram' => 'Text',
    'SocialLandingLinkedIn' => 'Text'
  ];

  private static $defaults = [
    "ContactPhoneNumber" => "027 123 456",
    "ContactFormEmail" => "support@baa.co.nz",
    'CharityNumber' => '000 000 000'
  ];

  public function updateCMSFields(FieldList $fields)
  {

    $fields->removeByName('Tagline');
    // Add fields
    $fields->addFieldsToTab("Root.Main", [
      TextField::create("GoogleTagManagerCode", "GTM account")
        ->setDescription("Google tag manager account number to be used all across the site (in the format <strong>GTM-XXXXXX</strong>)"),

      HeaderField::create('hf1', 'Contact Details'),
      TextField::create("ContactPhoneNumber", "Phone Number")
        ->setDescription("This is how the phone number will be displayed on the landing page"),
      TextField::create("ContactFormEmail", "Contact Email")
        ->setDescription("This is the email address that will receive contact form entries, you can also view these entries from the contact admin in the left menu"),
      TextField::create("StoryEmail", "Story Submission Email")
        ->setDescription("This is the email address that will receive story submissions"),
      TextField::create("CharityNumber", "Charity Number")
        ->setDescription("The registered charity code that appears on the landing page"),


      HeaderField::create('hfsocials', 'Social Links'),
      LiteralField::create('lfsocials', '<p>Social media links for the landing page go here</p><br>'),
      TextField::create('SocialLandingFacebook', 'Facebook Link'),
      TextField::create('SocialLandingYoutube', 'Youtube Link'),
      TextField::create('SocialLandingInstagram', 'Instagram Link'),
      TextField::create('SocialLandingLinkedIn', 'LinkedIn Link'),
    ]);
  }
}