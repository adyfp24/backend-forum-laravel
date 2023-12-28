<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{
    public function getGroup(Request $request){
        $group = Group::all();
        return response()->json(['message' => 'berikut data grup yang tersedia' ,'group' => $group], 200);
    }
    public function addGroup(Request $request){   
        $group = Group::create([
            'nama_grup' => $request->nama_grup
        ]);
        return response()->json(['message' => 'grup berhasil dibuat', 'grup' => $group], 200);
    }
    public function updateGroup(){
        
    }
    public function deleteGroup(){
        
    }
}
