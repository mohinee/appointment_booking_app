<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'availablility_time_start', 'availablility_time_end'
    ];
}
