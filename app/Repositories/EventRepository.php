<?php


namespace App\Repositories;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    /**
     * @return Event[]|Collection
     */
    public function all(){
        return Event::all();
    }
    public function getById($id){
        return Event::find((int)$id);
    }
    public function getEntriesByEventId($id){
        return Event::find((int)$id)->entries;
    }
    public function getTitlesOfEvents($events){
        foreach ($events as $event){
            $eventTitles[] = [$event->id => $event->title];
        }
        return $eventTitles;
    }
}
