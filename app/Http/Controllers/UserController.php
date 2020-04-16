<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;

class UserController extends Controller
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $users = User::with('city')->get();
        $cities = City::all();

        return view('welcome')->with(['users' => $users, 'cities' => $cities]);
    }

    /**
     * @param User $user
     * @param UserStoreRequest $request
     * @return mixed
     */
    public function store(User $user, UserStoreRequest $request)
    {
        return $user->create($request->validated());
    }

    /**
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * @param User $user
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @param UserUpdateRequest $request
     * @return bool
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        return $user->update($request->validated());
    }

    /**
     * @param User $user
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(User $user)
    {
       $user = User::find($user->id);
       $user->delete();
        return redirect('/');
    }
}
