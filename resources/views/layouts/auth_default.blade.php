<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    
    <title>@yield('title')</title>
    <link rel ="stylesheet" href="{{asset('css/auth.css?20220730')}}">
    <link rel ="stylesheet" href="{{asset('css/top.css?20220730')}}">
    <link rel ="stylesheet" href="{{asset('css/user.css?20220730')}}">
    <link rel ="stylesheet" href="{{asset('css/post.css?20220730')}}">
    <link rel ="stylesheet" href="{{asset('css/work.css?20220730')}}">
    <meta name="viewport" content="width=device=width, initial-scale=1">
</head>
<body>
    
@yield('header')



@yield('content')


@yield('footer')
<script src="{{asset('script/auth_script.js')}}"></script>
</body>