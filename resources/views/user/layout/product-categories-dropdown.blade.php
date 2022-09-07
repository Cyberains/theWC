    @foreach($categorydata as $category)
        <li class="has-mega-menu">
            <a href="{{ $category->id }}">{{ $category->title }}</a>        
            {{--<span class="sub-toggle"></span>
            <div class="mega-menu">
                
                    <div class="mega-menu__column">
                        @if(true)
                            <ul class="mega-menu__list">
                                @foreach($category->subCategoryName as $subcategory)
                                    <li><a href="{{ $subcategory->id }}">{{ $subcategory->title }}</a></li>
                                @endforeach
                            </ul>                                            
                        @endif
                    </div>
                
            </div>--}}        
        </li>
    @endforeach
