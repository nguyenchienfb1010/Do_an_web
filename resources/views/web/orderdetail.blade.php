@extends('web.layouts.master')
@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $stt = 0;
                    @endphp
                    @foreach ($products as $item)
                    @php
                    $total += $item->qty * $item->price;
                    $stt++;
                @endphp
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <th scope="row">{{ $item->name }}</th>
                        <th scope="row"><img src="cover/{{ $item->img }}" width="60px" alt=""></th>
                        <th scope="row">{{ $item->qty }}</th>
                        <th scope="row">{{ $item->price }}</th>
                        <td scope="row">{{ ($item->qty * $item->price) }}</td>
                      </tr>
                    @endforeach
                  
                   <tr>
                       <td colspan="9" style="text-align: center; color: orange">Total : {{ ($total) }} VND</td>
                   </tr>
                 
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
