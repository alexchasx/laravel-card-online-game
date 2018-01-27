@extends('cardgame::layouts.master')

@section('content')

<h1>CardGame</h1>
<form id="login" class="login">
    <h2>Авторизация</h2>
    <label for="user" class="icon-user">Логин:</label>
    <input class="user" id="user" />
    <label for="password" class="icon-lock">Пароль:</label>
    <input type="password" class="password" id="password" />
    <label for="remember"><input type="checkbox" id="remember" /><span class="remember"/> Запомнить меня</label>
    <input type="submit" value="Войти" />
    <div class="extra">
        <a href="#" class="forgetPassword">Забыл пароль</a><a href="#" class="facebook icon-facebook">Facebook</a><a href="#" class="googlePlus icon-google-plus-sign">Google+</a>
    </div>
</form>
{{--<div class="form-login">--}}

    {{--<form action="{{ route('login') }}" method="post" role="form">--}}
        {{--<label for="email">Адрес email:</label>--}}
        {{--@if ($errors->has('email'))--}}
            {{--<div class="help-block">--}}
                {{--<strong>{{ $errors->first('email') }}</strong>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<input name="email" type="text" class="" id="email" value="{{ old('email') }}" required>--}}
        {{--<br>--}}

        {{--<label for="password">Пароль:</label>--}}
        {{--@if ($errors->has('password'))--}}
            {{--<div class="help-block">--}}
                {{--<strong>{{ $errors->first('password') }}</strong>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<input name="password" type="text" class="" id="password" value="{{ old('password') }}" required>--}}

        {{--<div class="checkbox">--}}
            {{--<label>--}}
                {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомните меня--}}
            {{--</label>--}}
        {{--</div>--}}

        {{--<button type="submit" class="btn btn-primary">Войти</button>--}}

        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
            {{--Восстановить пароль?--}}
        {{--</a>--}}
    {{--</form>--}}

    {{--<a class="btn btn-link" href="{{ route('register') }}">--}}
        {{--Создать аккаунт--}}
    {{--</a>--}}

</div>

@stop
