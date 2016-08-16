<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $api_key = ApiKey::first();
        return view('index', ['api_key' => $api_key->key]);
    }
}
