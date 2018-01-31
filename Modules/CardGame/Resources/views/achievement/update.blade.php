@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <div class="widget-content">
        <div class="padd">
            <div class="modal-content" style="background-color: #2e3436;">
                <!-- Form starts.  -->
                <form action="{{ route('cardUpdate') }}" method="post" role="form"
                      enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h4 class="modal-title" style="color: #2e3436;">Создание карты</h4>
                    </div>
                    <div class="modal-body">

                        <input name="id" type="text" class="form-control" placeholder="ID"
                               id="name" value="{{ $card->id }}" required>
                        <br>

                        <input name="name" type="text" class="form-control" placeholder="Наименование"
                               id="name" value="{{ $card->name }}" required>
                        <br>

                        <label class="col-lg-2 control-label">Видна?</label>
                        <select class="form-control" name="seen" id="seen">
                            <option
                                    @if($card->seen)
                                    selected
                                    @endif
                                    value="1">Да</option>
                            <option
                                    @if(!$card->seen)
                                    selected
                                    @endif
                                    value="0">Нет</option>
                        </select>

                        <label class="col-lg-2 control-label"></label>
                        <input name="energy" type="text" class="form-control" placeholder="Энергия"
                               id="energy"
                               value="{{ $card->energy }}">

                        <label class="col-lg-2 control-label"></label>
                        <input name="attack" type="text" class="form-control" placeholder="Атака"
                               id="attack"
                               value="{{ $card->attack }}">

                        <label class="col-lg-2 control-label"></label>
                        <input name="health" type="text" class="form-control" placeholder="Прочность"
                               id="health" value="{{ $card->health }}">

                        <label class="col-lg-2 control-label"></label>
                        <input name="armor" type="text" class="form-control" placeholder="Броня"
                               id="armor"
                               value="{{ $card->armor }}">
                        <br>

                        <label class="col-lg-2 control-label">Нация</label>
                        <select class="form-control" name="race_id" size="3"
                                class="form-control" id="race_id">
                            @foreach ($races as $race)
                                <option
                                        @if($card->race_id === $race->id)
                                        selected
                                        @endif
                                        value="{{$race->id}}">{{$race->name}}</option>
                            @endforeach
                        </select>
                        <br>

                        <label class="col-lg-2 control-label">Способность1</label>
                        <select class="form-control" name="ability1_id" size="3"
                                class="form-control"
                                id="ability1_id">
                            @foreach ($abilities as $ability)
                                <option
                                        @if($card->ability1_id === $ability->id)
                                        selected
                                        @endif
                                        value="{{$ability->id}}">{{$ability->name}}</option>
                            @endforeach
                        </select>
                        <br>

                        <label class="col-lg-2 control-label">Способность2</label>
                        <select class="form-control" name="ability2_id" size="3"
                                class="form-control"
                                id="ability2_id">
                            @foreach ($abilities as $ability)
                                <option
                                        @if($card->ability2_id === $ability->id)
                                        selected
                                        @endif
                                        value="{{$ability->id}}">{{$ability->name}}</option>
                            @endforeach
                        </select>
                        <br>

                        <label class="col-lg-2 control-label">Аватар</label>
                        <input name="avatar" type="file" class="form-control" placeholder="Аватар"
                               id="armor"
                               value="{{ $card->avatar }}"></td>
                        <br>

                        <label class="col-lg-2 control-label">Набор</label>
                        <select class="form-control" name="card_sets_id" size="3"
                                class="form-control"
                                id="card_sets_id">
                            @foreach ($cardSets as $cardSet)
                                <option
                                        @if($card->card_sets_id === $cardSet->id)
                                        selected
                                        @endif
                                        value="{{$cardSet->id}}">{{$cardSet->name}}</option>
                            @endforeach
                        </select>
                        <br>

                        <label class="col-lg-2 control-label">Тип</label>
                        <select class="form-control" name="card_type_id" size="3"
                                class="form-control"
                                id="card_type_id">
                            @foreach ($types as $type)
                                <option
                                        @if($card->card_type_id === $type->id)
                                        selected
                                        @endif
                                        value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <br>

                        <label class="col-lg-2 control-label">Редкость</label>
                        <select class="form-control" name="rarity_id" size="3"
                                class="form-control"
                                id="rarity_id">
                            @foreach ($rarities as $rarity)
                                <option
                                        @if($card->rarity_id === $rarity->id)
                                        selected
                                        @endif
                                        value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                            @endforeach
                        </select>

                        <label class="col-lg-2 control-label"></label>
                        <input name="price" type="text" class="form-control" placeholder="Цена"
                               id="price"
                               value="{{ $card->price }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                aria-hidden="true">Отмена
                        </button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        {{ csrf_field() }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
