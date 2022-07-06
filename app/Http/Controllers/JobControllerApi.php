<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobControllerApi extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->get();
        return response()->json($jobs, 200);
    }

    public function show($id)
    {
        $job = DB::table('jobs')->where("id", "=", $id)->get();
        return response()->json($job, 200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'length' => 'required|string',
            'requirments' => 'required|string',
            'tags' => 'required|string',
            'requester_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }

        $job = Job::create([
            'title' => request()->title,
            'subtitle' => request()->subtitle,
            'description' => request()->description,
            'length' => request()->length,
            'requirments' => request()->requirments,
            'tags' => request()->tags,
            'requester_id' => request()->requester_id,
        ]);

        return response()->json(['message' => 'Job created!', $job], 200);
    }

    public function update($id)
    {
        $job = Job::find($id) ?? null;
        if($job == null){
            return response()->json([
                'message' => 'job not found!',
                'success' => false
            ], 400);
        }

        $validator = Validator::make(request()->all(), [
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'length' => 'required|string',
            'requirments' => 'required|string',
            'tags' => 'required|string',
            'requester_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }
    
        $job->update([
            'title' => request()->title,
            'subtitle' => request()->subtitle,
            'description' => request()->description,
            'length' => request()->length,
            'requirments' => request()->requirments,
            'tags' => request()->tags,
            'requester_id' => request()->requester_id,
        ]);

        return response()->json(['message' => 'Job updated!', $job], 200);
    }
}
