<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'appointment_time_start', 'appointment_time_end'
    ];
}
