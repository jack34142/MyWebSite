<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>我是俊毅</title>

	<script type="text/javascript" src="{{asset('resources/views/js/jquery-3.1.1.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('resources/views/css/style.css')}}"/>
    </head>
    <body>
        <div class="top bgw">
            <div id='hello' style="text-align: right; padding: 6px;">
                @if(session('userid'))
                    你好 {{$userid}}! <a href="{{url('logout')}}">登 出</a>
                @else
                    你好 訪客！
                @endif
            </div>

            <div class="btn"><a class="btnA" href="{{url('introduce')}}">簡 介</a></div>
            <div class="btn"><a class="btnA" href="{{url('memo')}}">備忘錄</a></div>
            <div class="btn"><a class="btnA" href="{{url('click')}}">小遊戲</a></div>
            <div class="btn"><a class="btnA" href="{{url('resume')}}">關於我</a></div>
            <div class="btn"><a class="btnA" href="{{url('login')}}">登 入</a></div>
        </div>

        <div class="bgw">
            @yield('content')
        </div>
       
    </body>
    <script>
        $('body').css('background-image',"url('/resources/views/image/bg.png')")
    </script>
</html>
