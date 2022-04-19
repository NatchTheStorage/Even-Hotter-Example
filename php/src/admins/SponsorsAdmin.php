<?php

namespace App\Admins;

use App\Models\Sponsor;
use SilverStripe\Admin\ModelAdmin;

class SponsorsAdmin extends ModelAdmin
{
  private static $menu_title = "Admin - Sponsors";
  private static $url_segment = "sponsors-admin";

  private static $managed_models = [
    Sponsor::class
  ];
}