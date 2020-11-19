<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppointmentBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AppointmentBooking as AppointmentBookingResource;
use App\Http\Resources\AdminAppointmentsResource;

class AppointmentBookingController extends Controller
{
    public function getMyBookings(Request $request){
        $user = DB::table('appointment_bookings')->where('user_id',$request->id)->where('name',$request->name)->where('appointment_time_start', '>', now())->get();
        return (new AppointmentBookingResource($user[0]))
            ->response()
            ->setStatusCode(201);
            
    }

    public function getMyAppointments(Request $request){
        $users = DB::table('appointment_bookings')->where('user_id',$request->id)->where('appointment_time_start', '>', now())->get();  
        return (new AdminAppointmentsResource($users))->response()->setStatusCode(201);
    }

    public function create(Request $request){
        $user = AppointmentBooking::create($request->all());
        return (new AppointmentBookingResource($user))
                ->response()
                ->setStatusCode(201);
    }

    public function updateMyBookings(Request $request){
        DB::table('appointment_bookings')->where('id',$request->id)->update(['appointment_time_start'=>$request->input('start_date'),'appointment_time_end'=> $request->input('finish_date')]);
        $user = DB::table('appointment_bookings')->where('id',$request->id)->get();
        return (new AppointmentBookingResource($user[0]))
               ->response()
               ->setStatusCode(201);
   }

    public function delete(){
        
    }
}
