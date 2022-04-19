<?php

namespace App\Controllers;

use App\Models\Event;
use PageController;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\PaginatedList;

class EventHolderPageController extends PageController
{
  private static $allowed_actions = [
    'event'
  ];


  public function UpcomingEvents($subsite)
  {
    $req = Controller::curr()->getRequest();
    $location = $req->getVar('location');
    $date = $req->getVar('date');
    $events = Event::get()->filter('Subsite', $subsite);

    if (!empty($location)) {
      $events = $events->filter([
        'Location' => $location
      ]);
    }
    if (!empty($date)) {
      $events = $events->filterAny([
        'Date:PartialMatch' => $date
      ]);
    }

    $events = $events->sort('Date', 'DESC');

    $list = new PaginatedList($events, Controller::curr()->getRequest());
    $list->setPageLength(6);

    return $list;
  }

  public function event(HTTPRequest $request)
  {
    $event = Event::get()->filter([
      'ID' => $request->allParams()["ID"]
    ])->first();

    if (!$event) {
      // no property was found redirect to home;
      return Controller::curr()->redirect("/");
    }
    return [
      "Event" => $event,
    ];
  }


  public function Locations($subsite)
  {
    $events = Event::get()->filter('Subsite', $subsite);
    $locations = [];

    foreach ($events as $event) {
      if (!empty(trim($event->Location))) {
        $locations[trim($event->Location)] = [
          'Title' => trim($event->Location)
        ];
      }
    }
    sort($locations);
    return new ArrayList($locations);
  }

  public function Dates($subsite)
  {
    $events = Event::get()->filter('Subsite', $subsite);
    $dates = [];

    foreach ($events as $event) {
      if (!empty(trim($event->Date))) {
        $dates[trim($event->Date)] = [
          'Title' => date('F Y', strtotime($event->Date)),
          'Value' => date('Y-m', strtotime($event->Date))
        ];
      }
    }
    sort($dates);
    return new ArrayList($dates);
  }
}
