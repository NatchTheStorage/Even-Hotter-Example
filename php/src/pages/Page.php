<?php

namespace {

  use App\Models\Article;
  use App\Models\Sponsor;
  use App\Models\Staff;
  use App\Models\Story;
  use App\Models\StoryVideo;
  use App\Pages\HomePage;
  use SilverStripe\CMS\Model\SiteTree;
  use SilverStripe\Forms\CheckboxField;
  use SilverStripe\Security\Permission;

  class Page extends SiteTree
  {
    private static $db = [
      'RemoveFromHeader' => 'Boolean',
      'AddToFooter' => 'Boolean'
    ];

    private static $has_one = [];

    public function getCMSFields()
    {
      $fields = parent::getCMSFields();

      $fields->addFieldsToTab("Root.Main", [
        CheckboxField::create('RemoveFromHeader', 'Remove link from Header?'),
        CheckboxField::create('AddToFooter', 'Add link to Footer?'),
      ], "MenuTitle");

      return $fields;
    }

    public function IsAdmin()
    {
      return Permission::check("ADMIN");
    }

    public function GetTeamMembers($subsite)
    {
      return Staff::get()->filter('Subsite', $subsite);
    }

    public function GetStories($subsite)
    {
        return Story::get()->filter('Subsite', $subsite)->filter('Display', 1)
          ->sort('Date', 'DESC');
    }

    public function GetMissions() {
      return Article::get()->filter('Type', 'mission');
    }
    public function GetHomePages() {
      return HomePage::get();
    }

    public function GetRootPage($subsite) {
      return HomePage::get()->filter('Theme', $subsite)->first();
    }

    // Returns sponsors of different types
    public function GetSponsorsPrincipal($subsite)
    {
      return Sponsor::get()->filter('Type', 'principal')->filterAny('Subsite:PartialMatch', $subsite)->sort('SortOrder', 'ASC');
    }

    public function GetSponsorsAssociate($subsite)
    {
      return Sponsor::get()->filter('Type', 'associate')->filterAny('Subsite:PartialMatch', $subsite)->sort('SortOrder', 'ASC');
    }

    public function GetSponsorsSupporting($subsite)
    {
      return Sponsor::get()->filter('Type', 'supporting')->filterAny('Subsite:PartialMatch', $subsite)->sort('SortOrder', 'ASC');
    }

    public function GetSponsorsTail($subsite)
    {
      return Sponsor::get()->filter('Type', 'tail')->filterAny('Subsite:PartialMatch', $subsite)->sort('SortOrder', 'ASC');
    }

    public function GetSponsorsBelly($subsite)
    {
      return Sponsor::get()->filter('Type', 'belly')->filterAny('Subsite:PartialMatch', $subsite)->sort('SortOrder', 'ASC');
    }

    public function GetStoryVideos($subsite)
    {
      return StoryVideo::get()->filter('Subsite', $subsite);
    }

    public function GetNews()
    {
      return Article::get();
    }
  }
}
