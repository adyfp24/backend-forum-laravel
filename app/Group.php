<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['nama_grup'];
    public function groupMembers(){
        return $this->hasMany(GroupMember::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    } 
}
