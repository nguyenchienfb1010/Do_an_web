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
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date order</th>
                    <th scope="col">View</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->status == 0  ? "Pending" : "Done" }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('web.order.detail',$item->id) }}" class="btn btn-primary"  style="margin-top: -10px">View</a>
                        </td>
                      </tr>
                    @endforeach
                  
                  
                 
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
