<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\VisitorFormRequest;
use App\Repositories\Stands\Contract;
use App\Visitor;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class VisitorController extends ApiGuardController
{
    public function store(Contract $standRepository, VisitorFormRequest $request, $stand_id)
    {
    	try {

            $stand = $standRepository->getById($stand_id);

            $visitor = new Visitor;
	        $visitor->ip = $request->ip();
            $visitor->stand()->associate($stand);
	        $visitor->save();

	        return ['status ' => 'OK', 'message' => 'visitor record successfully'];

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }
}