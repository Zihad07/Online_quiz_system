<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];


    public function quize() {
        return $this->belongsTo(Quize::class);
    }
    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
