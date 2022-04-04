<ul>
  @foreach($children as $child)
  <li>
    {{ $child->title}} ({{ $child->getProductCount() }})
    @if(count($child->children))
      @include('menu.manageChild',['children' => $child->children])
    @endif
  </li>
  @endforeach
</ul>
