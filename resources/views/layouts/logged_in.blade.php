@extends('layouts.auth_default')
@section('header')


<header>
			<div class="auth_header_device">
				<div class="auth_header_btn">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</div>
			</div>
				
			<div class="auth_device_menu">
				<p><a href="{{route('top.index')}}">TOP</a></p>
				<p><a href="{{route('top.index')}}">PROFILE</a></p>
				<p><a href="{{route('top.index')}}">WORK</a></p>
				<p><a href="{{route('top.index')}}">NEWS</a></p>
			</div>
			<div class="auth_main_header">
				<ul>
					<li><a href="{{route('top.index')}}">TOP</a></li>
					<li><a href="{{route('top.index')}}">PROFILE</a></li>
					<li><a href="{{route('top.index')}}">WORK</a></li>
					<li><a href="{{route('top.index')}}">NEWS</a></p>
				</ul>
			</div>
</header>

@endsection

@section('footer')
<footer>
	<small>Copyright&copy Haruki Oyabu</small>
</footer>
@endsection