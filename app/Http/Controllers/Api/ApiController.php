<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FilterCityRequest;
use App\Http\Requests\Api\FilterNameRequest;

use App\User;

class ApiController extends Controller
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

    /**
     * @param FilterNameRequest $request
     * @return mixed
     */
    public function name(FilterNameRequest $request)
    {
        $validated = $request->validated();
        $users = User::orWhere('first_name' , 'like' , '%' . $validated['name'] . '%' )
        ->orWhere('second_name' , 'like' , '%' . $validated['name'] . '%' )
        ->orWhere('patronymic' , 'like' , '%' . $validated['name'] . '%' )
        ->get();

        return $users;
    }

    /**
     * @param FilterCityRequest $request
     * @return mixed
     */
    public function city(FilterCityRequest $request)
    {
        $validated = $request->validated();
        $users = User::where('city_id', $validated['city_id'])->get();
        return $users;
    }
}
