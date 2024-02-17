<div class="main-categori-wrap mobile-header-border">
    <a class="categori-button-active-2" href="#">
        <span class="fi-rs-apps" ></span> تصفح المنتجات
    </a>
    <div class="categori-dropdown-wrap categori-dropdown-active-small" >
        <ul>
            @if (!$products->isEmpty())
                @foreach($products as $product)
                    <li><a href="{{route('products.show',encrypt($product->id))}}"><i class="surfsidemedia-font-dress"></i>{{$product->name}}</a></li>
                @endforeach
            @endif
        </ul>
        {{$products->links()}}
    </div>
</div>
