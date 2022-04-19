<?php

namespace App\Admins;

use App\Models\Helicopter;
use SilverStripe\Admin\ModelAdmin;

class HelicopterAdmin extends ModelAdmin
{
  private static $menu_title = "Admin - Helicopers";
  private static $url_segment = "helicopter-admin";

  private static $managed_models = [
    Helicopter::class
  ];
}