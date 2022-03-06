@section('telegram_login')
    <hr>
    <div class="row">
        <div class="btn-group offset-md-4 ">
            <div class="col-md-2 col-sm-4 ">
                <a href="{{url('/redirect')}}" class="btn" style="border: 1px" >
                    <i class="fa fa-facebook-square" style="font-size:48px;color:dodgerblue"></i>
                </a>

            </div>
            <div class="col-md-2 col-sm-4 ">
                <a href="{{ url('auth/google') }}" class="btn" style="border: 1px">
                    <i class="fa fa-google-plus-square" style="font-size:48px;color:red"></i>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 p-2">
                <script async src="https://telegram.org/js/telegram-widget.js?11" data-telegram-login="PracticaTelegramLogin_bot" data-size="large" data-auth-url="https://practica.com/login/auth/telegram/callback" data-request-access="write"></script>
            </div>
        </div>
    </div>
