<script>
    (function ($) {
        $(document).ready(function () {
            $("#rack_books").css('display', 'none');
            $("#searched_books").css('display', 'none');
            $("#rack_books_admin").css('display', 'none');

            $(".racks_list").click(function () {
                var rack_id = $(this).data("id");
                if (rack_id !== "") {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/book/get_rack_books')}}",
                        data: {rack_id: rack_id,
                            _token: "{{ csrf_token() }}"},
                        cache: false,
                        dataType: 'json',
                        success: function (msg) {
                            if (msg != "") {
                                $("#rack_books").css('display', 'block');
                                var book_data = "";
                                for (var i = 0; i < msg.length; i++) {
                                    book_data += "<tr>";
                                    book_data += "<td>" + msg[i]['title'] + "</td>";
                                    book_data += "<td>" + msg[i]['author'] + "</td>";
                                    book_data += "<td>" + msg[i]['published_year'] + "</td>";
                                    book_data += "</tr>";
                                }
                                $("#rack_books_tbody").html(book_data);
                            } else {
                                sweetAlert("No Result Found", "", "error");
                            }
                        }
                    });
                }
            });
            $("#search-btn").click(function () {
                var search_by = document.getElementById('search_by').value;
                if (search_by !== "") {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/book/search_books')}}",
                        data: {search_by: search_by,
                            _token: "{{ csrf_token() }}"},
                        cache: false,
                        dataType: 'json',
                        success: function (msg) {
                            console.log(msg);
                            if (msg != "") {
                                $("#searched_books").css('display', 'block');
                                var book_data = "";
                                for (var i = 0; i < msg.length; i++) {
                                    book_data += "<tr>";
                                    book_data += "<td>" + msg[i]['title'] + "</td>";
                                    book_data += "<td>" + msg[i]['author'] + "</td>";
                                    book_data += "<td>" + msg[i]['published_year'] + "</td>";
                                    book_data += "<td>" + msg[i]['name'] + "</td>";
                                    book_data += "</tr>";
                                }
                                $("#searched_rack_books_tbody").html(book_data);
                            } else {
                                sweetAlert("No Result Found", "", "error");
                            }
                        }
                    });
                }
            });

            $(".racks_list_admin").click(function () {
                var rack_id = $(this).data("id");
                if (rack_id !== "") {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/book/get_rack_books')}}",
                        data: {rack_id: rack_id,
                            _token: "{{ csrf_token() }}"},
                        cache: false,
                        dataType: 'json',
                        success: function (msg) {
                            if (msg != "") {
                                $("#rack_books_admin").css('display', 'block');
                                var book_data = "";
                                for (var i = 0; i < msg.length; i++) {
                                    book_data += "<tr>";
                                    book_data += "<td>" + msg[i]['title'] + " </td>";
                                    book_data += "<td>" + msg[i]['author'] + "</td>";
                                    book_data += "<td>" + msg[i]['published_year'] + "</td>";
                                    book_data += "<td><form method='POST' action='{{url('book')}}/"+msg[i]['id']+"'> <a href='{{url('/book')}}/" + msg[i]['id'] + "/edit'>edit</a><input type='hidden' name='_token' id='csrf-token' value='{{ csrf_token() }}'/><input type='hidden' name='_method' value='DELETE'> <input class='submitLink' type='submit' value='delete'> </form></td>";
                                    
                                    
                                    
                                    book_data += "</tr>";
                                }
                                $("#rack_books_tbody").html(book_data);
                            }
//                        else {
//                            alert('no result found');
//                        }
                        }
                    });
                }
            });
        });
    })(jQuery);

</script>