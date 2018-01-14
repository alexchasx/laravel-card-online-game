@extends('admin.admin_layout')

@section('inner_content')

            <table class="admin-panel">
                <thead>
                <tr>
                    <td>ID</td>
                    <td style="min-width: 150px;">Аватар</td>
                    <td style="min-width: 220px;">Наименование</td>
                    <td>Видна?</td>
                    <td style="min-width: 125px;">Тип</td>
                    <td>Пользователь</td>
                    <td style="min-width: 150px;">Раса</td>
                    <td>Рубашка</td>
                    <td>Фон</td>
                    <td>Рамка</td>
                    <td>Платный?</td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <form action="{{ route('cardSetStore') }}" method="post" role="form">
                        <td></td>
                        <td><input name="avatar" type="file" class="form-control" id="avatar" value="{{ old('avatar') }}"></td>
                        <td><input name="set_name" type="text" class="form-control" id="set_name" value="{{ old('set_name') }}" required></td>
                        <td>
                            <select name="hidden" id="hidden">
                                <option selected value="0">Да</option>
                                <option value="1">Нет</option>
                            </select>
                        </td>
                        <td>
                            <select name="type" size="3" class="form-control" id="type"
                                    required>
                                @foreach ($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input name="user_id" type="number" class="form-control" id="user_id" value="{{ old('user_id') }}"></td>
                        <td>
                            <select name="race_id" size="3" class="form-control" id="race_id">
                                @foreach ($races as $race)
                                    <option value="{{$race->id}}">{{$race->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input name="shirt" type="file" class="form-control" id="shirt" value="{{ old('shirt') }}"></td>
                        <td><input name="background" type="file" class="form-control" id="background" value="{{ old('background') }}"></td>
                        <td><input name="border" type="file" class="form-control" id="border" value="{{ old('border') }}"></td>
                        <td>
                            <select name="pay" id="pay">
                                <option value="1">Да</option>
                                <option selected value="0">Нет</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </td>
                        <td>{{ csrf_field() }}</td>
                    </form>
                </tr>

                @foreach($cardSets as $cardSet)

                    <tr @if ($cardSet->deleted_at)
                        style="background-color: #e4b9b9;"
                        @elseif ($cardSet->hidden)
                        style="background-color: #9B859D;"
                            @endif>
                        <form action="{{ route('cardSetUpdate') }}" method="post" role="form">
                            <td></td>
                            <td><input name="avatar" type="file" class="form-control" id="avatar" value="{{$cardSet->avatar}}"></td>
                            <td><input name="set_name" type="text" class="form-control" id="set_name" value="{{$cardSet->set_name}}" required></td>
                            <td>
                                <select name="hidden" id="hidden">
                                    <option
                                        @if ($cardSet->hidden)
                                            selected value="1">Нет
                                        @else
                                            selected value="0">Да
                                        @endif
                                    </option>
                                </select>
                            </td>
                            <td>
                                <select name="type" size="3" class="form-control" id="type"
                                        required>
                                    @foreach ($types as $type)
                                        <option
                                            @if ($cardSet->type === $type)
                                                selected
                                            @endif
                                            value="{{$type}}">{{$type}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="user_id" type="number" class="form-control" id="user_id" value="{{$cardSet->user_id}}"></td>
                            <td>
                                <select name="race_id" size="3" class="form-control" id="race_id">
                                    @foreach ($races as $race)
                                        <option
                                                @if ($cardSet->race_id === $race->id)
                                                    selected
                                                @endif
                                                value="{{$race->id}}">{{$race->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="shirt" type="file" class="form-control" id="shirt" value="{{ $cardSet->shirt }}"></td>
                            <td><input name="background" type="file" class="form-control" id="background" value="{{ $cardSet->background }}"></td>
                            <td><input name="border" type="file" class="form-control" id="border" value="{{ $cardSet->border }}"></td>
                            <td>
                                <select name="pay" id="pay">
                                    <option value="1">Да</option>
                                    <option selected value="0">Нет</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </td>
                            <td>{{ csrf_field() }}</td>
                        </form>
                        <td>
                            <form action="{{ route('cardSetDelete', ['id'=>$cardSet->id]) }}"
                                  method="post">
                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                        <td>{{ $cardSet->deleted_at }}</td>
                        <td><a class="btn btn-success"
                               href="{{ route('cardSetRestore',['card_set'=>$cardSet->id]) }}"
                               role="button">Восстановить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

@endsection