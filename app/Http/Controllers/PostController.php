<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
        $posts=Post::with("user")
                        ->orderBy('created_at','ASC')
                        ->get();
        if (!$posts) {
            return response()->json([
                'status' => 'there is no posts to show'
            ], 201);
        }

        return $posts;

        // $user = User::with('Posts')->get();
        // return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;


        if(!$user->posts()->save($post) ) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok'
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::with("user")->find($id);
        if(!$post ) {
            return response()->json([
                'error' => 'Post Does Not Exist'
            ], 404);
        }

        return $post; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post->update($request->all())) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'user updated successful'
        ], 201);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post->delete()) {
            throw new HttpException(500);
        }
        return response()->json([
            'status' => 'user deleted successfuly'
        ], 201);
    }

    public function userPosts($id)
    {
        $user = User::with('Posts')->find($id);
        return $user;
    }
}
