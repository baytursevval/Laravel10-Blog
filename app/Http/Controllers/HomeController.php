<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $datalist_category=Category::get();
        $datalist_slider=Blog::where('image','!=',null)->where('image','>','')->orderBy('image','desc')->limit(3)->get();


        return view('home.index',[
            'datalist_category'=>$datalist_category
        ]);

    }

    public function login(){

        return view('home.login');
    }

    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('home');
                //return redirect()->intended('defaultpage');
            }
            return back()->withErrors([
                'email'=>'The provided credentails do not match our records.',
            ]);
        }
        else
        {
            return view('home.login');
            //return redirect()->back();
        }
    }
    public function signup(){

        return view('home.signup');
    }

    public function signupcheck(Request $request){

        $count=User::where('email',$request->input('email'))->count();

        if($count==1)
            return redirect()->route('signup')->with('error','Bu Mail adresi kullanılıyor');
        else{
            $data=new User;
            $data->name=$request->input('name');
            $data->email=$request->input('email');
            $data->password=bcrypt($request->input('password'));
            $data->company=$request->input('company');

            $data->save();

            if($request->isMethod('post'))
            {
                $credentials = $request->only('email','password');
                if(Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->route('home');
                }
                return back()->withErrors([
                    'email'=>'The provided credentails do not match our records.',
                ]);
            }
            return view('home.index');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function blogsearch(Request $request){

        $search= $request->input('search');
        $datalist_search=Blog::where('title', 'like', '%'.$search.'%')->get();

        return view('home.blogsearch',['datalist_search'=>$datalist_search]);
    }

    public function blogdetay($blog_id){

        $data_blog= Blog::where('id', $blog_id)->get()->first();

        $data_category=Category::get();
        //$yorum_sayısı=DB::table('comments')->where('film_id', $film_id)->count();
        $datalist_comment=Comment::where('blog_id', $blog_id)->where('status','True')->get();

        $blog_id=['film_id'=>$blog_id];
        return view('home.blogdetay',['blog_id'=>$blog_id,
            'data_blog'=>$data_blog,
            'data_category'=>$data_category,
            'datalist_comment'=>$datalist_comment]);
            //'yorum_sayısı'=>$yorum_sayısı]);
    }



}
