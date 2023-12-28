<?php

namespace App\Http\Controllers\api\v1;

use App\Group;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index($groupId){
        $group = Group::find($groupId);
        $message = $group->messages;
        return response()->json(['message' => 'daftar pesan', 'data pesan' => $message], 200);     
    }
    public function store(Request $request, $groupId){
        $user = auth()->user();
        $message = Message::create([
            'user_id' => $user->id,
            'group_id' => $groupId,
            'pesan' => $request->pesan,
        ]); 
        return response()->json(['message' => 'pesan tersimpan', 'data pesan' => $message], 200);     
    }
    public function update(){
        
    }
    public function delete(){
        
    }
}
