@extends('layouts.guest_show')

@section('title',$title)

@section('content')

<main>
    @if($user->background_image !== '')
    <img src="{{asset('storage/' . $user->background_image)}}" class="background-img">
    @else
    <img src="{{asset('images/background.png')}}" class="background-img">
    @endif
    <article class="post_show">
        <section class="post_show_img">
            <img src="{{asset('storage/' . $post->image)}}">
        </section>
        <section class="post_show_text">
            <h3>{{$post->title}}</h3>
            <p>{{$post->description}}</p>

        </section>

    </article>
</main>

@endsection