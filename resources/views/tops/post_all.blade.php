@extends('layouts.guest_show')

@section('title',$title)

@section('content')


<main>
    @if($user->background_image !== '')
    <img src="{{asset('storage/' . $user->background_image)}}" class="background-img">
    @else
    <img src="{{asset('images/background.png')}}" class="background-img">
    @endif
    <div class="posts_all">

        @forelse($posts as $post)
        <section class="post">
            <div class="post_img">
                <img src="{{asset('storage/' . $post->image)}}">
                <a href="{{route('post.show', $post->id)}}" class="view">View</a>
           </div>
            <div class="post_text">
                <p>{{$post->title}}</p>
            </div>
        </section>         
        @empty
        @endforelse

    </div>
</main>

@endsection