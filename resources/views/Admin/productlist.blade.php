@extends('layouts.Admin')
@section('title','Product List')

@section('datatable-css')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.top{
  display: flex;
  justify-content: space-between;
}
</style>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <a href="{{route('admin_product_add')}}" type="button" class="btn btn-block btn-success col-1">Add Product</a>
      </div>
      <div class="card-body">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <table id="producttable" class="table table-fluid">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Stock(Inventory)</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript" src="{{ asset('assets')}}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="{{ asset('assets')}}/admin/plugins/jszip/jszip.min.js"></script>
<script type="text/javascript" src="{{ asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {
  $('#producttable').DataTable({  
    processing: true,
    serverSide: true,
    ajax: "{{ asset('assets')}}/serverside/ajax.php?mode=bigdata",
    dom:'<"top"lBf>rt<"bottom"ip><"clear">',
    buttons:[
      {
        extend: 'copy',
        exportOptions:{
          columns:[0,1,2,3,4]
        }
      },
      {
        extend: 'pdf',
        exportOptions:{
          columns:[0,1,2,3,4]
        }
      },
      {
        extend: 'excel',
        title: 'Products',
        exportOptions:{
          columns:[0,1,2,3,4]
        }
      }
    ]
  });
});
</script>
@endsection
