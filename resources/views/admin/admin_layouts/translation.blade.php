@extends('admin.admin')
<?php
$titleaa = [];
$russian = '';
$english = '';
$no = 1;
?>
<style>
    iframe#Translator {
        height: 0px;
        width: 0px;
    }
    .translate_content{
        position: fixed;
        height: 45px;
        width: 45px;
        border-radius: 50%;
        z-index: 1;
        bottom: 30px;
        right: 30px;
        background-color: #8e8e8e;
        transition: 0.8s;
        background-image: url("https://i.pinimg.com/originals/ba/84/8d/ba848da92768204f75906e49aa50bec0.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .translate_content:hover {
        background-image: none;
        border-radius: 15px;
        width: max-content;
        height: 392px!important;
    }
    .translate_content:hover iframe#Translator{
        width: 335px;
        height: 390px;
    }
</style>

@section('main')

    <div class="row">
        <div class="col-md-12">
            <div class="translate_content">
                <!-- Begin Widget Translator 335x390 -->

                <script type="text/javascript">
                    var dir="en/es";
                    var loc="en";
                </script>
                <div id="TranslatorBuilder"><a href="//imtranslator.net/translation/" id="ImTranslator" target="_top" title="Translator - imtranslator.net">Translator</a><div id=ImBack></div></div>
                <script type="text/javascript" src="//translation.imtranslator.net/box/webmaster/wm-im-335x390.js"></script>
                <!-- End Widget Translator 335x390 -->
            </div>
            <hr>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Edit Product
                    </div>
                        <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th width="200px">Name</th>
                                    <th>Flag</th>
                                    <th>Folder</th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>

                            @foreach($lang as $language)
                                @if($language->name !== 'title')

                                    <tr class="edit_tr">
                                        <td>{{$language->name}}</td>
                                        <td><img width="30px" height="30px" src="{{$language->flag}}" alt=""></td>
                                        <td>{{$language->folder}}</td>
                                        <td>
                                            <form action="{{route('deletLang')}}" method="POST" enctype="multipart/form-data" id="aaa">
                                                @csrf
                                                <button type="submit" name = "folder" value = "{{$language->folder}}" class="btn btn-danger btn-sm"
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
                                        </td>
                                    </tr>
                                </form>
                                @endif
                                @endforeach
                                            <form action="{{ route('CreatLang') }}" method="POST" enctype="multipart/form-data" >
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

                                                <tr>
                                                    <td>
                                                        <select name="name" id="name">
                                                        </select>
                                                    </td>
                                                    <td >
                                                        <img id="flag_img" width="30px" height="30px" src="" alt="flag">
                                                        <input id="flag" type="hidden" name="flag"></td>
                                                    <td><p id="folder_p"></p>
                                                        <input id="folder" type="hidden" name="folder"> </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success" id="lang_save" disabled >Save</button>
                                                    </td>

                                                </tr>
                                            </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Edit Product
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamicTable">
                        <tr>
                            @foreach($lang as $language)
                            <th>{{$language->name}}</th>
                            @endforeach
                        </tr>

                            <tr>
                                @foreach($lang as $language)
                                    <?php
                                    $key = $language->name ;
                                    $value = $language->folder;
                                    $$value = storage_path('..\resources\lang\\'.$value.'.json');
                                    $$key = json_decode(file_get_contents($$value), true);
                                    ?>
                                        <td>
                                            @if(!empty($$key))
                                            @foreach($$key as $key => $value)
                                            <div class="e_translate" style="white-space: nowrap;
                                              width: 300px;
                                              overflow: hidden;
                                              text-overflow: ellipsis;
                                              " data-lang="{{$language->folder}}"  data-title='{{$key}}' contenteditable>
                                                {{$value}}
                                            </div>
                                                <hr>
                                            @endforeach
                                            @endif
                                        </td>

                                @endforeach
{{--                                <td>--}}
{{--                                    @if($russian)--}}
{{--                                    @foreach($russian as $ru => $russian)--}}
{{--                                        <div class="e_translate" class="e_translate"  data-lang="{{__('ru')}}"  data-title='{{$ru}}' contenteditable>--}}
{{--                                            @if($russian !== '')--}}
{{--                                            {{$russian}}--}}
{{--                                            @else--}}
{{--                                                {{'-empty-'}}--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                    @endforeach--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                            </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        $('.e_translate').on('click', function () {
            $(this).attr('style', 'white-space: wrap;width: 300px;overflow: hidden;text-overflow: ellipsis');
            $('.e_translate').on('focusout', function () {
                $(this).attr('style', 'white-space: nowrap;width: 300px;overflow: hidden;text-overflow: ellipsis');
                $title = $(this).attr('data-title')
                $lang = $(this).attr('data-lang')
                $translate = $(this).html()

                $.ajax({
                    type:'POST',
                    url:'{{route('JSON')}}',
                    dataType: "json",
                    data: {lang:$lang,title:$title,translation:$translate,_token:'{{csrf_token()}}'},
                    success:function(data) {

                    }
                });
            })
        })
    </script>
    <script type="text/javascript">
        var i = 0;
        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });
        var i = 0;
        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });
    </script>
    <script>
        country()
        function country() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", `https://restcountries.eu/rest/v2/all`, true);
            xhttp.send();
            xhttp.onload = function () {
                return new Promise ((resolve,reject)=>{
                    let id = JSON.parse(this.responseText)
                    if (this.status === 200) {
                        resolve(lang(id))
                    }else {
                        reject(alert(this.status))
                    }
                })
            }
        }
        function lang(id) {
            $name = '';
            $id = '';
            for(i=0 ; i < id.length; i++){
                $name +=`<option value="${id[i].name}">${id[i].name}</option>`
            }
            $('#name').on('change',function () {
                for(i=0 ; i < id.length; i++){
                    if(id[i].name == $(this).val()){
                        $id = id[i]
                    }
                }
                $('#flag_img').attr(`src`,`${$id.flag}`)
                $('#flag').attr(`value`,`${$id.flag}`)
                $('#folder_p').html(`${$id.alpha2Code}`)
                $('#folder').attr(`value`,`${$id.alpha2Code}`)
                $('#lang_save').removeAttr('disabled')
            })
            $('#name').html($name)
        }

    </script>
@endsection

