<div class="sub-nick">
    <table>
        <tr>
            <td>Имя: </td>
            <td><span class="pick">{{ $user->name }}</span></td>
        </tr>
        <tr>
            <td>Звание: </td>
            <td><span class="{{ $user->rank->class_css }}">{{ $user->rank->name }}</span></td>
        </tr>
        <tr>
            <td>Рейтинг: </td>
            <td><span class="pick">{{ $user->rating }}</span></td>
        </tr>
    </table>
</div>