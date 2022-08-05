@extends('layouts.logged_in')

@section('title',$title)

@section('content')

<main>
    <form method="POST" action="{{ route('post.update', $post->id)}}" enctype="multipart/form-data" class="post_edit">
    @csrf
    @method('patch')
        <div>
            <label>Title<br>
                <input type="text" name="title" value="{{$post->title}}">
            </label>
        </div>

        <div>
            <label>Description<br>
                <textarea name="description" class="edit_description">{{$post->description}}</textarea>
            </label>
        </div>

        <div>
            <input type="file" name="image">
        </div>

        <input type="submit" value="update"> 

</form>

</main>


@endsection