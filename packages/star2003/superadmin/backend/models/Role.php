<?php

namespace Superadmin\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'accesses',
    ];
}
