@extends('layouts.logged_in')

@section('title',$title)

@section('content')


<main>
    <form method="POST" action="{{route('work.update', $work->id)}}" enctype="multipart/form-data" class="work_edit">
    @csrf
    @method('patch')
        <div>
            <label>Title<br>
                <input type="text" name="title" value="{{$work->title}}">
            </label>
        </div>

        <div>
            <label>Description<br>
                <textarea name="description" class="edit_description">{{$work->description}}</textarea>
            </label>
        </div>


        <div>
            <label>URL<br>
                <input type="text" name="url" value="{{$work->url}}">
            </label>
        </div>

        <div>
            <input type="file" name="image">
        </div>

        <input type="submit" value="update"> 

</form>

</main>


@endsection