<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library System</title>
        {!! HTML::style('css/sweetalert.css')!!}
        {!! HTML::style('css/app.css')!!}
    </head>
    <body>
 
        <a id="logout" href="{{url('/user/logout')}}">Logout</a>
         
    
        {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js')!!} 
        @include('script')
        <!--{!! HTML::script('js/app.js')!!}-->
        {!! HTML::script('js/sweetalert.js')!!}
        {!! HTML::script('js/notify.min.js')!!} 
        {!! HTML::script('js/notify.js')!!} 
        
        <div class="container"> 
            @yield('content')
        </div>

    </body>
</html>
