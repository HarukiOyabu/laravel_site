@extends('layouts.logged_in')

@section('title',$title)

@section('content')

<main>
    <form method="POST"  action="{{route('user_update')}}" enctype="multipart/form-data" class="user_edit">
    @csrf
    @method('patch')


        <div>
             <label>name<br>
                 <input type="text" name = "name" value="{{$user->name}}">
            </label>
        </div>

        <div>
             <label>profile<br>
                <textarea name="profile" class="input_profile">{{$user->profile}}</textarea>
                
            </label>
        </div>


         <div>
            <label>画像を選択<br>
                <input type="file" name="image">
             </label>
        </div>

        <div>
            <label>背景画像を選択<br>
                <input type="file" name="background_image">
            </label>
        </div>
    <input type="submit" value="update" class="update">
        <a href="{{route('auth.index')}}" class="back">Back</a>

    </form>

    <section class="user_edit_info">
        <h2>現在のユーザ情報</h2>
        <div>
            
            <p>{{$user->name}}</p>
            <p>{{$user->profile}}</p>
            <img src="{{ asset('storage/'. $user->image)}}">
        </div>
    </section>

</main>


@endsection