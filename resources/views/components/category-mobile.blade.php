@if(!$categories->isEmpty())
    <ul class="dropdown">
        @foreach($categories as $category)
            <li class="menu-item-has-children">
                <span class="menu-expand"></span>
                <a href="{{ route('category.products', encrypt($category->id)) }}">
                    {{ Str::limit($category->name, 25) }}
                </a>
            </li>
        @endforeach
        <li class="pagination">
            {{ $categories->links() }}
        </li>
    </ul>
@endif
