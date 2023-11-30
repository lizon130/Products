@extends('backend.layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> == Edit == </h1>
            <br>
            <a href="{{route('product.index')}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"> View Products </i></a>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif

              <form action="{{route('product.update',$product->id)}}" method="POST">
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label>product Name</label>
                    <input type="text" class="form-control" value="{{$product->name}}" name="name">
                  </div>

                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" value="{{$product->quantity}}" name="quantity">
                  </div>

                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" value="{{$product->price}}" name="price">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
@endsection