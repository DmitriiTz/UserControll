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
    public function store(UserStoreRequest $request)
    {
        User::create($request->validated());
        return redirect('/');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $cities = City::all();
        return view('user_edit')->with(['cities' => $cities, 'user' => $user]);
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/');
    }
}
