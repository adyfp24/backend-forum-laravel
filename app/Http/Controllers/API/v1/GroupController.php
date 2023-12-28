<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{
    public function getGroup(Request $request){
        if($group = Group::all()){
            return response()->json(['message' => 'data grup yang tersedia' ,'group' => $group], 200);
        }else{
            return response()->json(['message' => 'data grup tidak tersedia'], 400);
        }
    }
    public function getGroupById($id){
        if($group = Group::find($id)){
            return response()->json(['message' => 'data grup sesuai id', 'grup' => $group], 200);
        }else{
            return response()->json(['message' => 'grup tidak ada'], 400);
        }
    }
    public function addGroup(Request $request){   
        if($group = Group::create([
            'nama_grup' => $request->nama_grup
        ])){
            return response()->json(['message' => 'grup berhasil dibuat', 'grup' => $group], 200);
        }else{
            return response()->json(['message' => 'grup gagal dibuat'], 400);
        }
    }
    public function updateGroup(Request $request, $id){
        
    }
    public function deleteGroup($id){
        $group = Group::find($id);
        if($group){
            if($group->delete()){
                return response()->json(['message' => 'grup berhasil dihapus', 'grup' => $group], 200);
            }else{
                return response()->json(['message' => 'grup gagal dihapus'], 400);
            }
        }else{
            return response()->json(['message' => 'data grup tidak ditemukan'], 400);
        }
    }
}
