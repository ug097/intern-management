<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SsStaff extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table='ss_staffs';
}
