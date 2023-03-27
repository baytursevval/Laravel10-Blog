<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $datalist_comment = Comment::all();
        return view('admin.comment',['datalist_comment'=>$datalist_comment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $blog_id)
    {
        $data=new Comment;
        $data->user_id =Auth::user()->id;
        $data->comment = $request->input('comment');
        $data->blog_id = $blog_id;

        $data->save();
        return redirect()->route('blogdetay',['blog_id'=>$blog_id]);


    }
    public function adminedit(Comment $comment, $id)
    {
        $data=Comment::find($id);
        //  $data->status= 'True';
        //  $data->save();
        return view('admin.comment_edit',['data'=>$data]);
    }
    public function adminupdate(Request $request, Comment $comment, $id)
    {

        $data=Comment::find($id);
        $data->status=$request->input('status');
        $data->save();
        return back()->with('success', 'Yorum Güncellendi');

    }
    public function admindestroy(Comment $comment, $id)
    {
        $data=Comment::find($id);
        $data->delete();
        return redirect()->route('admin_comment')->with('success','Yorum Silindi.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function mycomments()
    {
        $user_id=Auth::user()->id;
        $datalist_comments=Comment::where('user_id', $user_id)->get();
        return view ('home.user_comments',['datalist_comments'=>$datalist_comments]);
    }
    public function delete($id)
    {
        DB::table('comments')->where('id', '=', $id)->delete();
        return redirect()->route('mycomments');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment,$id)
    {
        $data = DB::table('comments')->find($id);

        return view('home.comment_edit', ['data'=>$data,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment,$id)
    {
        $data=Comment::find($id);
        $data->comment = $request->input('comment');

        $data->save();

        return redirect()->route('mycomments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
