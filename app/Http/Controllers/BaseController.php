<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(function ($request, $next) {

            if(Auth::check()){

                $this->user = User::find(Auth::id());
                Session::put('user', $this->user);

            }

            return $next($request);
        });

        return;
    }

}