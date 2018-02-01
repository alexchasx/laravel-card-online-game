@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <div class="widget-content">
        <div class="padd">
            <div class="modal-content" style="background-color: #2e3436;">
                <!-- Form starts.  -->
                <form action="{{ route('achievementUpdate', ['id' => $entity->id]) }}" method="post" role="form"
                      enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h4 class="modal-title" style="color: #2e3436;">Создание карты</h4>
                    </div>
                    <div class="modal-body">
                        {{ method_field('PUT') }}

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

                        <label class="col-lg-2 control-label">Описание</label>
                        <textarea class="form-control" name="description" style="color: #000;" id="description" cols="30" rows="10">
                            {{ $entity->description }}
                        </textarea>
                        <br>

                        <label class="col-lg-2 control-label">Аватар</label>
                        <input name="avatar" type="file" class="form-control"
                               id="armor"
                               value="{{ $entity->avatar }}"></td>
                        <br>

                        <label class="col-lg-2 control-label">Номер порядка сорт.</label>
                        <input name="sort" type="text" class="form-control"
                               id="price"
                               value="{{ $entity->sort }}">
                        <br>

                        <label class="col-lg-2 control-label">Рейтинг</label>
                        <input name="rating" type="text" class="form-control"
                               id="price"
                               value="{{ $entity->rating }}">
                        <br>

                        <label class="col-lg-2 control-label">Цена</label>
                        <input name="price" type="text" class="form-control"
                               id="price"
                               value="{{ $entity->price }}">
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('achievementIndex') }}">
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
