@extends('shared/master')

@section('content')
<div id="racks">
    @if (count($racks))
    <h2>Racks List</h2>
    <table>
        <thead>
            <tr>
                <th>Rack Name</th>
                <th>Total Books</th>
            </tr>
        </thead>
        <tbody>
            @foreach($racks as $rack)
            <tr class="racks_list" data-id='{{$rack->id}}'>
                <td style="color:green; cursor: pointer">{{$rack->name}}</td>
                <td>{{$rack->total_books}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <div id="rack_books">
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                </tr>
            </thead>
            <tbody id="rack_books_tbody">

            </tbody>
        </table>
    </div>
    <br><br>

    <div id="search_books">
        <ul class="form-style-1">
            <li><label>Search the books with title, author name or published year:  <span class="required">*</span></label>
                <input class="field-long" style="width: 350px;" id="search_by" type="text" name="search_by" required/>
            </li>
            <li>
                <input type="button" id="search-btn" value="Search" />
            </li>
        </ul>
    </div>

    <br>
    <div id="searched_books">
        <h2>Search Result</h2>
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Rack</th>
                </tr>
            </thead>
            <tbody id="searched_rack_books_tbody">

            </tbody>
        </table>
    </div>

    @endif
</div>
@stop