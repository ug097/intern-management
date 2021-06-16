<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class OccupationLgs extends model
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
