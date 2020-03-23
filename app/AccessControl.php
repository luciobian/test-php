<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AccessControl extends Model
{
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
}
