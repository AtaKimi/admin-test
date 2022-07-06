<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentControllerApi extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')->get();
        return response()->json($comments, 200);
    }

    public function show($id)
    {
        $comments = DB::table('comments')->where("id", "=", $id)->get();
        return response()->json($comments, 200);
    }

    public function store()
    {
        if((Auth::user()->id == null)){
            return response()->json([
                'message' => 'Login first to comment!',
                'success' => false
            ], 400);
        }

        $validator = Validator::make(request()->all(), [
            'body' => 'required|string',
            'job_id' => 'required|int',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }

        $comment = Comment::create([
            'body' => request()->body,
            'user_id' => Auth::user()->id,
            'job_id' => request()->job_id,
        ]);

        return response()->json(['message' => 'Comment created!', $comment], 200);
    }

    public function update($id)
    {
        $comment = Comment::find($id) ?? null;
        if($comment == null){
            return response()->json([
                'message' => 'job not found!',
                'success' => false
            ], 400);
        }

        if(Auth::user()->id != $comment->user_id){
            return response()->json([
                'message' => 'Not your comment!',
                'success' => false
            ], 400);
        }


        $validator = Validator::make(request()->all(), [
            'body' => 'required|string',
            'job_id' => 'required|int',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => $validator->errors()->toArray()
            ], 400);
        }
    
        $comment->update([
            'body' => request()->body,
            'user_id' =>Auth::user()->id,
            'job_id' => request()->job_id,
        ]);

        return response()->json(['message' => 'Job updated!', $comment], 200);
    }
}
