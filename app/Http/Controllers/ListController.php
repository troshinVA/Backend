<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\Bitrix;
use App\Models\Event;
use App\Repositories\EventRepository;

/**
 * Class ListController
 *
 * @package App\Http\Controllers
 */
class ListController extends Controller
{
    /**
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * ListController constructor.
     *
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param  $eventId
     * @return Entry|Factory|View
     */
    public function execute($eventId)
    {
        $event = $this->eventRepository->getById($eventId);
        if (view()->exists('layouts.list')) {
            $entries = $this->eventRepository->getEntriesByEventId($eventId);

            $newBitrix = new Bitrix();
            $entriesStatusUpdate = $newBitrix->checkLeadStatus($entries);
            return view('layouts.list', ['entries' => $entriesStatusUpdate, 'eventId' => $eventId, 'event' => $event]);
        }
    }
}
