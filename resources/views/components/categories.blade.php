<div>
    <ul class="mega-menu">
        @foreach ($categories as $category)
            <li class="sub-mega-menu sub-mega-menu-width-22">
                <a style="margin-top: 20px" href="{{route('category.products', encrypt($category->id))}}" class="menu-title">{{ $category->name }}</a>
                <ul>
                    @foreach ($category->subCategories() as $subCategory)
                        <li><a href="{{route('subCategory.products', encrypt($subCategory->id))}}">{{ $subCategory->name }}</a></li>
                    @endforeach
                </ul>
                {{ $category->subCategories()->links() }}
            </li>
        @endforeach
    </ul>
</div>
