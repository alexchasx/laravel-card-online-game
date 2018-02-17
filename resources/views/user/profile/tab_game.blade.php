<div class="middle">

    <div class="left-sidebar sidebar">
        <h3>Игры с ботами:</h3>
        <hr>
        <a class="button width200px" href="#">
            Обычный бой
        </a>
        <a class="button width200px no no1" href="#">
            Абордаж крейсера
        </a>
        <a class="button width200px no no1" href="#">
            На выживание
        </a>
        <a class="button width200px no no1" href="#">
            Осада крепости
        </a>
        <a class="button width200px no no1" href="#">
            Оборона станции
        </a>
        <a class="button width200px no no1" href="#">
            Эскорт транспорта
        </a>
    </div>

    <div class="left-sidebar sidebar">
        <h3>Создать вызов:</h3>
        <hr>

        @if($errors->any())
            <div class="message form-error">
                {{$errors->first()}}
            </div>
        @endif

        <form action="{{ route('provocation') }}" method="post">
            <table>
                <tr>
                    <td>
                        <br>
                        <input type="checkbox" class="checkbox" name="seen_rank"
                               id="checkbox" value="0"/>
                        <label for="checkbox">Скрыть мой ранг</label>
                    </td>
                </tr>
            </table>

            <label class="tooltip">
                <button type="submit" class="button">
                    Создать вызов
                </button>
                {{--<span class="custom info hidden">--}}
                {{--Создать запись в списке "Вызовы (реальных игроков)" (справа).--}}
                {{--Эти записи видны всем игрокам.--}}
                {{--</span>--}}
            </label>
            {{ csrf_field() }}
        </form>
    </div>

    <div class="left-sidebar sidebar">
        <h3>Вызовы (реальных игроков):</h3>
        <hr>
        <table>
            <tbody>
            @if ($ownerProvocation)
                <tr>
                    <td>
                                    <span class="pick">
                                        {{ $ownerProvocation->user->name }}
                                    </span>
                    </td>
                    <td>
                        @if ($ownerProvocation->seen_rank)
                            <span class="{{ $ownerProvocation->rank->class_css }}">
                                            {{ $ownerProvocation->rank->name }}
                                        </span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('provocationDelete', ['id' => $ownerProvocation->id]) }}"
                              method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit"
                                    class="button large round provocation close-prov">
                                Отмена
                            </button>
                        </form>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <table>
            <tbody id="body-provocation">
            {{--@foreach($provocations as $provocation)--}}
            {{--@if ($provocation->user && $provocation->user->id !== Auth::id())--}}
            {{--<tr>--}}
            {{--<td>--}}
            {{--<span class="pick">--}}
            {{--{{ $provocation->user->name }}--}}
            {{--</span>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--@if ($provocation->seen_rank)--}}
            {{--<span class="{{ $provocation->rank->class_css }}">--}}
            {{--{{ $provocation->rank->name }}--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<button href="#" id="miganie"--}}
            {{--class="button large round provocation">--}}
            {{--Принять--}}
            {{--</button>--}}
            {{--</td>--}}
            {{--</tr>--}}
            {{--@endif--}}
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</div>
