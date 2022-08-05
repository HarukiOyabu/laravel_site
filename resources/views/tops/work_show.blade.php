@extends('layouts.guest_show')

@section('title',$title)

@section('content')
<main>

    @if($user->background_image !== '')
    <img src="{{asset('storage/' . $user->background_image)}}" class="background-img">
    @else
    <img src="{{asset('images/background.png')}}" class="background-img">
    @endif


    <article class="work_show">
        <section class="work_show_img">
            <img src="{{asset('storage/' . $work->image)}}">
            <a href="{{$work->url}}">GitHub</a>
        </section>
        <section class="work_show_text">
            <h3>{{$work->title}}</h3>
            <p>{{$work->description}}</p>
            
        </section>

    </article>
   
</main>


@endsection