<?php

namespace App\Admins;

use App\Models\Story;
use App\Models\StoryVideo;
use SilverStripe\Admin\ModelAdmin;

class StoriesAdmin extends ModelAdmin
{
  private static $menu_title = "Admin - Stories & Videos";
  private static $url_segment = "stories-videos-admin";

  private static $managed_models = [
    Story::class, StoryVideo::class
  ];
}