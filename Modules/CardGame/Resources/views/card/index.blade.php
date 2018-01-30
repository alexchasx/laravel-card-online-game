@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-content">

                <div class="widget">
                    <div class="widget-content">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr>
                                <form action="{{ route('cardStore') }}" method="post" role="form"
                                      enctype="multipart/form-data">
                                    <td></td>
                                    <td><input name="name" type="text" class="form-control"
                                               id="name" value="{{ old('name') }}" required></td>
                                    <td>
                                        <select class="form-control" name="seen" id="seen">
                                            <option selected value="1">Да</option>
                                            <option value="0">Нет</option>
                                        </select>
                                    </td>
                                    <td><input name="energy" type="text" class="form-control"
                                               id="energy"
                                               value="{{ old('energy') }}"></td>
                                    <td><input name="attack" type="text" class="form-control"
                                               id="attack"
                                               value="{{ old('attack') }}"></td>
                                    <td><input name="health" type="text" class="form-control"
                                               id="health" value="{{ old('health') }}"></td>
                                    <td><input name="armor" type="text" class="form-control"
                                               id="armor"
                                               value="{{ old('armor') }}"></td>
                                    <td>
                                        <select class="form-control" name="race_id" size="3"
                                                class="form-control" id="race_id">
                                            @foreach ($races as $race)
                                                <option value="{{$race->id}}">{{$race->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="ability1_id" size="3"
                                                class="form-control"
                                                id="ability1_id">
                                            @foreach ($abilities as $ability)
                                                <option value="{{$ability->id}}">{{$ability->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="ability2_id" size="3"
                                                class="form-control"
                                                id="ability2_id">
                                            @foreach ($abilities as $ability)
                                                <option value="{{$ability->id}}">{{$ability->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input name="avatar" type="file" class="form-control"
                                               id="armor"
                                               value="{{ old('avatar') }}"></td>
                                    <td>
                                        <select class="form-control" name="card_sets_id" size="3"
                                                class="form-control"
                                                id="card_sets_id">
                                            @foreach ($cardSets as $cardSet)
                                                <option value="{{$cardSet->id}}">{{$cardSet->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="card_type_id" size="3"
                                                class="form-control"
                                                id="card_type_id">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="rarity_id" size="3"
                                                class="form-control"
                                                id="rarity_id">
                                            @foreach ($rarities as $rarity)
                                                <option value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input name="price" type="text" class="form-control"
                                               id="price"
                                               value="{{ old('price') }}"></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Создать
                                        </button>
                                    </td>
                                    <td></td>
                                    {{ csrf_field() }}
                                </form>
                            </tr>
                            </tbody>
                            </tbody>
                        </table>

                        <div class="widget-foot">

                            <div class="clearfix"></div>

                        </div>

                        <br>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr style="background-color: #9696e4;color: #000;">
                                <td>ID</td>
                                <td style="min-width: 100px;">Наименование</td>
                                <td>Вид.</td>
                                <td>Нация</td>
                                <td>Свойство 1</td>
                                <td>Свойство 2</td>
                                <td style="width: 100px;">Аватар</td>
                                <td>Набор</td>
                                <td>Тип</td>
                                <td>Редкость</td>
                                <td>Цена</td>
                                <td></td>
                                <td>Уд.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cards as $card)

                                <tr @if ($card->deleted_at)
                                    style="background-color: #e4b9b9;"
                                    @elseif (!$card->seen)
                                    style="background-color: #9B859D;"
                                        @endif>
                                    <td>{{ $card->id }}</td>
                                    <td>
                                        {{ $card->name }}
                                        <br>
                                        <span class="label label-danger">{{ $card->attack }}</span>
                                        <span class="label label-success">{{ $card->health }}</span>
                                        <span class="label label-warning">{{ $card->energy }}</span>
                                        <span class="label label-default">{{ $card->armor }}</span>
                                    </td>
                                    <td>
                                        @if (!$card->seen)
                                            Нет
                                        @else
                                            Да
                                        @endif
                                    </td>
                                    <td>
                                        @if ($card->race)
                                            {{ $card->race->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($card->ability1)
                                            {{ $card->ability1->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($card->ability2)
                                            {{ $card->ability2->name }}
                                        @endif
                                    </td>
                                    <td><img width="50" src="{{ $card->avatar }}" alt=""></td>
                                    <td>
                                        @if ($card->cardSet)
                                            {{ $card->cardSet->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($card->cardType)
                                            {{ $card->cardType->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($card->rarity)
                                            {{ $card->rarity->name }}
                                        @endif
                                    </td>
                                    <td>{{ $card->price }}</td>
                                    <td>
                                        <form action="{{ route('cardDelete', ['id'=>$card->id]) }}"
                                              method="post">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($card->deleted_at)
                                            <span class="label label-danger">Уд.</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('cardRestore',['comment'=>$card->id]) }}"
                                           role="button">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('cardForceDelete', ['id'=>$card->id]) }}"
                                              method="post">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="widget-foot">

                            <div class="clearfix"></div>

                        </div>

                    </div>
                </div>
            </div>

@endsection