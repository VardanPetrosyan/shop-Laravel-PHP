@extends('_layouts.app')

<main>
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
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" href="#{{$category->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">  {{ __("$category->name")  }}  </a>
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
                                        <a class="nav-link p-md-3 p-sm-2" style="border: 1px solid" href="{{route('add.Product')}}" >
                                            {{__('Edit')}}</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                    @endif
                </ul>
            </div>
            <hr>
        </div>
        <div class="row justify-content-center">
                <script>

                    // Prevent closing from click inside dropdown
                    $(document).on('click', '.dropdown-menu', function (e) {
                        e.stopPropagation();
                    });

                    // make it as accordion for smaller screens
                    if ($(window).width() < 992) {
                        $('.dropdown-menu a').click(function(e){
                            e.preventDefault();
                            if($(this).next('.submenu').length){
                                $(this).next('.submenu').toggle();
                            }
                            $('.dropdown').on('hide.bs.dropdown', function () {
                                $(this).find('.submenu').hide();
                            })
                        });
                    }
                </script>
            <!-- /.col-lg-3 -->

            <div class="row justify-content-center">

                <div class="col-12">

                <div id="carouselExampleIndicators" width="923px" height="100px" class="carousel slide" data-ride="carousel"style="
    padding: 10%;

">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox" >
                            <div class="carousel-item">
                                <img class="d-block img-fluid" width="923px" height="100px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQlPEL6hnI7SdVu1XlvVmO-e3WZJT4vVOGBiw&usqp=CAU" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" width="923px" height="100px"src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRbLbGOotYVo7YuSqM8bZuajQIZIDoiKmPfsA&usqp=CAU" alt="Second slide">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" width="923px" height="100px"src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ6QplvM4y-BhlL4oag3j68yrGjoRcsaH8Fmw&usqp=CAU" alt="Third slide">
                            </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row" style="
    align-items: end;
">
                    @if($products)
                        @foreach($products as $product )
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100" style="background-color: #0000;border: 1px solid #1e3e3e;border-radius: 33px;contain: content;">
                                    <a href="{{route('product').'?product='.$product->name }}"><img class="card-img-top" src="{{asset('img/'.$product->img)}}" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{route('product').'?product='.$product->name }}">{{__("$product->name")}}</a>
                                        </h4>
                                        <h5>${{$product->price}}</h5>
                                        <p class="card-text">{{__("$product->descriptions")}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">★ ★ ★ ★ ☆</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <!-- /.row -->
                </div>
            </div>
            <!-- /.col-lg-9 -->

        </div>

@endsection
</main>
