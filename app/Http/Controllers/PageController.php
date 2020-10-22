<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Repositories\EntryRepository;

/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    protected $entryRepository;

    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param $eventId
     * @param $pageId
     * @return Application|Factory|View
     */
    public function execute($eventId, $pageId)
    {
        if (!$pageId) {
            abort(404);
        }
        if (view()->exists('layouts.page')) {
            $page = $this->entryRepository->getPageById($pageId);
            return view('layouts.page', ['page' => $page, 'eventId' => $eventId]);
        }
    }
}
