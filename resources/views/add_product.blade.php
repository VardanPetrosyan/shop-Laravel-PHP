@extends('admin.admin')
{{--    @if($errors->any())--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-offset-4 col-md-4">--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error )--}}
{{--                            <li>{{$error}}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <form class="form-horizontal" action="{{route('addCategory')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <fieldset>--}}
{{--                    <!-- Form Name -->--}}
{{--                    <legend>ADD CATEGORIES</legend>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_categorie">CATEGORY</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <select id="product_categorie" name="id" class="form-control">--}}
{{--                                <option  value="null">Global </option>--}}
{{--                                @foreach ($categories as $category)--}}
{{--                                    <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>--}}
{{--                                    @foreach ($category->childrenCategories as $childCategory)--}}
{{--                                        @include('admin.add_categoris_chaild', ['child_category' => $childCategory])--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Text input-->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="categori_name">CATEGORI NAME</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <input id="categori_name" name="categori_name" placeholder="Categori Name" class="form-control input-md"  type="text">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- hidden input -->--}}
{{--                    <input type="hidden" name="role" value="categorie">--}}

{{--                    <!-- Button -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="singlebutton">Single Button</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <button id="singlebutton" name="singlebutton"    class="btn btn-primary">Add</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            </form>--}}
{{--            <form class="form-horizontal" action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <fieldset>--}}
{{--                    <!-- Form Name -->--}}
{{--                    <legend>ADD PRODUCTS</legend>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <select id="product_categorie"  name="id" class="form-control">--}}
{{--                                @foreach ($categories as $category)--}}
{{--                                    @foreach ($category->childrenCategories as $childCategory)--}}
{{--                                        @include('admin.add_categoris_chaild', ['child_category' => $childCategory])--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- hidden input -->--}}
{{--                    <input type="hidden" name="role" value="product">--}}
{{--                    <!-- Text input-->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Textarea -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <textarea class="form-control" id="product_description" name="product_description"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Textarea -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <input class="form-control" type="integer" id="product_price" name="price">--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <!-- Text input-->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="approuved_by">IMAGE</label>--}}
{{--                        <div class="col-md-4">--}}

{{--                            <!-- File Button -->--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <input id="filebutton" name="img" class="input-file" type="file">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Button -->--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            <form class="form-horizontal" action="{{route('removeCategory')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <fieldset>--}}
{{--                    <!-- Form Name -->--}}
{{--                    <legend>REMOVE CATEGORIES</legend>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_categorie">CATEGORY</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <select id="product_categorie" name="id" class="form-control">--}}
{{--                                @foreach ($categories as $category)--}}
{{--                                    <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>--}}
{{--                                    @foreach ($category->childrenCategories as $childCategory)--}}
{{--                                        @include('admin.add_categoris_chaild', ['child_category' => $childCategory])--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Button -->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="singlebutton">REMOVE CATEGORY</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Remove</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            </form>--}}
{{--            <form class="form-horizontal" action="{{route('removeProduct')}}" method="GET" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <fieldset>--}}
{{--                    <!-- Form Name -->--}}
{{--                    <legend>REMOVE PRODUCTS</legend>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <select id="product_categorie"  name="name" class="form-control">--}}
{{--                                @foreach ($products as $product)--}}
{{--                                    <option   value="{{ $product->name  }} ">{{ $product->name  }} </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Text input-->--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-md-4 control-label" for="singlebutton">REMOVE PRODUCT</label>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <button id="singlebutton" name="singlebutton"    class="btn btn-primary">Remove</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            </form>--}}
@if($errors->any())
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@section('main')
<div class="row">
    <div class="col-md-2">
        <p class="mt-5 btn-group">
            <a class="btn btn-dark" data-toggle="collapse" href="#editcategory" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{__('Remove Category')}}
            </a>
            <a class="btn btn-dark" data-toggle="collapse" href="#addcategory" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{__('Add Category')}}
            </a>
        </p>
    </div>
    <div class="row col-md-10">
        <div class="collapse" id="addcategory">
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="card mb-4 ">
                        <div class="card-header col-md-12">
                            <i class="fas fa-table mr-1"></i>
                            {{__('Add Categories')}}
                        </div>
                        <div class="card-body col-md-12">
                            <div class="table-responsive ">
                                <form class="form-horizontal" action="{{route('addCategory')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <fieldset>
                                        <!-- Form Name -->
                                        <legend>{{__('ADD CATEGORIES')}}</legend>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="product_categorie">CATEGORY</label>
                                            <div class="col-md-12">
                                                <select id="product_categorie" name="id" class="form-control">
                                                    <option  value="null">Global </option>
                                                    @foreach ($categories as $category)
                                                        <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="categori_name">CATEGORI NAME</label>
                                            <div class="col-md-12">
                                                <input id="categori_name" name="categori_name" placeholder="Categori Name" class="form-control input-md"  type="text">
                                            </div>
                                        </div>

                                        <!-- hidden input -->
                                        <input type="hidden" name="role" value="categorie">

                                        <!-- Button -->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="singlebutton">Single Button</label>
                                            <div class="col-md-12">
                                                <button id="singlebutton" name="singlebutton"    class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="editcategory">
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="card mb-4 ">
                        <div class="card-header col-md-12">
                            <i class="fas fa-table mr-1"></i>
                            Remove Categories
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="form-horizontal" action="{{route('removeCategory')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <fieldset>
                                        <!-- Form Name -->
                                        <legend>REMOVE CATEGORIES</legend>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="product_categorie">CATEGORY</label>
                                            <div class="col-md-12">
                                                <select id="product_categorie" name="id" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="singlebutton">REMOVE CATEGORY</label>
                                            <div class="col-md-12">
                                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Remove</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <p class="btn-group">
            <a class="btn btn-dark" data-toggle="collapse" href="#editproduct" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{__('Edit product')}}
            </a>
            <a class="btn btn-dark" data-toggle="collapse" href="#addproduct" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{__('Add product')}}
            </a>
        </p>
    </div>
    <div class="collapse" id="addproduct">
        <div class="col-md-12">
            <hr>
            <div class="row">
                <div class="card mb-4 ">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{__('Add Product')}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <form class="form-horizontal" action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <!-- Form Name -->
                                    <legend>{{__('ADD PRODUCTS')}}</legend>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="product_categorie">{{__('PRODUCT
                                            CATEGORY')}}</label>
                                        <div class="col-md-12">
                                            <select id="product_categorie"  name="id" class="form-control">
                                                @foreach ($categories as $category)
                                                    @foreach ($category->childrenCategories as $childCategory)
                                                        @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- hidden input -->
                                    <input type="hidden" name="role" value="product">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="product_name">{{__('PRODUCT NAME')}}</label>
                                        <div class="col-md-12">
                                            <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="product_description">{{__('PRODUCT
                                            DESCRIPTION')}}</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" id="product_description" name="product_description"></textarea>
                                        </div>
                                    </div>
                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="product_price">{{__('PRODUCT PRICE')}}</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="integer" id="product_price" name="price">
                                        </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="approuved_by">{{__('IMAGE')}}</label>
                                        <div class="col-md-12">

                                            <!-- File Button -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input id="filebutton" name="img" class="input-file" type="file">
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="editproduct">
        <div class="col-md-12">
            <hr>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{__('Edit Product')}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{__('Category')}}</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <select id="categories_option" name="id" class="form-control">
                                                    <option  value="null">All </option>
                                                    @foreach ($categories as $category)
                                                        <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <form action="{{route('removeProduct')}}" method="POST" enctype="multipart/form-data" id="aaa" >
                                @csrf
                                <table class="table table-bordered" id="product_table">
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                        <th>Category Name</th>
                                        <th width="50px">Product</th>
                                        <th>Product Name</th>
                                        <th>Product Descriptions</th>
                                        <th>Product Price</th>
                                        <th>
                                            Edit
                                        </th>
                                        <th>
                                            <button type="submit"class="btn btn-danger btn-sm"
                                                    name="product"
                                                    value="delete"
                                                    data-tr="tr_111"
                                                    data-toggle="confirmation"
                                                    data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                    data-btn-ok-class="btn btn-sm btn-danger"
                                                    data-btn-cancel-label="Cancel"
                                                    data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                    data-btn-cancel-class="btn btn-sm btn-default"
                                                    data-title="Are you sure you want to delete ?"
                                                    data-placement="left" data-singleton="true">
                                                Delete
                                            </button>
                                        </th>
                                    </tr>
                                    @csrf
                                    @forelse ($products as $product)
                                        <tr id="tr_{{$product->parent_id}}" class="edit_tr">
                                            <td><input type="checkbox" name='product_array[]' value="{{$product->name}}" class="sub_chk chek" data-id="{{$product->parent_id}}"></td>
                                            <td>
                                                <select id="categories_option" name="id" class="form-control product-{{$product->id}}" disabled>
                                                    @foreach ($categories as $category)
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            @include('admin.edit', ['child_category' => $childCategory])
                                                        @endforeach
                                                    @endforeach
                                                    @foreach ($categories as $category)
                                                        <option  value="{{ $category->id  }} "> {{ $category->name  }} </option>
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            @include('admin.add_categoris_chaild', ['child_category' => $childCategory])
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="product-{{$product->id}}-img">
                                                <div class="d-flex justify-content-start form-group">
                                                    <div class="image-container">
                                                        <img src="{{asset("img/$product->img")}}" id="imgProfile-{{$product->id}}" style="width: 100px; height: 100px" class="img-thumbnail" />
                                                        <div class="middle">
                                                            <input type="button" class="btn btn-secondary product-{{$product->id}} btnChangePicture" onclick="editPicture(this)" name="{{$product->id}}" value="edit" disabled>
                                                            <input type="file" class="input-file  profilePicture" onchange="editprofilePicture(this)" id="{{$product->id}}" style="display: none"  name="img">
                                                        </div>
                                                    </div>

                                                    <div class="ml-auto">
                                                        <input type="button" class="btn btn-primary d-none" id="btnDiscard" onclick="Discard()" value="Discard Changes" />
                                                    </div>
                                                </div>
                                            </td>
                                            <input type="hidden" class="product-{{$product->id}}" name="product_name" value="{{$product->name}}" disabled>
                                            <td><input class="product-{{$product->id}}" type="text" name="edit_product_name" value="{{$product->name}}"disabled></td>
                                            <td><input class="product-{{$product->id}}"type="text" name="product_description" value="{{$product->descriptions}}"disabled></td>
                                            <td ><input class="product-{{$product->id}}" type="text" name="price" value="{{$product->price}}"disabled></td>
                                            <td>
                                                <button type="button" onclick="editproduct({{$product->id}})" class="btn btn-primary btn-sm edit-{{$product->id}}"
                                                        data-tr="tr_111"
                                                        data-toggle="confirmation"
                                                        data-btn-ok-label="Edit" data-btn-ok-icon="fa fa-add"
                                                        data-btn-ok-class="btn btn-sm btn-primary"
                                                        data-btn-cancel-label="Cancel"
                                                        data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                        data-btn-cancel-class="btn btn-sm btn-default"
                                                        data-title="Are you sure you want to Edit ?"
                                                        data-placement="left" data-singleton="true">
                                                    Edit
                                                </button>
                                                <div class="btn-group cancel-{{$product->id}} d-none">
                                                    <button type="submit"class="btn btn-success btn-sm "
                                                            name="product"
                                                            value="save"
                                                            data-tr="tr_111"
                                                            data-toggle="confirmation"
                                                            data-btn-ok-label="Save" data-btn-ok-icon="fa fa-add"
                                                            data-btn-ok-class="btn btn-sm btn-success"
                                                            data-btn-cancel-label="save"
                                                            data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                            data-btn-cancel-class="btn btn-sm btn-default"
                                                            data-title="Are you sure you want to Edit ?"
                                                            data-placement="left" data-singleton="true">
                                                        Save
                                                    </button>
                                                    <button type="button"class="btn btn-danger btn-sm "
                                                            onclick="canceleditproduct({{$product->id}})"
                                                            name="cancel"
                                                            data-tr="tr_111"
                                                            data-toggle="confirmation"
                                                            data-btn-ok-label="Cancel" data-btn-ok-icon="fa fa-remove"
                                                            data-btn-ok-class="btn btn-sm btn-danger"
                                                            data-btn-cancel-label="Cancel"
                                                            data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                            data-btn-cancel-class="btn btn-sm btn-default"
                                                            data-title="Are you sure you want to Edit ?"
                                                            data-placement="left" data-singleton="true">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{route('removeProduct')}}" method="POST" enctype="multipart/form-data" id="aaa">
                                                    <button type="submit" name="product_name" value = "{{$product->name}}" class="btn btn-danger btn-sm"
                                                            data-tr="tr_111"
                                                            data-toggle="confirmation"
                                                            data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                            data-btn-ok-class="btn btn-sm btn-danger"
                                                            data-btn-cancel-label="Cancel"
                                                            data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                            data-btn-cancel-class="btn btn-sm btn-default"
                                                            data-title="Are you sure you want to delete ?"
                                                            data-placement="left" data-singleton="true">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        {{'Empty'}}
                                    @endforelse

                                </table>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

    function editproduct(id_class){
        $imgSrc = $(`#product-img-${id_class}`).attr('src');
        $(`.edit-${id_class}`).addClass('d-none');
        $(`.cancel-${id_class}`).removeClass('d-none');
        $(`.product-${id_class}`).removeAttr('disabled')
    }
    function canceleditproduct(id_class){
        $(`.product-${id_class}`).attr('disabled','disabled');
        $(`.edit-${id_class}`).removeClass('d-none');
        $(`.cancel-${id_class}`).addClass('d-none');
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            let aa = $(input)[0].id
            reader.onload = function (e) {
                $(`#imgProfile-${aa}`).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
        function editPicture(btn) {
            // document.getElementById('profilePicture').click();
            console.log($(btn).attr('name'))
           $(`#${$(btn).attr('name')}`).click();
        };
        function editprofilePicture(input) {
            readURL(input);
            // $('#imgProfile').attr('src', `${this}`);
        };
        $('#btnDiscard').on('click', function () {
            // if ($('#btnDiscard').hasClass('d-none')) {
            $('.btnChangePicture').removeClass('changing');
            $('.btnChangePicture').attr('value', 'Change');
            $('#btnDiscard').addClass('d-none');
            $('#imgProfile').attr('src', $imgSrc);
            $('.profilePicture').val('');
            // }
        });

    $('#categories_option').on('change',function(){
        var value = $(this).val();
        $('.edit_tr').css( "display", "none" );
        $( `#${value}`).css( "display", "table-row" );
        if(value == 'null'){
            $('.edit_tr').css( "display", "table-row" );
        }

    });
    $('#master').on('click',function () {
        $( '#product_table input[type="checkbox"]' ).prop('checked', this.checked)
    })
</script>
{{--        </div>--}}
{{--    </div>--}}


@endsection
