@extends('layouts.Admin')

@section('title', 'Category List')

@section('content')


<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
    <h1>Categories</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="card">
<div class="card-header">
<a href="{{ route('admin_category_add') }}" type="button" class="btn btn-block btn-success col-1">Add
    Category</a>
</div>
<div class="card-body">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="table table-fluid" id="myTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Parent Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Product Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->parent->title ?? 'Main Category' }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>{{ $category->getProductCount() }}</td>
                                        <td>
                                            <a href="{{ route('admin_category_edit', ['id' => $category->id]) }}"
                                                class='btn btn-primary'> Edit</a>
                                            <a href="{{ route('admin_category_delete', ['id' => $category->id]) }}"
                                                class='btn btn-danger'
                                                onclick="return confirm('You are about to delete a category. Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- KATEGORİ AĞACI -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="width:max; height:600px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 mt-4" style="margin:left;">
                                    <div class="col-md-6">
                                        <ul id="tree1">
                                            @if ($mainCategories)
                                                @foreach ($mainCategories as $category)
                                                    <li
                                                        style="border-style: solid; border-color:gray; border-width:thin;">
                                                        {{ $category->title }}
                                                        ({{ $category->getProductCount() }})
                                                        @if ($category->children()->count())
                                                            @include(
                                                                'menu.manageChild',
                                                                ['children' => $category->children]
                                                            )
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="/js/treeview.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.KATEGORİ AĞACI -->

    </div>
</section>
</div>
</div>
</section>
</div>
<script type="text/javascript"
src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="{{ asset('assets') }}/admin/plugins/jszip/jszip.min.js"></script>
<script type="text/javascript" src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/buttons.html5.min.js">
</script>

<script>
$('#myTable').DataTable({
"sPaginationType": "full_numbers",
dom: '<"top"lBf>rt<"bottom"ip><"clear">',
buttons: [{
extend: 'copy',
exportOptions: {
    columns: [0, 1, 2, 3, 4]
}
},
{
extend: 'pdf',
exportOptions: {
    columns: [0, 1, 2, 3, 4]
}
},
{
extend: 'excel',
title: 'Products',
exportOptions: {
    columns: [0, 1, 2, 3, 4]
}
}
]
});
</script>
@endsection
