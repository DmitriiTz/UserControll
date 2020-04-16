<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    static function index(Request $request)
    {
        $users = User::all();
        $cities = City::all();

        if(array_key_exists('name', $request->all())){

        }
        if(array_key_exists('city', $request->all())){

        }

        return view('welcome')->with(['users' => $users, 'cities' => $cities]);
    }
}
