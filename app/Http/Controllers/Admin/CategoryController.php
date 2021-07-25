<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->paginate(10);

        return view('admin.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'name'  => 'required|string|unique:categories',
            'status'=> 'required|string'
        ]);
        $slug = strtolower(str_replace(' ', '-', $request->name));
        try{
            Category::create([
                'user_id'  => auth()->id(),
                'name'     => $request->name,
                'slug'     => $slug,
                'status'   => $request->status,
            ]);
            //same method
            // $category           = new Category();
            // $category->user_id  = auth()->id();
            // $category->name     = $request->name;
            // $category->slug     = $slug;
            // $category->status   = $request->status;
            // $category->save();

            session()->flash('message','Category saved successfully');
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
        $cat = Category::find($id);

        return view('admin.category.view', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if($category){
        return view('admin.category.edit', compact('category'));
        }else{
            return redirect()->back();
        }
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
        
        $request->validate([
            'name'      => 'required|string|unique:categories,id,'.$id,
            'status'    => 'required|string'
        ]);
        try{
        $category           = Category::find($id);
        $category->name     = $request->name;
        $category->slug     = strtolower(str_replace(' ','-',$request->name)); 
        $category->user_id  = auth()->id();
        $category->status   = $request->status;
        $category->update();  
            
            session()->flash('message','Category update success');
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
        $cat = Category::find($id);
        $cat->delete();
        session()->flash('type','success');
        session()->flash('message','Category deleted successfully');

        return redirect()->back();
      }catch(Exception $exception){
         session()->flash('message','Something went wrong');
         session()->flash('type','danger');

         return redirect()->back();
      }
    }
}
