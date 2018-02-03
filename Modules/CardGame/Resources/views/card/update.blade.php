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

                    <label class="col-lg-2 control-label">ID</label>
                    <input name="id" type="text" class="form-control"
                           id="name" value="{{ $entity->id }}" required>
                    <br>

                    <label class="col-lg-2 control-label">Наименование</label>
                    <input name="name" type="text" class="form-control"
                           id="name" value="{{ $entity->name }}" required>
                    <br>

                    <label class="col-lg-2 control-label">Видна?</label>
                    <select class="form-control" name="seen" id="seen">
                        <option
                                @if($entity->seen)
                                selected
                                @endif
                                value="1">Да</option>
                        <option
                                @if(!$entity->seen)
                                selected
                                @endif
                                value="0">Нет</option>
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Энергия</label>
                    <input name="energy" type="text" class="form-control"
                           id="energy"
                           value="{{ $entity->energy }}">
                    <br>

                    <label class="col-lg-2 control-label">Атака</label>
                    <input name="attack" type="text" class="form-control"
                           id="attack"
                           value="{{ $entity->attack }}">
                    <br>

                    <label class="col-lg-2 control-label">Прочность</label>
                    <input name="health" type="text" class="form-control"
                           id="health" value="{{ $entity->health }}">
                    <br>

                    <label class="col-lg-2 control-label">Броня</label>
                    <input name="armor" type="text" class="form-control"
                           id="armor"
                           value="{{ $entity->armor }}">
                    <br>

                    <label class="col-lg-2 control-label">Нация</label>
                    <select class="form-control" name="race_id" size="5"
                            class="form-control" id="race_id">
                        @foreach ($races as $race)
                            <option
                                    @if($entity->race_id === $race->id)
                                            selected
                                    @endif
                                    value="{{$race->id}}">{{$race->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Способность1</label>
                    <select class="form-control" name="ability1_id" size="7"
                            class="form-control"
                            id="ability1_id">
                        @foreach ($abilities as $ability)
                            <option
                                    @if($entity->ability1_id === $ability->id)
                                    selected
                                    @endif
                                    value="{{$ability->id}}">{{$ability->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Способность2</label>
                    <select class="form-control" name="ability2_id" size="7"
                            class="form-control"
                            id="ability2_id">
                        @foreach ($abilities as $ability)
                            <option
                                    @if($entity->ability2_id === $ability->id)
                                    selected
                                    @endif
                                    value="{{$ability->id}}">{{$ability->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Аватар</label>
                    <img width="114" src="{{ $entity->avatar }}" alt="">
                    <input name="avatar" type="file" class="form-control" placeholder="Аватар"
                           id="armor"
                           value="{{ $entity->avatar }}"></td>
                    <br>

                    <label class="col-lg-2 control-label">Набор</label>
                    <select class="form-control" name="card_sets_id" size="5"
                            class="form-control"
                            id="card_sets_id">
                        @foreach ($cardSets as $cardSet)
                            <option
                                    @if($entity->card_sets_id === $cardSet->id)
                                    selected
                                    @endif
                                    value="{{$cardSet->id}}">{{$cardSet->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Тип</label>
                    <select class="form-control" name="card_type_id" size="5"
                            class="form-control"
                            id="card_type_id">
                        @foreach ($types as $type)
                            <option
                                    @if($entity->card_type_id === $type->id)
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
                                    @if($entity->rarity_id === $rarity->id)
                                    selected
                                    @endif
                                    value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                        @endforeach
                    </select>

                    <label class="col-lg-2 control-label">Цена</label>
                    <input name="price" type="text" class="form-control"
                           id="price"
                           value="{{ $entity->price }}">
                </div>
                <div class="modal-footer">
                    <a href="{{ route('cardIndex') }}">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                aria-hidden="true">Отмена
                        </button>
                    </a>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
