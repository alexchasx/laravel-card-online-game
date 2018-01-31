<thead>
<tr style="background-color: #9696e4;color: #000;">
    <td>ID</td>
    <td style="min-width: 100px;">Наименование</td>
    <td>Вид.</td>
    <td>Топливо</td>
    <td>Атака</td>
    <td>ХП</td>
    <td>Броня</td>
    <td>Нация</td>
    <td>Свойство 1</td>
    <td>Свойство 2</td>
    <td style="width: 100px;">Аватар</td>
    <td>Набор</td>
    <td>Тип</td>
    <td>Редкость</td>
    <td>Цена</td>
</tr>
</thead>
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
        {{ csrf_field() }}
    </form>
</tr>
</tbody>
</tbody>
</table>

<div class="widget-foot  wblack">

    <div class="clearfix"></div>

</div>

<br>