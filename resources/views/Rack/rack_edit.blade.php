@extends('shared/master')

@section('content')
@if (count($rack))
<form method="POST" action="{{ url('rack',$rack[0]['id']) }}">
    <input type="hidden" name="_method" value="PUT">
    <ul class="form-style-1">
        {{ csrf_field() }}
        <li><label>Update Rack Name<span class="required">*</span></label>
            <input class="field-long" type="text" name="rack_name" value="{{$rack[0]['name']}}"> 
        </li>
        <li>
            <input  type="submit" value="submit">
        </li>
    </ul>
</form>

@endif
@stop