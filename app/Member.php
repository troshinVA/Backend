<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 *
 * @package App
 */
class Member extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name','lastname',
    'emailAddress','phone','checkbox','department',
    'nameOfThesis','descriptionOfThesis'];

}
