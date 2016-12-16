<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $fillable = ['name', 'display_name', 'description'];
}
