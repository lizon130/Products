@extends('backend.layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Products</h3>
                      <a href="{{route('product.add')}}" class="btn btn-success btn-sm" style="float:right"> <i class="fa fa-plus" aria-hidden="true"> </i> Add New </a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Product Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($product as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->price}}</td>

                                    <td>
                                        <a href="{{route('product.edit', $data->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a> 
                                        <a href="{{route('product.delete', $data->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>                                          
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
    </div>
</div> 
@endsection