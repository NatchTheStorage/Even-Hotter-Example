<?php

namespace App\Models;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class SubmissionNewsletter extends DataObject
{
    private static $table_name = "SubmissionNewsletter";
    private static $singular_name = "Newsletter Submission";
    private static $plural_name = "Newsletter Submissions";

    private static $db = [
        "Name" => "Text",
        "Email" => "Text",
        "Organisation" => "Text",
    ];

    private static $default_sort = "Created DESC";

    private static $summary_fields = [
        "Created", "Name", "Organisation", "Email"
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Created")
                ->setReadonly(true),
            TextField::create('Name')
                ->setReadonly(true),
            TextField::create('Organisation')
                ->setReadonly(true),
            TextField::create('Email')
                ->setReadonly(true),
        ]);

        return $fields;
    }
}