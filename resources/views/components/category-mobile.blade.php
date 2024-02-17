@if(!$categories->isEmpty())
    <ul class="dropdown">
        @foreach($categories as $category)
            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                    href="{{route('category.products',encrypt($category->id))}}">{{$category->name}}</a>
                @if(!$category->products()->isEmpty())
                    <ul class="dropdown">
                        @foreach($category->products() as $product)
                            <li><a href="{{route('products.show',encrypt($product->id))}}">{{$product->name}}</a>
                            </li>
                        @endforeach
                        {{$category->products()->links()}}
                    </ul>
                @endif
            </li>
        @endforeach
        {{$categories->links()}}
    </ul>
@endif
