<?php

namespace App\Http\Controllers\api\v1;

use App\Group;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function getMessage($groupId){
        if($group = Group::find($groupId)){
            $message = $group->messages;
            return response()->json(['message' => 'daftar pesan', 'data pesan' => $message], 200);     
        }else{
            return response()->json(['message' => 'tidak ada pesan pada grup'], 400);     
        }
    }
    public function addMessage(Request $request, $groupId){
        $user = auth()->user();
        $message = Message::create([
            'user_id' => $user->id,
            'group_id' => $groupId,
            'pesan' => $request->pesan,
        ]); 
        return response()->json(['message' => 'pesan tersimpan', 'data pesan' => $message], 200);     
    }
    public function updateMessage(){
        
    }
    public function deleteMessage($id){
        $user = auth()->user();
        $message = Message::find($id);

        if($message && $message->user_id == $user->id){
            $message->delete();
            return response()->json(['message' => 'pesan berhasil dihapus', 'data pesan' => $message], 200);     
        }else{
            return response()->json(['message' => 'pesan tidak dihapus karena bukan pesan anda'], 400);     
        }

    }
}
