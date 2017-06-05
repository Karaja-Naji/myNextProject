<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$user = User::find(1)->posts;
        $user2 = User::find(1)->with('posts')->get();

        return $user2;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to use when you want to create the form to store new user
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
        $user =  new User;
        $user->create($request->all());
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;

        // $user->save();

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //print_r($user);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // The difference is that edit is used to return the HTML form that is used to edit the resource values (notice that it responds to GET requests), while updateis the "action" that the edit form will be submitting to, and it responds to PUT or PATCH requests.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user =  User::find($id);
         $user->update($request->all());
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;

        // $user->save();
        //return $request;
        //User::find($id)->update($request->all());
         return $user;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
