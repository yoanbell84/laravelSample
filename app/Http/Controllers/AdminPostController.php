<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view ('admin.posts.index',compact('posts'));              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $categories = Category::pluck('name','id');
        return view ('admin.posts.create' , compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
       
       $input = $request->all();      
       if($file  =  $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);            
            $photo = Photo::create(['file'=> $name]); 
            $input['photo_id'] = $photo->id;        
       }
      /* Second way to store POSTS
       * $input['user_id'] = Auth::user()->id;      
         Post::create($input);
       * 
       * Another way
       * $user = Auth::user()->posts()->save(new Post(['title'=>$request->title, 'body'=> $request->body , 'photo_id'=> $input['photo_id']]));
       */
       $user = Auth::user()->posts()->create($input);
       Session::flash('created_post', 'The post '.$request->title.' has been created');
       return redirect()->route('posts.index'); 
        
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
        //
        $post = Post::findOrFail($id);
         $categories = Category::pluck('name','id');
        return view('admin.posts.edit', compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        
        $post = Post::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name =time().$file->getClientOriginalName();
            $file->move('images',$name);            
            $photo = Photo::create(['file'=> $name]); 
            $input['photo_id'] = $photo->id;        
        }
        $input['user_id'] = Auth::user()->id;
      
        $post->update($input);
        Session::flash('edited_post', 'The post '.$input['title'].' has been edited');
        return redirect()->route('posts.index'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $name = $post->title;
        unlink(public_path().$post->photo->file);
        $post->delete();        
        Session::flash('delete_post', 'The post '.$name.' has been deleted');
        return redirect()->route('posts.index');
    
    }
}
