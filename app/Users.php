<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Users extends Authenticatable
{
    
    public function university()
    {
        return $this->hasOne('\App\University', 'id', 'university_id');
    }
    
    public function undergraduate()
    {
        return $this->hasOne('\App\Undergraduate', 'id', 'undergraduate_id');
    }
    
    public function grad_school()
    {
        return $this->hasOne('\App\GradSchool', 'id', 'grad_school_id');
    }
    
    public function occupation_lg()
    {
        return $this->hasOne('\App\OccupationLgs', 'id', 'occupation_lg_id');
    }
    
    public function interview_content()
    {
        return $this->hasOne('\App\InterviewContent', 'user_id', 'id');
    }
    
    public function user_status()
    {
        return $this->hasOne('\App\UserStatus', 'user_id', 'id');
    }
    
    public function ss_staff()
    {
        return $this->hasOneThrough('\App\SsStaff', '\App\UserStatus', 'user_id', 'id', null, 'ss_staff_id');
    }
    
    public function webcab_data()
    {
        return $this->hasOne('\App\WebcabData', 'user_id', 'id');
    }
    
    
    // アクセサの定義
    // get ~~ Attribute(引数)で定義
    
    // 誕生日から年齢取得
    public function getAgeAttribute()
    {
        $birthday = date('Ymd', strtotime($this->birthday));
        $age = floor((date('Ymd') - $birthday) / 10000);

        return $age;
    }
    
    // フルネーム取得
    public function getFullNameAttribute()
    {
        $name = $this->family_name .' ' .$this->first_name;

        return $name;
    }
    
    // フルネームカナ取得
    public function getFullNameKanaAttribute()
    {
        $name = $this->family_name_kana .' ' .$this->first_name_kana;

        return $name;
    }
}
