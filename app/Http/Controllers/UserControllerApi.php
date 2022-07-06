<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserControllerApi extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $users = DB::table('users')->where("id", "=", $id)->get();
        return response()->json($users, 200);
    }
}
