<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       // return $_SERVER['HTTP_HOST'].'/uploads/ckfinder/userfiles/';    
        $posts = Post::with('Category','User')->orderby('id', 'desc')->paginate(10);
        return view('admin.post.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorier = Category::select('name','id')->where('status','active')->get(); 
        return view('admin.post.create', compact('categorier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           //checking validation
           $request->validate([
            'title'         => 'required|string',
            'des'           => 'required|string',
            'category_id'   => 'required',
            'image'         => 'required|image',
            'status'        => 'required|string'
        ]);
        $photo = $request->file('image');
        if($photo->isValid()){
        $file_name = rand(1111,9999).date('y-mdhis').'.'.$photo->getClientOriginalExtension();
        $photo->storeAs('images',$file_name);
        }

        // inserting data in database
        try{
            Post::create([
            'user_id'       => auth()->id(),
            'title'         => $request->title,
            'des'           => $request->des,
            'slug'          => strtolower(str_replace(' ', '-', $request->title)),
            'category_id'   => $request->category_id,
            'image'         => $file_name,
            'status'        => $request->status,
            ]);
            session()->flash('message','Post publiced successfully');
            session()->flash('type','success');
        }catch(Exception $exception){
           session()->flash('message','Something went wrong');
           session()->flash('type','danger');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        
        return view('frontend.single-post',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('categories','post'));
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
        //return 'update'.$id;

        $request->validate([
            'title'         => 'required|string',
            'des'           => 'required|string',
            'category_id'   => 'required',
            'status'        => 'required|string'
        ]);

        
        try{
            $post   = Post::find($id);
            if(file_exists(public_path('uploads/images/'.$post->image))) unlink(public_path('uploads/images/'.$post->image));    
            if($request->file('image')){
                $photo = $request->file('image');
                if($photo->isValid()){
                $file_name = rand(1111,9999).date('y-mdhis').'.'.$photo->getClientOriginalExtension();
                $photo->storeAs('images',$file_name);
                }
            }else{
                $file_name = $post->image;
            }

        $post->title        = $request->title;
        $post->des          = $request->des;
        $post->slug         = strtolower(str_replace(' ','-',$request->title)); 
        $post->category_id  = auth()->id();
        $post->image        = $file_name;
        $post->user_id      = auth()->id();
        $post->status       = $request->status;
        $post->update();  
            
            session()->flash('message','Post update success');
            session()->flash('type','success');
        }catch(Exception $exception){
            session()->flash('message','Something went wrong');
            session()->flash('type','danger');
        }
        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $post = Post::find($id);
            $post->delete();
            if(file_exists(public_path('uploads/images/'.$post->image))) unlink(public_path('uploads/images/'.$post->image));
            session()->flash('type','success');
            session()->flash('message','Post deleted successfully');
          }catch(Exception $exception){
             session()->flash('message','Something went wrong');
             session()->flash('type','danger');
          }
          return redirect()->back();
    }
}
