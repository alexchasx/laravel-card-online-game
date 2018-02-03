<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #2e3436;">
            <!-- Form starts.  -->
            <form action="{{ route('userUpdate') }}" method="post" role="form"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" style="color: #2e3436;">Редактирование профиля</h4>
                </div>
                <div class="modal-body">
                    <label class="col-lg-2 control-label">Имя</label>
                    <input name="name" type="text" class="form-control"
                           id="name" value="{{ old('name') }}" required>
                    <br>

                    {{--<label class="col-lg-2 control-label">Видна?</label>--}}
                    {{--<select class="form-control" name="seen" id="seen">--}}
                        {{--<option selected value="1">Да</option>--}}
                        {{--<option value="0">Нет</option>--}}
                    {{--</select>--}}

                    <label class="col-lg-2 control-label">Аватар</label>
                    <input name="avatar" type="file" class="form-control" placeholder="Аватар"
                           id="armor"
                           value="{{ old('avatar') }}"></td>
                    <br>

                    <label class="col-lg-2 control-label">E-mail</label>
                    <input name="email" type="text" class="form-control"
                           id="email"
                           value="{{ old('email') }}">

                    <label class="col-lg-2 control-label">Пароль</label>
                    <input name="password" type="text" class="form-control"
                           id="password"
                           value="{{ old('password') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            aria-hidden="true">Отмена
                    </button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
