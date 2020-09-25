<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['name','lastname',
    'emailAddress','phone','checkbox','department',
    'nameOfThesis','descriptionOfThesis'];
}
