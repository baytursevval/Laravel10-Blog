<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datalist = DB::table('categories')->get();
        return view('home.category1', ['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request  $request)
    {
        DB::table('categories')->insert([
            'title'=>$request->input('title'),
            'keywords'=>$request->input('keywords'),
            'description'=>$request->input('description'),
            'image' => Storage::putFile('images', $request->file('image')),
            'status'=>$request->input('status')
        ]);
        return redirect()->route('admin_category');
    }
    public function add(Request $request)
    {
        DB::table('categories')->insert([

            'title'=>$request->input('category'),

        ]);
        $datalist = DB::table('categories')->get();
        return view('home.category1', ['datalist'=>$datalist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$id)
    {

        $data=Category::find($id);
        $datalist = DB::table('categories')->get();
        return view('home.category_edit', ['data'=>$data, 'datalist'=>$datalist,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $id)
    {
        $data=Category::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');

        $data->save();

        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('category');
    }
}
