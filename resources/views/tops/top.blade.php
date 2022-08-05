@extends('layouts.guest')

@section('title',$title)

@section('content')

<main>

    @if($user->background_image !== '')
    <img src="{{asset('storage/' . $user->background_image)}}" class="background-img">
    @else
    <img src="{{asset('images/background.png')}}" class="background-img">
    @endif
     <article id="top">
        <h1>Haruki Oyabu</h1>
        <p>web port folio</p>
        
    </article>


    <article id="profile">
        <h2>Profile</h2>
        <section>
            <div class="profile_name">
                <h3>{{$user->name}}</h3>
                @if($user->image !== '')
                <img src="{{asset('storage/'. $user->image)}}">
                @else
                @endif
                
            </div>
            <div class="profile_text">
                <p>{{$user->profile}}</p>
            </div>

            <div class="skill_lists">
                <h3>Skill</h3>
            </div>


        </section>

    </article>


    <article id="work">
            <h2>WORK</h2>
            <p>制作物</p>
            <div class="works">
                @forelse($works as $work)
                <section class="work">
                    <div class="work_img">
                        <img src="{{asset('storage/' . $work->image)}}">
                        <a href="{{route('work.show' , $work->id)}}" class="view">View</a>
                    </div>
                    <div class="work_text">
                        <p>{{$work->title}}</p>
                    </div>
                </section>
                @empty
                @endforelse
            </div>
            @if($works_all->count() >=4)
            <a href="{{route('work.all')}}" class="view">View More</a>
            @else
            @endif

    </article>

    <article id="news">
            <h2>NEWS</h2>
            <div class="posts">
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

                @if($posts->count() !== 0)
                    <a href="{{route('post.all')}}" class="view">View More</a>
                @else
                @endif
            </div>
    </article>





</main>

@endsection