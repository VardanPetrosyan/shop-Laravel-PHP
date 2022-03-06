@extends('_layouts.app')
<style>
    body
    {
        font-family:Gill Sans MT;
        padding:0;
    }
    fieldset
    {
        border: solid 1px #000;
        padding:10px;
        display:block;
        clear:both;
        margin:5px 0px;
    }
    legend
    {
        padding:0px 10px;
        background:black;
        color:#FFF;
    }
    input.add
    {
        float:right;
    }
    input.remove
    {
        float:left;
        display:block;
        margin:5px;
    }
    #yourform label
    {
        float:left;
        clear:left;
        display:block;
        margin:5px;
    }
    #yourform input, #yourform textarea
    {
        float:left;
        display:block;
        margin:5px;
    }
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
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
                                        {{__("Edit")}} </a>
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
                <div class="col-lg-8 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 m-4">
                                <a href="#"><img class="card-img-top" src="{{asset('img/'.$product->img)}}" alt=""></a>
                            </div>
                            <div class="col-lg-4 col-md-6 m-4">
                                <h4 class="card-title">
                                    {{__("Name")}}:<a href="#">{{__("$product->name")}}</a>
                                </h4>
                                <hr>
                                <h4>{{__("Price")}}: </h4><h5>${{$product->price}}</h5>
                                <hr>
                                <h4> {{__("Descriptions")}}:</h4><p class="card-text">{{__("$product->descriptions")}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-8 col-md-6 m-4">
                            <fieldset>
                                <legend style="background-color: whitesmoke">{{__("Info")}}</legend>
                                <table  >
                                    <tr>
                                        <th>{{__("Title")}}</th>
                                        <th>{{__("Directions")}}</th>
                                    </tr>
                                    @if($products_info_ubdate)
                                        @foreach($products_info_ubdate as $products_info_ubdates)
                                            <tr>
                                                <td class="p-2">{{__("$products_info_ubdates->title")}}</td>
                                                <td class="p-2">{{__("$products_info_ubdates->description")}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </fieldset>
                        </div>
                        @if(Auth::user())
                            @if(Auth::user()->role == 'admin')
                            <hr>
                            <div class="col-lg-8 col-md-6 m-4">
                            <fieldset>

                                    <h2 align="center">Add/remove info</h2>
                                    <form action="{{ route('infoadd') }}" method="POST">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                <p>{{ Session::get('success') }}</p>
                                            </div>
                                        @endif

                                        <table class="table table-bordered" id="dynamicTable">
                                            <tr>
                                                <th>{{__("Title")}}</th>
                                                <th>{{__("Descriptions")}}</th>
                                                <th>{{__("Action")}}</th>
                                            </tr>
                                            <tr>
                                                <input type="hidden" name="addmore[0][parent_id]" value="{{$product->id}}" class="form-control" />
                                                <td><input type="text" name="addmore[0][title]" placeholder="Enter title" class="form-control" /></td>
                                                <td><input type="text" name="addmore[0][description]" placeholder="Enter discreption" class="form-control" /></td>

                                                <td><button type="button" name="add" id="add"  onclick="addinput()" class="btn btn-success">
                                                    {{__("Add More")}}</button></td>
                                            </tr>
                                        </table>
                                        <button type="submit" class="btn btn-success">{{__("Save")}}</button>
                                    </form>
                            </fieldset>
                                <script type="text/javascript">
                                    var i = 0;
                                    function addinput(){
                                        ++i;
                                        $("#dynamicTable").append('<tr><input type="hidden" name="addmore['+i+'][parent_id]" value="{{$product->id}}" class="form-control" /><td><input type="text" name="addmore['+i+'][title]" placeholder="Enter Title" class="form-control" /></td><td><input type="text" name="addmore['+i+'][description]" placeholder="Enter discreption" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
                                    };
                                    $(document).on('click', '.remove-tr', function(){
                                        $(this).parents('tr').remove();
                                    });
                                </script>
                            </div>
                            @endif
                        @endif
                        <div class="card-footer">
                            <small class="text-muted">★ ★ ★ ★ ☆</small>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
    <!-- /.row -->

@endsection
