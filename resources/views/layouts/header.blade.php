<?php
use App\TranslationLang;
$lang = TranslationLang::all();
?>
<!-- Main Navigation -->
@section('nav-bar')
    <header  style="
    border-radius: 0px 0px 45px 45px;
    border: 1px solid #314b63;
    background-image: url('https://i.pinimg.com/736x/3a/43/db/3a43db2fc05c554b4e970331cc562300.jpg');
    background-size: contain;
    background-position: center;
    margin-bottom: 10px;
">
    <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar">
                <!-- Brand -->
                <!-- Links -->
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse" id="basicExampleNav">
                            <div class="row">
                                <!-- Right -->
                                <div class="col-lg-4 offset-7">
                                    <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="#!" class="nav-link navbar-link-2 waves-effect">
                                            <span class="badge badge-pill red">1</span>
                                            <i class="fas fa-shopping-cart pl-0"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="true">
                                            <i class="united kingdom flag m-0"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#!">{{__('Action')}}</a>
                                            <a class="dropdown-item" href="#!">{{__('Another action')}}</a>
                                            <a class="dropdown-item" href="#!">{{__('Something else here')}}</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Category')}}" class="nav-link waves-effect">
                                            {{__('Shop')}}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#!" class="nav-link waves-effect">
                                            {{__('Contact')}}
                                        </a>
                                    </li>

                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item" style=" margin-right: 10px;">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}" >{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item ">
                                            @if(Auth::user()->name !== 'Admin')
                                            <a id="navbar" style=" margin-right: 10px;" class="nav-link" href="{{route('home')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            @else
                                            <a id="navbar" style=" margin-right: 10px;" class="nav-link" href="{{route('admin')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            @endif
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('logout') }}" style="font-size: 10px"
                                               onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest
{{--                                        <li>--}}
{{--                                            @foreach (__('language.lang') as $language)--}}
{{--                                                @foreach($language as $langeuag => $lang)--}}
{{--                                                        <a href="{{route('locale',"$lang")}}">{{$langeuag}}</a>--}}
{{--                                                @endforeach--}}
{{--                                            @endforeach--}}
{{--                                        </li>--}}
                                        <li class="dropdown nav-item" aria-labelledby="dropdownMenuButton" id="lang" data-width="fit">
                                            <a class="nav-link dropdown-toggle waves-effect"  style="cursor: pointer" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="true">
                                                language
                                                <i class="united kingdom flag m-0"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    @foreach ($lang as $language)
                                                        @if($language->name !== 'title')
                                                            <a class="dropdown-item" href="{{route('locale',$language->folder)}}" >{{$language->name}}<span class="flag-icon flag-icon-mx"></span></a>
                                                        @endif
                                                    @endforeach
                                            </div>
                                            <div id="google_translate_element"></div>
                                            <script>
                                                function googleTranslateElementInit() {
                                                    new google.translate.TranslateElement({
                                                        pageLanguage: 'en'
                                                    }, 'google_translate_element');
                                                }
                                            </script>
                                            <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

        </nav>
        <!-- Navbar -->
        <!-- Main Navigation -->
</header>

