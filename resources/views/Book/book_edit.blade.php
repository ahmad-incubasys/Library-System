@extends('shared/master')

@section('content')
@if (count($book))
<form method="POST" action="{{ url('book',$book[0]['id']) }}">
    <input type="hidden" name="_method" value="PUT">
    <ul class="form-style-1">
        {{ csrf_field() }}
        <li><label>Update Book Name<span class="required">*</span></label>
            <input class="field-long" type="text" name="book_name" value="{{$book[0]['title']}}"> 
        </li>
        <li>
            <input  type="submit" value="submit">
        </li>
    </ul>
</form>

@endif
@stop