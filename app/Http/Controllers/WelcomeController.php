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

        if($request->name ?? false){
            $name = explode(' ', $request->name);
            $users = User::orWhere('first_name' , 'like' , '%' . $request->name . '%' )
            ->orWhere('second_name' , 'like' , '%' . $request->name . '%' )
            ->orWhere('patronymic' , 'like' , '%' . $request->name . '%' )
            ->get();
        }
        if($request->city_id ?? false){
            $users = $users->where('city_id', $request->city_id);
        }

        return view('welcome')->with(['users' => $users, 'cities' => $cities]);
    }
}
