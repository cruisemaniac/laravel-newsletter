<?php

namespace App\Http\Controllers;

class WorkshopController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Show the Workshops homepage.
     *
     */
    public function index()
    {
        return view('workshops.index');
    }

}
