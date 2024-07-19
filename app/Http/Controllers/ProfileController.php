<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles=User::query()->paginate(5);
        return view('profile.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:7',
            'role'=>'required',
        ]);
        $form['password']=Hash::make($request->password);
        User::create($form);
        return to_route('profile.index')->with('success','your profile has added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        
        
         return view('profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {
        $form=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:7',
            'role'=>'required',
        ]);

        $profile->fill($form)->save();

        return to_route('profile.index')->with('success','your user has updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $profile)
    {
        $profile->delete();
        return to_route('profile.index')->with('success','your profile has deleted');
    }

}
