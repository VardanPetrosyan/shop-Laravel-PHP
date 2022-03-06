
@if($child_category->role == 'categorie')
    <option value="{{ $child_category->id  }} "> {{ $child_category->name  }} </option>

        @if ($child_category->categories)
                        @foreach ($child_category->categories as $childCategory)
                            @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                        @endforeach
        @endif
    </li>
@endif
