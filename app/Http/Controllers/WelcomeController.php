<?php

namespace App\Http\Controllers;

use App\City;
use App\User;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static function index()
    {
        $users = User::with('city')->get();
        $cities = City::all();

        return view('welcome')->with(['users' => $users, 'cities' => $cities]);
    }
}
