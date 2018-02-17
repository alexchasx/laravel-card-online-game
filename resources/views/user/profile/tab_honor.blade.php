<div class="middle">
    <div class="right-sidebar sidebar">
        За что даются очки рейтинга:
        <hr>
        <table>
            <tr>
                <td>За игру:</td>
                <td><span class="pick">10</span></td>
            </tr>
            <tr>
                <td>За победу:</td>
                <td><span class="pick">5</span></td>
            </tr>
            <tr>
                <td>За выполнение задания:</td>
                <td><span class="pick">10</span></td>
                <td>(недоступно)</td>
            </tr>
        </table>
        <hr>
        <span class="pick">Внимание: </span>
        <p>Что бы получить ранг выше <span class="pick">сержанта</span>,
            плюс к соответствующему рейтингу необходим <span class="pick">офицерский взнос</span>
            (если на балансе есть соответствующая сумма - она <span class="pick">будет снята автоматически</span>)
        </p>
        <hr>
        <span class="pick">Достижения: </span>
        <br>
        <br>
        <div><span class="pick">Абордажник</span> - за 100 игра "Абордаж крейсера"</div>

    </div>

    <div class="left-sidebar sidebar">
        <table>
            <thead>
            <tr>
                <td>Ранг</td>
                <td>Рейтинг</td>
                <td>Взнос</td>
            </tr>
            </thead>

            <tbody>
            @foreach($ranks as $rank)
                <tr>
                    <td><span class="{{ $rank->class_css }}">{{ $rank->name }}</span>
                    </td>
                    <td><span class="pick">{{ $rank->rating }}</span></td>
                    <td>
                        @if($rank->price)
                            <span class="pick">+{{ $rank->price }} &#8381;</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
