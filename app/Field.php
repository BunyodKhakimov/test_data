<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'field_id', 'id');
    }
}
