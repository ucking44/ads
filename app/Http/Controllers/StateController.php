<?php

namespace App\Http\Controllers;

use App\States;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        //return view('layouts.app');
    }

    public function fetch()
    {
        $state = States::all();
        return view('layouts.app', compact('state'));
    }
}
