@extends('web.layouts.master')
@section('content')
    
    <br>
    <div class="container" style="text-align: center">
        <div class="row">
            <div class="col-lg-12" style="text-align: center">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="image">
                                <h2 class="blog-title">{{ $show_detail->title }}</h2>
                                <br>
                                <img src="blog/{{ $show_detail->image }}" width="400px" alt="#" style="margin-right: 60px">
                            </div>
                            <br>

                            <div class="blog-detail">
                                <div class="content">
                                    <p>
                                        {!! $show_detail->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <div class="col-12" id="div1">
            <h3 class="comment-title">Comments</h3>
            <br>
            <div class="comments" id="show">


            </div>
        </div>
        <br>
        <br>
        <div class="col-12">
            <h3> Comment</h3>
            <br>

            <form action="javascript:void(0)" id="form_comment">
                <div class="form-group">
                    <input type="hidden" id="id_blog" value="{{ $show_detail->id }}">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <textarea name="comment" class="form-control" id="comment" cols="10" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>

            </form>
        </div>

    </div>
    <br>
    <script>
        $(document).ready(function() {

            $('#form_comment').submit(function(e) {
                e.preventDefault();
                var name = $("#name").val();
                var comment = $("#comment").val();
                var id_blog = $("#id_blog").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('web.comment') }}",
                    data: {
                        name: name,
                        comment: comment,
                        id_blog: id_blog
                    },
                    success: function(data) {
                        $('#form_comment')[0].reset();
                        load()
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            load()
        });

        function load() {
            var id = $("#id_blog").val();
            $.get("{{ url('comment') }}/" + id, {}, function(data, status) {
                $("#show").html(data);
            });
        }
    </script>
@endsection
