@extends('admin.admin_external')

@section('content')

    <section>
        <div class="container">
            <div class="admin-panel">
                <ul>
                    @if ('adminIndex' !== Route::current()->getName())
                        <li><a class="link" href="{{route('adminIndex')}}">Все карты</a></li>
                    @endif
                    <li><a class="link" href="{{route('cardSetIndex')}}">Все наборы</a></li>
                    {{--<br/>--}}
                    {{--<li><a class="link" href="{{route('commentIndex')}}">Все комментарии</a></li>--}}
                    {{--<li><a class="link" href="{{route('categoryIndex')}}">Все категории</a></li>--}}
                    {{--<li><a class="link" href="{{route('tagIndex')}}">Все теги</a></li>--}}
                    {{--<li><a class="link" href="{{route('userIndex')}}">Все пользователи</a></li>--}}

                    <br/>
                </ul>

                @yield('inner_content')

            </div>

        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection