<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormSubmitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post=post::all();
        //return post::where ('title'.'first post')->get();
        //$post=DB::select('SELECT * FROM posts');
        //  $post=Post::orderBy('title','desc')->take(1)->get();
        // $post=Post::orderBy('title','desc')->get();
       $post=Post::orderBy('created_at','desc')->paginate(4);
      
        return view('posts.index',[
            'posts'=>$post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormSubmitRequest $request)
    {
        $post=new post;
        //Handle file upload
        if($request->has('c_img')){
         //Get filename with extension
          //  $filenameWithExt = $request->file('c_img')->getClientOriginalName();
            //Get just filename
         //    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
        //     $extension = $request->file('c_img')->getClientOriginalExtension();
             //Filename to store
       //      $fileNameToStore =$filename.'_'.time().'.'.$extension;
             //Upload image
        //     $path =$request->file('c_img')->storeAS('public/c_img',$fileNameToStore);
             
            $post->c_img=$request->file('c_img')->Store('public/c_img');
        }else{
            
           
           // $fileNameToStore='noimg.jpg';
           // $post->c_img = $fileNameToStore;
        }
       
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id = auth()->user()->id;
       
        $post->save();

        return redirect('/posts')->with('success','Post Created !');
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $post=Post::find($id);
        return view('posts.show',[
            'posts'=>Post::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unathorized page!');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(FormSubmitRequest $request, Post $post)
    {
        if($request->hasFile('c_img')){
            //Get filename with extension
          //  $filenameWithExt = $request->file('c_img')->getClientOriginalName();
            //Get just filename
          //   $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
          //   $extension = $request->file('c_img')->getClientOriginalExtension();
             //Filename to store
          //   $fileNameToStore =$filename.'_'.time().'.'.$extension;
             //Upload image
          //   $path =$request->file('c_img')->storeAS('public/c_img',$fileNameToStore);
             $post->c_img=$request->file('c_img')->Store('public/c_img');
        }else{

        }

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('c_img')){
            $post->c_img=$request->file('c_img')->Store('public/c_img');
        }
        $post->save();

        return redirect('/posts')->with('success','Post Updated Success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::find($id);
        //check for the correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unathorized page!');
        }
         if($post->c_img != 'noimg.jpg'){
             //Delete image
             Storage::delete('public/c_img/'.$post->c_img);
         }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Success!');
    }
}
