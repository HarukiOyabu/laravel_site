<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Edit;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //


    public function index(){
        $user = User::find(1);
        $posts =Post::latest()->limit(3)->get();
        $works =Edit::latest()->limit(3)->get();
        $works_all = Edit::all();


        if(empty($user)){
            return view('close');
        }else{
           
           return view('tops/top',[
            'title' =>'トップページ',
            'user'=> $user,
            'posts' =>$posts,
            'works' =>$works,
            'works_all' => $works_all,
        ]);
        }
    }


    public function post_show($post){
        $post = Post::find($post);
        $user = User::find(1);
        return view('tops/post_show',[
            'user' =>$user,
            'title' =>'お知らせ',
            'post' => $post,
        ]);
    }

    public function post_all(){
        $posts = Post::latest()->get();
        $user = User::find(1);
        return view('tops/post_all',[
            'user'=>$user,
            'title' =>'お知らせ一覧',
            'posts' => $posts,
        ]);
    }


    public function work_show($work){
        $work = Edit::find($work);
        $user = User::find(1);
        return view('tops/work_show',[
            'title' => '制作物',
            'work' => $work,
            'user'=> $user,
        ]);
    }

    public function work_all(){
        $user = User::find(1);
        $works = Edit::latest()->get();

        return view('tops/work_all',[
            'title' => '制作物一覧',
            'works' => $works,
            'user'=>$user,
        ]);
    }
}
