@extends('shared/master')

@section('content')

<?php

use Illuminate\Support\Facades\Session;

if (Session::has('msg')) {
    ?>
    <script>
        var msg = "<?= Session::get('msg'); ?>";
        sweetAlert(msg, "", "error");
    </script>
    <?php
    Session::forget('msg');
}
?>
<div id="racks">
    <h2>Make new Rack here</h2>
    <form method="get" action="{{url('/rack/create')}}">
        <ul class="form-style-1">
            {{csrf_field()}}
            <li><label>Rack Name <span class="required">*</span></label>

                <input class="field-long" type="text" placeholder="Enter here rack" name="rack_name" required>
            </li>
            <li>
                <input value="Add" type="submit">
            </li>
        </ul>
    </form>
    <h2>Add Book here</h2>
    <form method="get" action="{{url('/book/create')}}">
        <ul class="form-style-1">
            {{csrf_field()}}
            <li><label>Book Name <span class="required">*</span></label>
                <input type="text" name="book_name" class="field-long" placeholder="Enter Book Name" required/></li>
            <li>
                <label>Author Name <span class="required">*</span></label>
                <input type="text" name="author_name" class="field-long" placeholder="Enter Author Name" required/>
            </li>
            <li>
                <label>Published Year <span class="required">*</span></label>
                <input type="text" name="year" class="field-long" placeholder="Enter Published Year" required/>
            </li>
            <li>
                <label>Rack in which you want to insert book</label>
                <select name="rack_id" class="field-select">
                    @if (count($racks))
                    @foreach($racks as $rack)
                    <option value="{{$rack->id}}">{{$rack->name}}</option>>
                    @endforeach
                    @endif
                </select>
            </li>
            <li>
                <input value="Add" type="submit">
            </li>
        </ul>
    </form>
    @if (count($racks))
    <h2>Racks List</h2>
    <table>
        <thead>
            <tr>
                <th>Rack Name</th>
                <th>Total Books</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($racks as $rack)
            <tr class="racks_list_admin" data-id='{{$rack->id}}'>
                <td style="color:green; cursor: pointer">{{$rack->name}}</td>
                <td>{{$rack->total_books}}</td>
                <td>
                    <form method='POST' action='{{url('rack')}}/{{$rack->id}}'> 
                          <a href='{{url('/rack')}}/{{$rack->id}}/edit'>edit</a>
                        <input type='hidden' name='_token' id='csrf-token' value='{{ csrf_token() }}'/>
                        <input type='hidden' name='_method' value='DELETE'> 
                        <input class='submitLink' type='submit' value='delete'> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<br><br><br>

<div id="rack_books_admin">
    <h2>Books List</h2>
    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="rack_books_tbody">

        </tbody>
    </table>
</div>
@stop