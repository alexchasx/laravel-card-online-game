<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #2e3436;">
            <!-- Form starts.  -->
            <form action="{{ route('cardStore') }}" method="post" role="form"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" style="color: #2e3436;">Создание карты</h4>
                </div>
                <div class="modal-body">
                    <input name="name" type="text" class="form-control" placeholder="Наименование"
                           id="name" value="{{ old('name') }}" required>
                    <br>

                    <label class="col-lg-2 control-label">Видна?</label>
                    <select class="form-control" name="seen" id="seen">
                        <option selected value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <label class="col-lg-2 control-label"></label>
                    <input name="energy" type="text" class="form-control" placeholder="Энергия"
                           id="energy"
                           value="{{ old('energy') }}">

                    <label class="col-lg-2 control-label"></label>
                    <input name="attack" type="text" class="form-control" placeholder="Атака"
                           id="attack"
                           value="{{ old('attack') }}">

                    <label class="col-lg-2 control-label"></label>
                    <input name="health" type="text" class="form-control" placeholder="Здоровье/Прочность"
                           id="health" value="{{ old('health') }}">

                    <label class="col-lg-2 control-label"></label>
                    <input name="armor" type="text" class="form-control" placeholder="Броня"
                           id="armor"
                           value="{{ old('armor') }}">
                    <br>

                    <label class="col-lg-2 control-label">Раса</label>
                    <select class="form-control" name="race_id" size="5"
                            class="form-control" id="race_id">
                        @foreach ($races as $race)
                            <option value="{{$race->id}}">{{$race->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Способность1</label>
                    <select class="form-control" name="ability1_id" size="5"
                            class="form-control"
                            id="ability1_id">
                        @foreach ($abilities as $ability)
                            <option value="{{$ability->id}}">{{$ability->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Способность2</label>
                    <select class="form-control" name="ability2_id" size="5"
                            class="form-control"
                            id="ability2_id">
                        @foreach ($abilities as $ability)
                            <option value="{{$ability->id}}">{{$ability->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Аватар</label>
                    <input name="avatar" type="file" class="form-control" placeholder="Аватар"
                           id="armor"
                           value="{{ old('avatar') }}"></td>
                    <br>

                    <label class="col-lg-2 control-label">Набор</label>
                    <select class="form-control" name="card_sets_id" size="5"
                            class="form-control"
                            id="card_sets_id">
                        @foreach ($cardSets as $cardSet)
                            <option value="{{$cardSet->id}}">{{$cardSet->name}}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Тип</label>
                    <select class="form-control" name="card_type_id" size="5"
                            class="form-control"
                            id="card_type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="col-lg-2 control-label">Редкость</label>
                    <select class="form-control" name="rarity_id" size="5"
                            class="form-control"
                            id="rarity_id">
                        @foreach ($rarities as $rarity)
                            <option value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                        @endforeach
                    </select>

                    <label class="col-lg-2 control-label"></label>
                    <input name="price" type="text" class="form-control" placeholder="Цена"
                           id="price"
                           value="{{ old('price') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            aria-hidden="true">Отмена
                    </button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
