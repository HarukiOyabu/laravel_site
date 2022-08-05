<?php

namespace App\Http\Controllers;

Use App\Models\User;
use App\Models\Post;
use App\Models\Edit;


use App\Http\Requests\UserRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditRequest;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function auth_index(){

        return view('logged_in/index',[
            'title' =>"編集画面",
        ]);
    }



    public function user_index(){
        $user = \Auth::user();

        return view('logged_in/user_index',[
            'title' => 'ユーザー情報',
            'user' => $user,
        ]);
    }


    public function user_update(UserRequest $request){
        $user = \Auth::user();
        $path = '';
        $background_path = '';


        $image = $request->file('image');
        $background_image = $request->file('background_image');

        if(isset($image) === true){
            $path = $image->store('userPhotos','public');
        }else{
            $path = $user->image;
        }

        if($user->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }


        if(isset($background_image) === true){
            $background_path = $background_image->store('backgroundPhotos','public');
        }else{
            $background_path = $user->background_image;
        }

        if($user->background_image !== ''){
            \Storage::disk('public')->delete(\Storage::url($user->background_image));
        }


        $user->update([
            'image'=> $path,
            'background_image' => $background_path,
        ]);

            $user->update($request->only(['name','profile']));

            return redirect()->route('auth.index');

    }


    public function post_index(){
        $posts = Post::all();
        return view('logged_in/post_index',[
            'title' => '投稿情報一覧',
            'posts' => $posts,
        ]);
    }

    public function post_store(PostRequest $request){
        $user = \Auth::user();
        $path = '';
        $image = $request->file('image');

        if(isset($image) === true){
            $path = $image->store('postPhotos', 'public');
        }

        Post::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path, 
        ]);

        return redirect()->route('auth.index');
    }


    public function post_destroy($post){

        $post = Post::find($post);
        if($post->image !== ''){
            \Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('post.index');
    }


    public function post_edit($post){
        $post = Post::find($post);

        return view('logged_in/post_edit',[
            'title' => '投稿編集画面',
            'post' =>$post,
        ]);
    }



    public function post_update($post , PostRequest $request){
        $post = Post::find($post);
        $user = \Auth::user();

        if($user->id ===$post->user_id){
            $path = '';
            $image = $request->file('image');

            if(isset($image) === true){
                $path = $image->store('postPhotos','public');
            }else{
                $path = $post->image;
            }

            if($post->image !== ''){
                \Storage::disk('public')->delete(\Storage::url($post->image));
            }

            $post->update([
                'image' => $path,
            ]);

            $post->update($request->only(['title', 'description']));

            return redirect()->route('post.index');
        }else{

            return redirect()->route('top.index');
        }
    }


    public function work_index(){
        $works = Edit::latest()->get();

        return view('logged_in/work_index',[
            'title' =>'制作物一覧',
            'works'=>$works,
        ]);
    }


    public function work_store(EditRequest $request){
        $path= '';
        $image = $request->file('image');


        if(isset($image) === true){
            $path= $image->store('workPhotos','public');
        }

        Edit::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url,
            'image' => $path,
        ]);

        return redirect()->route('work.index');
    }

    public function work_destroy($work){
        $work = Edit::find($work);

        if($work->image !== ''){
            \Storage::disk('public')->delete($work->image);
        }

        $work->delete();

        return redirect()->route('work.index');
    }


    public function work_edit($work){
        $work = Edit::find($work);

        return view('logged_in/work_edit',[
            'title' =>'制作物編集画面',
            'work' =>$work,
        ]);
    }


    public function work_update($work, EditRequest $request){
        $work = Edit::find($work);

        $path = '';
        $image = $request->file('image');

        if(isset($image) === true){
            $path = $image->store('workPhotos','public');
        }else{
            $path = $work->image;
        }

        if($work->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($work->image));
        }

        $work->update([
            'image' => $path,
        ]);

        $work->update($request->only([
            'title',
            'description',
            'url',
        ]));

        return redirect()->route('work.index');

    }




    public function __construct()
    {
        $this->middleware('auth');
    }
}
