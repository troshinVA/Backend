<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 *
 * @property name
 * @package App
 */
class Entry extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name','lastname',
    'email','phone','checkbox','department',
    'nameOfThesis','descriptionOfThesis','status','event_id','user_id'];

    public function events(){
       return $this->belongsTo('App\Models\Event','event_id','id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
