<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentBooking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            "name"=>$this->name,
            'appointment_time_start'=>$this->appointment_time_start,
            'appointment_time_end'=>$this->appointment_time_end
        ];
    }

}
