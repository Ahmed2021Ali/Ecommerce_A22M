<div>
    <ul class="mega-menu">
        @foreach ($categories as $category)
            <li class="sub-mega-menu sub-mega-menu-width-22">
                <a class="menu-title" href="{{route('category.products', encrypt($category->id))}}">{{ $category->name }}</a>
                <ul>
                    @foreach ($category->products() as $product)
                        <li><a href="{{route('products.show', encrypt($product->id))}}">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
                {{ $category->products()->links() }}
            </li>
        @endforeach
    </ul>
</div>
