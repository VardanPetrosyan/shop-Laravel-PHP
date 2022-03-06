
    @if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @if($childCategory->id == $product -> parent_id)
            <option  value="{{$childCategory->id}}">{{ $childCategory->name  }}</option>
    {{--            <td id="td_{{$childCategory->id}}" >--}}
    {{--                <input class="product-{{$product->id}}" type="text" name="name" value="{{ $childCategory->name  }}" disabled>--}}
    {{--            </td>--}}
            @else
            @include('admin.edit', ['child_category' => $childCategory])
            @endif
    @endforeach
    @endif
