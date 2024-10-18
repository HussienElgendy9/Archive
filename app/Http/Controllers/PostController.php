<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        // $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts|max:30',
            'description' => 'required|unique:posts|max:255'
        ]);
        //
        //First Way: using save
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->desc;
        // $post->save();
        // return response('تم اضافه البيانات بنجاح!');
        //Second Way: using create (includes the fillables and the guarded)
        Post::create([ //this is the normal way of writing it, there is another way which is $request all BUT, the name of the table column has to be the same name as the request
            'title'=> $request->title,
            'description' => $request->description
        ]);
        return redirect()->route('posts.index');
        // Post::create([ //like this, but the name of the table column has to be the same as the names from the request
        //     $request->all()
        // ]);

        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $posts = Post::onlyTrashed()->get();
        return view('posts.soft',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));

        // dd($id);
    }
        //
        // return $;
        // return $post;


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        //First Way
        // $post->title = $request->title;
        // $post->description = $request->desc;
        // $post->save();
        //Second Way
        $post->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        // $post->update([
        //     $request->all()
        // ]);
        return redirect()->route(route: 'posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //First Way
        Post::findOrFail($id)->delete();
        //Second Way
        // Post::destroy($id);
        return redirect()->route(route: 'posts.index');
    }
    public function restore($id){
        Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }
    public function forcedelete($id){
        Post::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
