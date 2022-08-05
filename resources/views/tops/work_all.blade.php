@extends('layouts.guest_show')

@section('title',$title)

@section('content')


<main>
    @if($user->background_image !== '')
    <img src="{{asset('storage/' . $user->background_image)}}" class="background-img">
    @else
    <img src="{{asset('images/background.png')}}" class="background-img">
    @endif
   
    <div class="works_all">
    <h3>一覧</h3>
                @forelse($works as $work)
                <section class="work_all">
                    <div class="work_img">
                        <img src="{{asset('storage/' . $work->image)}}">
                        <a href="{{route('work.show', $work->id)}}" class="view">View</a>
                    </div>
                    <div class="work_text">
                        <p>{{$work->title}}</p>
                    </div>
                </section>
                @empty
                @endforelse

    </div>
</main>


@endsection