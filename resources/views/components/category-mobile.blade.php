@if(!$categories->isEmpty())
    <ul class="dropdown">
        @foreach($categories as $category)
            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                    href="{{route('category.products',encrypt($category->id))}}">{{ Str::limit($category->name, 25) }} </a>

            @if(!$category->products()->isEmpty())
                    <ul class="dropdown">
                        @foreach($category->products() as $product)
                            <li><a href="{{route('products.show',encrypt($product->id))}}">{{ Str::limit($product->name, 25) }}</a>
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
