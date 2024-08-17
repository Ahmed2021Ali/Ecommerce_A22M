
@if(!$Categories->isEmpty())
    <ul class="dropdown">
        @foreach($Categories as $Category)
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">{{ $Category->name }} </a>
                <ul class="dropdown-menu">
                    @foreach($Category->subCategories() as $subCategory)
                    <li class="dropdown-item"><span class="menu-expand">  </span><a href="{{ route('subCategory.products', encrypt($subCategory->id)) }}">{{ $subCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="pagination">
                {{ $Category->subCategories()->links() }}
            </li>
        @endforeach
    </ul>
@endif
