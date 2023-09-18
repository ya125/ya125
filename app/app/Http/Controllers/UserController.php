<?php

namespace App\Http\Controllers;

use App\User;
use App\Cart;
use App\Product;
use App\Http\Requests\UsersData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //マイページへ遷移
    public function index()
    {
        $user = auth()->user();
    
        return view('mypage.mypage', [
            'users' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypage.user_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('owner.user_list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::where('id', \Auth::user()->id)->get();
        
        
        return view('mypage.user_edit', [
            'users' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersData $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
       
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::where('id', \Auth::user()->id)->first();
       
        $user->delete();

        return redirect('/');
    }
}
