<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function fields()
    {
        return $this->hasMany(Field::class, 'form_uid', 'uid');
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Field::class, 'form_uid', 'field_id', 'uid', 'id');
    }
}
