<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded =[];
    public function groupMembers(){
        return $this->hasMany(GroupMember::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    } 
}
