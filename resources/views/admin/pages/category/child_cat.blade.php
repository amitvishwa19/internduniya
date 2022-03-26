{{-- <ol class="dd-list">
    @foreach ($categories as $category)
        <li class="dd-item" data-id="{{ $category->id }}">
            <div class="pull-right item_actions mg-t-10 mg-r-10">
                @if($category->status == true)
                    <span class="badge badge-info">Active</span>
                @else
                    <span class="badge badge-warning">InActive</span>
                @endif
                <a href="{{ route('category.edit' , $category->id)}}" class="btn btn-default btn-xs del-button dt-action-btn mp-0">Edit</a>
                <a href="javascript:void(0);" class="btn btn-default btn-xs del-button dt-action-btn btn-menu-item delete" id="{{$category->id}}">Delete</a>
            </div>
            <div class="dd-handle " style="border:1px solid grey;padding:10px 20px;">
                <span>{{ $category->name }}</span>
            </div>

            @if(!$category->child->isEmpty())
                @include('admin.pages.category.child_cat',['categories' => $category->child])
            @endif
        </li>
    @endforeach
</ol> --}}

<ol class="dd-list">
    @foreach ($categories as $category)
        <li class="dd-item" data-id="{{ $category->id }}" class="">
            <div class="dd-handle">
                <span>{{ $category->name }}
            </div>
            <div class="pull-right item_actions">
                <a href="{{ route('category.edit' , $category->id)}}" class="btn btn-default btn-xs del-button dt-action-btn mp-0">Edit</a>
                <a href="javascript:void(0);" class="btn btn-default btn-xs del-button dt-action-btn btn-menu-item delete" id="{{$category->id}}">Delete</a>
            </div>


            @if(!$category->child->isEmpty())
                @include('admin.pages.category.child_cat',['categories' => $category->child])
            @endif
        </li>
    @endforeach
    {{-- <li class="dd-item" data-id="2">
        <div class="dd-handle">
            Item 2
        </div>
        <ol class="dd-list">
            <li class="dd-item" data-id="3">
                <div class="dd-handle">
                    Item 3
                </div>
            </li>
            <li class="dd-item" data-id="4">
                <div class="dd-handle">
                    Item 4
                </div>
            </li>
            <li class="dd-item" data-id="5">
                <div class="dd-handle">
                    Item 5
                </div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="6">
                        <div class="dd-handle">
                            Item 6
                        </div>
                    </li>
                    <li class="dd-item" data-id="7">
                        <div class="dd-handle">
                            Item 7
                        </div>
                    </li>
                    <li class="dd-item" data-id="8">
                        <div class="dd-handle">
                            Item 8
                        </div>
                    </li>
                </ol>
            </li>
            <li class="dd-item" data-id="9">
                <div class="dd-handle">
                    Item 9
                </div>
            </li>
            <li class="dd-item" data-id="10">
                <div class="dd-handle">
                    Item 10
                </div>
            </li>
        </ol>
    </li> --}}
</ol>

