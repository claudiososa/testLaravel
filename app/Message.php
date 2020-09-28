<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function subject(){

        return $this->hasOne(Subject::class,'id');
    }
}
