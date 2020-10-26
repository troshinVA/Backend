<?php


namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    /**
     * @return Event[]|Collection
     */
    public function all()
    {
        return Event::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Event::find((int)$id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEntriesByEventId($id)
    {
        return Event::find((int)$id)->entries;
    }

    /**
     * @param $events
     * @return mixed
     */
    public function getTitlesOfEvents($events)
    {
        return $events->pluck('title','id');
    }
}
