<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\Stands\Contract;
use App\Transformer\StandTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;

class StandController extends ApiGuardController
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $standRepository, $id)
    {
        try {

            $stand = $standRepository->getById($id);

            return $this->response->withItem($stand, new StandTransformer);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }
}
