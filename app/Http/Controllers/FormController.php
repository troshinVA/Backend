<?php

namespace App\Http\Controllers;

use App\Models\EventUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Services\Bitrix;
use App\Models\Entry;
use App\Http\Requests\FormValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Helpers\BitrixHelper;
use App\Models\Event;
use App\Repositories\EventRepository;

/**
 * Class FormController
 *
 * @package App\Http\Controllers
 */
class FormController extends Controller
{
    /**
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * FormController constructor.
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
    public function getForm($eventId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (count($user->entries) != 0) {
                $userData = $user->entries->first();
            } else {
                $userData = $user;
            }
        } else {
            $userData = null;
        }
        $events = $this->eventRepository->all();
        $eventTitles = $this->eventRepository->getTitlesOfEvents($events);
        return view('layouts.form', ['events' => $eventTitles, 'eventId' => $eventId, 'userData' => $userData]);
    }

    /**
     * @param  FormValidation $request
     * @param  $eventId
     * @return RedirectResponse
     */
    public function postForm(FormValidation $request, $eventId)
    {
        $input = $request->except('_token');
        $request->validated();
        $entry = new Entry();
        $entry->fill($input);
        if (Auth::check()) {
            $entry->user_id = Auth::user()->id;
        }

        $addLeadData = BitrixHelper::setAddLeadData($entry);
        $bitrix = new Bitrix;
        $entry->bitrixLeadId = strval($bitrix->addLead($addLeadData));

        if (!Auth::check()){
            $route = redirect()->route('event', ['eventId' => $eventId]);
        }else{
            $route = redirect()->route('home');
        }
        if ($entry->save()){
           return $route->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
        }
    }
}
