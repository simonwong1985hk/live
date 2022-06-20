<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()
            ->orderBy('id', 'desc')
            ->filter(request(['search']))
            ->paginate(10)
            ->withQueryString();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(array_merge($request->validated(), [
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'profile_photo_path' => $request->file('profile_photo_path')?->store('profile-photos'),
        ]));

        $user->roles()->attach($request->roles);

        // $user->sendEmailVerificationNotification();

        return redirect()->route('users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(array_merge($request->validated(), [
            'profile_photo_path' => $request->validated('profile_photo_path') ? $request->file('profile_photo_path')?->store('profile-photos') : $user->profile_photo_path,
        ]));

        $user->roles()->sync($request->roles);

        return back()->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->posts()->count() > 0) {
            return back()->with('message', 'Cannot delete user with posts');
        } else {
            $user->delete();
            return back()->with('message', 'User deleted successfully');
        }
    }
}
