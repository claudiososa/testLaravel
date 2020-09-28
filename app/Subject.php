<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function message(){

        return $this->belongsTo(Message::class);
    }
}
