<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Repositories\Events\Contract;
use App\Transformer\EventBasicTransformer;
use App\Transformer\EventTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;

class EventController extends ApiGuardController
{
    public function index(Contract $eventRepository)
    {
        $events = $eventRepository->getNotStarted();
        return $this->response->withCollection($events, new EventBasicTransformer);
    }

    public function live(Contract $eventRepository)
    {
        $events = $eventRepository->getStarted();
        return $this->response->withCollection($events, new EventBasicTransformer);
    }

    public function show(Contract $eventRepository, $id)
    {
        try {

            $event = $eventRepository->getById($id);

            return $this->response->withItem($event, new EventTransformer);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }

}
