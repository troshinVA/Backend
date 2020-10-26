<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\Bitrix;
use App\Models\Event;
use App\Repositories\EventRepository;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    protected $eventRepository;

    /**
     * EventController constructor.
     *
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param  $eventId
     * @return Application|Factory|View
     */
    public function execute($eventId)
    {
        $event = $this->eventRepository->getById($eventId);
        $entries = $this->eventRepository->getEntriesByEventId($eventId);
        $newBitrix = new Bitrix();
        $entriesStatusUpdate = $newBitrix->checkLeadStatus($entries);
        return view('layouts.event', array('event' => $event, 'entries' => $entriesStatusUpdate));
    }
}
