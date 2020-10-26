<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Member
 *
 * @property name
 * @package  App
 */
class Entry extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name', 'lastname',
        'email', 'phone', 'isThesis', 'department',
        'thesisName', 'thesisDescription', 'status', 'event_id', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function events()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
