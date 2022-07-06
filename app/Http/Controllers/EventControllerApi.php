<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventControllerApi extends Controller
{
    public function index()
    {
        $events = DB::table('events')->get();
        return response()->json($events, 200);
    }

    public function show($id)
    {
        $events = DB::table('comments')->where("id", "=", $id)->get();
        return response()->json($events, 200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }
        try{
            $start_date = date('Y/m/d',strtotime(request()->start_date));
            $end_date = date('Y/m/d',strtotime(request()->end_date));
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Date format is false',
                'success' => false,
            ], 400);
        }


        $event = Event::create([
            'title' => request()->title,
            'description' => request()->description,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return response()->json(['message' => 'Event created!', $event], 200);
    }

    public function update($id)
    {
        $event = Event::find($id) ?? null;
        if($event == null){
            return response()->json([
                'message' => 'job not found!',
                'success' => false
            ], 400);
        }

        $validator = Validator::make(request()->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }
        try{
            $start_date = date('Y/m/d',strtotime(request()->start_date));
            $end_date = date('Y/m/d',strtotime(request()->end_date));
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Date format is false',
                'success' => false,
            ], 400);
        }
    
        $event->update([
            'title' => request()->title,
            'description' => request()->description,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return response()->json(['message' => 'Job updated!', $event], 200);
    }
}
