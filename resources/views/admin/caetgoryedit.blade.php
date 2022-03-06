 @foreach ($child_category->categories as $childCategory)
        @if ($childCategory->role == 'categorie')
            @if($childCategory->category_id == $child_category -> id)
                <td id="td_{{$childCategory->id}}">
                    {{ $childCategory->name  }}
                </td>
                @include('admin.caetgoryedit', ['child_category' => $childCategory])
            @else
                @include('admin.caetgoryedit', ['child_category' => $childCategory])
            @endif
        @else
            @include('admin.caetgoryedit', ['child_category' => $childCategory])
        @endif
@endforeach

