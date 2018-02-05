@extends('cardgame::layouts.admin_layout')

@section('inner_content')
<div class="widget-content">
    <div class="padd">
        <div class="modal-content" style="background-color: #2e3436;">
            <!-- Form starts.  -->
            <form action="{{ route('avatarUpdate', ['id'=>$entity->id]) }}" method="post" role="form"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" style="color: #2e3436;">Создание карты</h4>
                </div>
                <div class="modal-body">
                    {{ method_field('PUT') }}

                    <label class="col-lg-2 control-label">ID</label>
                    <input name="id" type="text" class="form-control" placeholder="ID"
                           id="name" value="{{ $entity->id }}" required>
                    <br>

                    <label class="col-lg-2 control-label">Путь</label>
                    <input name="avatar" type="file" class="form-control" id="avatar"
                               value="{{ $entity->avatar }}">
                    <br>

                    <img width="114" src="{{ $entity->avatar }}" alt="">
                    <br>

                    <label class="col-lg-2 control-label">Цена</label>
                    <input name="price" type="text" class="form-control" id="price"
                               value="{{ $entity->price }}">
                    <br>

                    <label class="col-lg-2 control-label">ID пользователя</label>
                    <input name="user_id" type="text" class="form-control" id="user_id"
                               value="{{ $entity->user_id }}">
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

                </div>
                <div class="modal-footer">
                    <a href="{{ route('avatarIndex') }}">
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
