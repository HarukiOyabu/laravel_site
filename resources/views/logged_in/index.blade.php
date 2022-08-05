@extends('layouts.logged_in')

@section('title',$title)

@section('content')

<main>
    <section class="edit_menu">
        <a href="{{route('user.index')}}">ユーザー情報</a>
        <a href="{{route('post.index')}}">お知らせ情報</a>
        
        <a href="{{route('work.index')}}">制作物編集</a>
    </section>
</main>


@endsection