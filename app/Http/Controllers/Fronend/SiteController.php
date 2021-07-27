<?php

namespace App\Http\Controllers\Fronend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Category;
use Exception;

class SiteController extends Controller
{
    public function index()
    {
        $posts  = Post::with('Category','User')
                        ->where('status','active')
                        ->orderby('id','desc')
                        ->paginate(7);
    return view('frontend.home', compact('posts'));
    }


    public function cat_post($id)
    {
        $posts = Post::with('Category','User')
                        ->where('status','active')
                        ->where('category_id',$id)
                        ->get();  
    return view('frontend.category-post', compact('posts'));
    }

    public function single(Post $post)
    {
        $posts = Post::find($post->id);
        
        return view('frontend.single-post',compact('posts'));
    }
    public function registationForm()
    {
        
        return view('frontend.auth.registation-form');
    }
    public function registation(Request $request)
    {
        $request->validate([
            'name'      =>'required|string',
            'email'     =>'required',
            'password'  =>'required|min:6|confirmed',
            'photo'     =>'required|image'
        ]);
        $photo = $request->file('photo');
        if($photo->isValid()){
        $file_name = rand(1111,9999).date('y-mdhis').'.'.$photo->getClientOriginalExtension();
        $photo->storeAs('images',$file_name);
        }
        try{
            User::create([
                'name'      =>$request->name,
                'email'     =>$request->email,
                'password'  =>bcrypt($request->password),
                'photo'     =>$file_name
            ]);
            session()->flash('message','Your registation success.');
            session()->flash('type','success');
        }catch(Exception $exception){
            session()->flash('message',$exception->getMessage());
            session()->flash('type','danger');
        }  
        return redirect()->back();
    }


    public function loginForm()
    {
        
        return view('frontend.auth.login-form');
    } 
    public function login(Request $request)
    {
    $data =  $request->validate([
            'email'     =>['required','email'],
            'password'  =>['required']
        ]);
        if(Auth::attempt($data)){
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$request->id);
            return redirect()->route('admin.dashboard');
        }else{
             session()->flash('message','Login faild.');
             return redirect()->back();
        }
    } 
    
    public function logout()
    {
        auth()->logout();
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('site/admin');
    }

    public function search(Request $request){
        $search_text = $request->search_text;
        $posts = Post::where('title','LIKE','%'.$search_text.'%')
        ->where('status','active')
        ->get();
        return view('frontend.search-result', compact('posts'));
    }
}
