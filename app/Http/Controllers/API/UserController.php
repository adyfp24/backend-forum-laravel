<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getAllUser()
    {
        $mentor = DB::table('mentor')->get();
        return response()->json([
               'message'   => 'success',
               'data'      => $mentor
               ], 200);
    }
}
