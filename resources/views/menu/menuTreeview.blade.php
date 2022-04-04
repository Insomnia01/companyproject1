@extends('layouts.Admin')

@section('title','Admin Panel Homepage')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1 mt-4">
      <div class="card">
        <div class="card-header">
          <h5>Multi Level Dynamic Menu In Laravel Treeview - nicesnippets.com</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-center mb-4 bg-info text-white">Menu List</h5>
              <ul id="tree1">
                @foreach($menus as $menu)
                <li>
                  {{ $menu->title }}
                  @if(count($menu->childs))
                  @include('menu.manageChild',['childs' => $menu->childs])
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/treeview.js"></script>
@endsection
