<td>
    <a href="{{ route($nameRoute.'Edit',['id'=>$entity->id]) }}"
       role="button">
        <button class="btn btn-xs btn-warning" title="Редактировать">
            <i class="fa fa-edit"></i>
        </button>
    </a>
</td>
<td>
    <form action="{{ route($nameRoute.'Delete', ['id'=>$entity->id]) }}"
          method="post">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <button class="btn btn-xs btn-warning" title="Мягкое удаление">
            <i class="fa fa-times"></i>
        </button>
    </form>
</td>
@if ($entity->deleted_at)
    <td>
        <span class="label label-danger">Уд.</span>
    </td>
    <td><a href="{{ route($nameRoute.'Restore',['id'=>$entity->id]) }}"
           role="button">
            <button class="btn btn-xs btn-success" title="Восстановить">
                <i class="fa fa-refresh"></i>
            </button>
        </a>
    </td>
@endif
<td>
    <form action="{{ route($nameRoute.'ForceDelete', ['id'=>$entity->id]) }}"
          method="post">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <button class="btn btn-xs btn-danger" title="Полное удаление">
            <i class="fa fa-trash-o"></i>
        </button>
    </form>
</td>
</tr>