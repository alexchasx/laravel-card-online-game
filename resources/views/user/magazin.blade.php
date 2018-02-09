@extends('layouts.profile_layout')

@section('content')

    <div class="wrapper">

        @if($errors->any())
            <div class="message error">
                {{$errors->first()}}

                <button onClick="location.reload();">Закрыть</button>
            </div>
        @endif

        <div class="tabs">
            <header class="header">
                <img class="avatar" src="
                    @unless(empty($user->avatar_id))
                        {{ $user->avatar->avatar }}
                    @endunless
                        " alt="аватар">
                <div class="header-menu">
                    <a class="knopka01" href="{{ route('getProfile') }}">Профиль</a>
                    <a class="button11" href="{{--{{ route('magazinIndex') }}--}}">Баланс:
                        <span class="pick">{{ $user->balance }} &#8381;</span>
                    </a>
                </div>

                @include('layouts.sub_nick')

            </header><!-- .header-->

            <input type="radio" name="odin" checked="checked" id="vkl1"/><label class="knopka01"
                                                                                for="vkl1">Цены</label>
            <input type="radio" name="odin" id="vkl2"/><label class="knopka01"
                                                              for="vkl2">Аватарки</label>

            <div class="middle">
                <main class="right-sidebar block">
                </main><!-- .content -->

                <aside class="left-sidebar block">
                    <table>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><span class="pick">{{ $product->price }} &#8381;</span></td>
                            </tr>
                        @endforeach
                    </table>
                </aside><!-- .left-sidebar -->
            </div><!-- .middle-->

            <div class="middle block">
                @foreach($avatars as $avatar)
                    <a href="#modalPay" onClick="getElementById('modalPay').removeAttribute('style');
                        getElementById('input-avatar-pay').value = {{ $avatar->id }};">
                        <img class="avatar" src="{{ $avatar->avatar }}" alt="аватар">
                    </a>
                @endforeach
            </div><!-- .middle-->

        </div>
    </div><!-- .wrapper -->

    <div id="modalPay" style="display:none;">
        <div class="overlay"></div>
        <div class="visible">
            <div class="content">
                <p>Вы уверены, что хотите сменить аватар?</p>
                <form action="{{ route('changeAvatar') }}" method="post">
                    <input type="text" name="avatar_id" id="input-avatar-pay">
                    <br>
                    {{ csrf_field() }}
                    <button class="confirm" type="submit">Да</button>
                </form>
            </div>
            <button class="close" type="button" onClick="getElementById('modalPay').style.display='none';">Нет</button>
        </div>
    </div>

@endsection