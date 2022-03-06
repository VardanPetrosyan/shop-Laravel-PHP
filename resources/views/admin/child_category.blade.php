
<?php
     $raquo = $child_category -> role;
?>

    <li>
        <a class="dropdown-item {{$raquo}}" href="{{route('product').'?'.$raquo.'='.$child_category->name }} "> {{ __("$child_category->name")  }} </a>
    @if($raquo == 'product')
    </li>
    @endif
        @if($childCategory)
            <ul class="submenu dropdown-menu" style="background-color: #0000;">
                @forelse  ($child_category->categories as $childCategory)

                            @include('admin.child_category', ['child_category' => $childCategory])
                                @empty

                    <p>Empty</p>
                @endforelse
            </ul>
        @endif
    @if($raquo == 'categori')
    </li>
    @endif

