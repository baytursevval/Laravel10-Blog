<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user_id=Auth::user()->id;
        $user_id=1;
        $datalist = Blog::where('user_id',$user_id)->get();
        $data_category= DB::table('categories')->get();
        return view('home.user_blog', ['datalist'=>$datalist,'data_category'=>$data_category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id=1;
        $datalist = Blog::where('user_id',$user_id)->get();
        $data_category= DB::table('categories')->get();
        return view('home.user_blog_add', ['datalist'=>$datalist,'data_category'=>$data_category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Blog;
        //$data_category= DB::table('categories')->get();
        $data->category_id=$request->input('category_id');
        $data->user_id=1;
        $data->id = $request->input('id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');

        if ($request->file('image')!=null)
            $data-> image=  Storage::putFile('images', $request->file('image'));

        $data->category_id = $request->input('category_id');

        $data->save();
        return redirect()->route('blog_add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog ,$blogid)
    {
        $data = DB::table('blogs')->find($blogid);
        $data_category= Category::all();

        //   $datalist = DB::table('films')->get()->where('parent_id', 0);

        return view('home.user_blog_edit', ['data'=>$data, 'data_category'=>$data_category, 'blogid'=>$blogid]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog,$blogid)
    {
        $data=Blog::find($blogid);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image')!=null) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }

        $data->category_id = $request->input('category_id');
        $data->detail = $request->input('detail');


        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog,$id)
    {
        DB::table('blogs')->where('id', '=', $id)->delete();
        return redirect()->route('blog');
    }
}
