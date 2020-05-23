<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $informations = Information::OpenDate($today)->get();

        return view('home')->with([
            'informations' => $informations
        ]);
    }
}
