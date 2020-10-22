<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = ['title','description'];

    /**
     * @return BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\Models\User','entries','event_id','user_id');
    }

    public function entries(){
        return $this->hasMany('App\Models\Entry','event_id','id');
    }
}
