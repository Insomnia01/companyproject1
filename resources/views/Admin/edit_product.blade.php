@extends('layouts.Admin')

@section('title','Edit product')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid float-sm-right">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card col-8">
       <!-- form start -->
      <div class="card-body">
        <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Edit product</h3>
         </div>
         <!-- /.card-header -->
         <form role="form" action="{{route('admin_product_update',['product' => $data->id])}}" method="post"> 
           @csrf
           <div class="card-body">
            <div class="form-group">
              <label>Category</label>
              <select class="custom-select form-control-border" selected="{{$data->category_id}}" name="category_id">
                @foreach($categories as $categories)
                    <option value="{{$categories->id}}" @if ($categories->id == $data->category_id) selected="selected" @endif >{{$categories->title}}</option>
                 @endforeach
                </select>
            </div>
            <div class="form-group">
               <label>Title</label>
               <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="product Title">
            </div>
            <div class="form-group">
               <label>Stock</label> 
               <input type="text" name="stock" value="{{$data->stock}}" class="form-control" placeholder="Stock">
            </div>
            <div class="form-group">
              <select class="custom-select form-control-border"name="status">
                <option value="Active" @if ($categories->id == $data->status) selected="selected" @endif >{{$categories->status}}>Active</option>
                <option value="Passive" @if ($categories->id == $data->status) selected="selected" @endif >{{$categories->status}}>Passive</option>
              </select>
            </div> 
           <!-- /.card-body --> 

           <div class="card-footer">
             <button type="submit" class="btn btn-primary">Update</button>
           </div>
         </form>
       </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
