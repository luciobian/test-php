<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AccessControl extends Model
{

    protected $with = ['user'];

    /**
     * Get the access timestamp.
     *
     * @param  string  $value
     * @return string
     */
    public function getAccessTimestampAttribute($value)
    {
        return Carbon::parse($value);
    }


    /**
     * Get the user record associated with the access control.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
