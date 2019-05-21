<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::whereNull('disabled') -> orderBy('id', 'desc') -> get();
        // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories      = Category::pluck('name', 'id') -> all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();

        $file = $request->file('photo_id');

        if($file) {
            $name = time() . $file -> getClientOriginalName();
            $file -> move('images/', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo -> id;
        }

        $result = $user -> post() -> create($input);

        if($result) {
            Session::flash('status', 'Post Created Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('posts.index');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post            = Post::findOrFail($id);
        $categories      = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request -> all();

        if($file = $request -> file('photo_id') ){

         $imgID = $post -> photo_id;

         if($imgID){
         unlink(public_path()  . $post -> photo -> file);
         }

         $name = time() . $file -> getClientOriginalName();

         $file -> move('images/', $name);

         $photo = Photo::create(['file' => $name]);

         $input['photo_id'] = $photo -> id;

         }
         $result = $post -> update($input);

         if($result) {
            Session::flash('status', 'Post Updated Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts.index') ;
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

       $post->disabled = 1;

       // unlink(public_path() . $post -> photo -> file); To delete photo of post

       $post->save();

       Session::flash('status', 'The Post was successfully deleted');

       return redirect()->route('posts.index');
    }
}
