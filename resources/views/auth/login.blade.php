@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="logo">{{config('app.name')}}</h1>
            <br>
            <br>
            <br>

            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Авторизация
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-mail</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required
                                           @if ($errors->has('name')) autofocus @endif>

                                    @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">Пароль</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control"
                                           name="password" required
                                           @if ($errors->has('name')) autofocus @endif>

                                    @if ($errors->has('password'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                    <button type="submit" style="width: 100%"
                                            class="btn btn-primary">
                                        Войти
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-link password-restore"
                                       href="{{ route('password.request') }}">
                                        Восстановить пароль?
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    <a class="btn btn-success text-center" style="width: 100%"
                                       href="{{ url('register') }}">
                                        Создать аккаунт
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <br>

            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-warning text-center" style="width: 100%"
                   href="{{ url('battle.start') }}">
                    Пробный бой
                </a>
            </div>
        </div>
    </div>
@endsection
