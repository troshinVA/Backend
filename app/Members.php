<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Members
 *
 * @package App
 */
class Members extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name','lastname',
    'emailAddress','phone','checkbox','department',
    'nameOfThesis','descriptionOfThesis'];
}
