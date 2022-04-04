@extends('layouts.Admin')

@section('title', 'Edit Category')


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
          <li class="breadcrumb-item active">Edit Category</li>
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
          <h3 class="card-title">Edit Category</h3>
      </div>
      <!-- /.card-header -->
      <form role="form" action="{{ route('admin_category_update', ['id' => $data->id]) }}" method="post">
          @csrf
          <div class="card-body">
              <div class="form-group">
                  <label>Parent Category</label>
                  <select class="custom-select form-control-border" selected="{{ $data->parent_id }}"
                      name="parent_id">
                      <option value="{{ $data->parent_id }}" selected="selected"></option>
                      <option value="0">Main Category</option>
                      @foreach ($datalist as $rs)
                          <option value="{{ $rs->id }}"
                              @if ($rs->id == $data->parent_id) selected="selected" @endif>
                              {{ $rs->title }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" value="{{ $data->title }}" class="form-control"
                      placeholder="Category Title">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="custom-select form-control-border" name="status">
                      <option value="Active" @if ($rs->id == $data->status) selected="selected" @endif>
                          {{ $rs->status }}>Active</option>
                      <option value="Passive"
                          @if ($rs->id == $data->status) selected="selected" @endif>
                          {{ $rs->status }}>Passive</option>
                  </select>
              </div>
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
