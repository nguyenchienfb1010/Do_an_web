@extends('web.layouts.master')
@section('content')

<br>
<br>
    <section class="shop-blog section mt-3">
        <div class="container">    
            <div class="row">
                @foreach ($blogs as $item)
                <div class="col-md-4">
                    <div class="shop-single-blog">
                        <img src="blog/{{ $item->image }}" width="320px" alt="#">
                        <div class="content" style="text-align: center">                   
                            <h5>{{ $item->title }}</h5>
                             <h6>Author: {{ $item->author }}</h6>
                             <h6>View: {{ $item->views }}</h6>
                            <p class="date">{{ $item->created_at }}</p>
                            <a href="{{ route('web.blog.detail',$item->slug) }}" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            {!! $blogs->links() !!}
        </div>
    </section>
    <br><br>
    
@endsection
