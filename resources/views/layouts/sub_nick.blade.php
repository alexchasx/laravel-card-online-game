
<div class="sub-nick">
    <table>
        <tr>
            <td>Имя: </td>
            <td><span class="pick">{{ $user->name }}</span></td>
        </tr>
        <tr>
            <td>Звание: </td>
            <td><span class="pick">{{ $user->rank->name }}</span></td>
        </tr>
        <tr>
            <td>Рейтинг: </td>
            <td><span class="pick">{{ $user->rating }}</span></td>
        </tr>
    </table>
</div>
<div class="sub-nick">
    <table>
        <tr>
            <td>Сыграно игр:</td>
            <td><span class="pick">{{ $user->count_battles }}</span></td>
        </tr>
        <tr>
            <td>Побед:</td>
            <td><span class="pick">{{ $user->count_wins }}</span></td>
        </tr>
        <tr>
            <td>Поражений:</td>
            <td><span class="pick">{{--{{ $user->countDefeat() }}--}}</span></td>
        </tr>
    </table>
</div>