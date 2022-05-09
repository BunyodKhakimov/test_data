<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function form()
    {
        return $this->belongsTo(Field::class, 'field_id', 'id');
    }
}
