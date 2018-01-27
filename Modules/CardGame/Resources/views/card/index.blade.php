@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <div class="col-md-12">
        <div class="widget">

            <!--<div class="widget-head">-->
            <!--<div class="pull-left">Tables</div>-->
            <!--<div class="widget-icons pull-right">-->
            <!--<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> -->
            <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
            <!--</div>  -->
            <!--<div class="clearfix"></div>-->
            <!--</div>-->

            <div class="widget-content">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td style="min-width: 100px;">Наименование</td>
                        <td>Видна?</td>
                        <td style="min-width: 50px;">Стоим.</td>
                        <td style="min-width: 50px;">Атака</td>
                        <td style="min-width: 50px;">ХП</td>
                        <td style="min-width: 50px;">Броня</td>
                        <td style="min-width: 120px;">Раса</td>
                        <td style="min-width: 120px;">Свойство 1</td>
                        <td style="min-width: 120px;">Свойство 2</td>
                        <td style="min-width: 140px;">Аватар</td>
                        <td style="min-width: 120px;">Набор</td>
                        <td style="min-width: 125px;">Тип</td>
                        <td style="min-width: 125px;">Редкость</td>
                        <td>Платная?</td>
                        <td></td>
                        <td>Удалено</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <form action="{{ route('cardStore') }}" method="post" role="form"
                              enctype="multipart/form-data">
                            <td></td>
                            <td><input name="card_name" type="text" class="form-control"
                                       id="card_name" value="{{ old('card_name') }}" required></td>
                            <td>
                                <select class="form-control" name="hidden" id="hidden">
                                    <option selected value="0">Да</option>
                                    <option value="1">Нет</option>
                                </select>
                            </td>
                            <td><input name="energy" type="text" class="form-control" id="energy"
                                       value="{{ old('energy') }}"></td>
                            <td><input name="attack" type="text" class="form-control" id="attack"
                                       value="{{ old('attack') }}"></td>
                            <td><input name="health_points" type="text" class="form-control"
                                       id="health_points" value="{{ old('health_points') }}"></td>
                            <td><input name="armor" type="text" class="form-control" id="armor"
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
                            <td><input name="avatar" type="file" class="form-control" id="avatar"
                                       value="{{ old('avatar') }}"></td>
                            <td>
                                <select class="form-control" name="card_sets_id" size="3"
                                        class="form-control"
                                        id="card_sets_id">
                                    @foreach ($cardSets as $cardSet)
                                        <option value="{{$cardSet->id}}">{{$cardSet->set_name}}</option>
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
                            <td>
                                <select class="form-control" name="pay" id="pay">
                                    <option value="1">Да</option>
                                    <option selected value="0">Нет</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </td>
                            <td></td>
                            {{ csrf_field() }}
                        </form>
                    </tr>

                    @foreach($cards as $card)

                        <tr @if ($card->deleted_at)
                            style="background-color: #e4b9b9;"
                            @elseif ($card->hidden)
                            style="background-color: #9B859D;"
                                @endif>
                            <td>{{ $card->id }}</td>
                            <td>{{ $card->card_name }}</td>
                            <td>
                                @if ($card->hidden)
                                    Нет
                                @else
                                    Да
                                @endif
                            </td>
                            <td>{{ $card->energy }}</td>
                            <td>{{ $card->attack }}</td>
                            <td>{{ $card->health_points }}</td>
                            <td>{{ $card->armor }}</td>
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
                            <td>{{ $card->avatar }}</td>
                            <td>
                                @if ($card->cardSet)
                                    {{ $card->cardSet->set_name }}
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
                            <td>
                                @if ($card->pay)
                                    Да
                                @else
                                    Нет
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('cardDelete', ['id'=>$card->id]) }}"
                                      method="post">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                            <td>{{ $card->deleted_at }}</td>
                            <td><a class="btn btn-success"
                                   href="{{ route('cardRestore',['comment'=>$card->id]) }}"
                                   role="button">Восстановить</a>
                            </td>
                            <td>
                                <form action="{{ route('cardForceDelete', ['id'=>$card->id]) }}"
                                      method="post">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger">Полное удаление
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