@extends('_layouts.app')

@section('main')
    <div class="col-lg-2 " style="
            border: 1px solid;
            border-radius: 15%;
            padding: 5px;
            background-image: url('https://i.pinimg.com/736x/3a/43/db/3a43db2fc05c554b4e970331cc562300.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <hr>
        <div class="collapse navbar-collapse p-0 justify-content-center" id="main_nav">

            <ul class="navbar-nav col-lg-12 col-md-12 col-sm-12" style="display:flex; flex-direction: column">
                @foreach ($categories as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#{{$category->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">  {{ $category->name  }}  </a>
                        <ul class="dropdown-menu" id="{{$category->id}}" style="background-color: rgba(0, 0, 0, 0);">
                            @foreach ($category->childrenCategories  as $childCategory )
                                @include('admin.child_category', ['child_category' => $childCategory])
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                @if(Auth::user())
                    @if(Auth::user()->role == 'admin')

                        <li class="row">
                            <ul class="navbar-nav row col-lg-12 col-md-11 col-sm-12" style="display:flex; flex-direction: row">
                                <li class="nav-item dropdown col-lg-9 col-md-10 p-0">
                                    <a class="nav-link p-md-3 p-sm-2" style="border: 1px solid" href="{{route('add.Product')}}" > Edite </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <hr>
    </div>
    <div class="row">

            @if($products_info)
                @foreach($products_info as $product )
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-60">
                            <a href="{{route('product').'?product='.$product->name }}"><img class="card-img-top" src="{{asset('img/'.$product->img)}}" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('product').'?product='.$product->name }}">{{$product->name}}</a>
                                </h4>
                                <h5>${{$product->price}}</h5>
                                <p class="card-text">{{$product->descriptions}}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">★ ★ ★ ★ ☆</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        <!-- /.row -->

    </div>
@endsection
