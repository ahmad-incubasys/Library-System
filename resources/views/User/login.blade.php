@extends('shared/master')



@section('content')
<h2>Welcome to Library System</h2>

<form class="login-form" method="POST" action="{{url('/user/login')}}">
    <ul class="form-style-1">
        {!! csrf_field() !!}

        <li><label>Email</label>
            <input class="field-long" type="email" placeholder="Email ID" name="email">
        </li>
        <li><label>Password</label>
            <input class="field-long" type="password" placeholder="Password" name="password" id="password">
        </li>
        <li>
            <input type="submit" value="Login"  class="sign-btn">
        </li>
    </ul>
</form>
@stop
