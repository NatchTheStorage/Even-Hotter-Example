<?php

namespace App\Admins;

use App\Models\Event;
use App\Models\Article;
use SilverStripe\Admin\ModelAdmin;

class EventsAdmin extends ModelAdmin
{
  private static $menu_title = "Admin - Events & Articles";
  private static $url_segment = "events-articles-admin";

  private static $managed_models = [
    Article::class, Event::class
  ];
}