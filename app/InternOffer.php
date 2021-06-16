<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternOffer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function company()
    {
        return $this->hasOne('\App\Company', 'id', 'company_id');
    }

    public function ss_staff()
    {
        return $this->hasOne('\App\SsStaff', 'id', 'ss_staff_id');
    }
}
