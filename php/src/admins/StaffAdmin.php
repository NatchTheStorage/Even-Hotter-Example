<?php

namespace App\Admins;

use App\Models\Crew;
use App\Models\Staff;
use SilverStripe\Admin\ModelAdmin;

class StaffAdmin extends ModelAdmin
{
  private static $menu_title = "Admin - Staff and Crew Members";
  private static $url_segment = "staff-admin";

  private static $managed_models = [
    Staff::class, Crew::class
  ];
}