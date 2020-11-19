<?php

namespace App\Http\Controllers;

use App\Http\Resources\Availability as AvailabilityResource;
use Illuminate\Http\Request;
use App\Availability;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AvailabilitySelectorController extends Controller
{
    public function getMyAvaiblity(Request $request){
        $user = DB::table('availabilities')->where('user_id',$request->id)->where('availablility_time_end', '>', now())->get();
        return (new AvailabilityResource($user))
            ->response()
            ->setStatusCode(201);
            
    }

    public function create(Request $request){
        $user = Availability::create($request->all());
        return (new AvailabilityResource($user))
                ->response()
                ->setStatusCode(201);
    }

    public function updateMyAvaiblity(Request $request){
        DB::table('availabilities')->where('id',$request->id)->update(['availablility_time_start'=>$request->input('start_date'),'availablility_time_end'=> $request->input('finish_date')]);
        $user = DB::table('availabilities')->where('id',$request->id)->get();
        return (new AvailabilityResource($user[0]))
               ->response()
               ->setStatusCode(201);
   }

    public function delete(){
        
    }
}
