<?php

namespace App\Http\Controllers\fronend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
     public function search(Request $request){
        $search_text = $request->search_text;
        $posts = Post::where('title','LIKE','%'.$search_text.'%')
        ->where('status','active')
        ->get();
        return view('frontend.search-result', compact('posts'));
    }

    public function liveSearch(Request $request){
    	if(empty($request->search_text)){
    		
    	}else{
		$posts = Post::where('title','like',$request->search_text.'%')->get();
			return view('frontend.live-result', compact('posts'));
	}
    }	
}
