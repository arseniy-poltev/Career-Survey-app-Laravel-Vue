<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Return collection of all users.
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Create new user and return it.
     *
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return $user;
    }
    
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());

        return response()->json([], 201);
    }

    public function destroy(User $user)
    {
        $user->surveys()->delete();
        $user->delete();

        return response()->json();
    }
}
