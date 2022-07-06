<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class GetJobsController extends Controller
{
    public function getJob(Job $job) {
        $job['tags'] = explode(' ', $job['tags']);
        $job['requirments'] = explode(' ', $job['requirments']);
        $comments = $job->comments ?? '';
        if (empty($comment)) {
            foreach ($comments as $index => $comment) {
                $comment['user'] = User::find($comment->user_id);
            }
        }
    
        $requester_id = $job->requester_id ?? -1;
        if ($requester_id != -1) {
            $job['requester'] = User::find($requester_id)?? null;
        }
    
        $taker_id = $job->taker_id ?? -1;
        if ($taker_id != -1) {
            $job['taker'] = User::find($taker_id) ?? null;
        }
    
        return view('job_detail', ['job' => $job, 'comments' => $comments,]);
    }
}
