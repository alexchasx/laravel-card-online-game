<div class="middle">
    <div class="right-sidebar sidebar">
        @foreach($cards as $card)
            <div class="card-container">
                {{--@if ($card->avatar)--}}
                <a href="#">
                    <div class="card-name"
                         @if ($card->cardType->name === 'Техника')
                         style="background: #000;color: #8c8c8c;"
                         @elseif ($card->cardType->name === 'Событие')
                         style="background: #2f2faf;"
                            @endif
                    >
                        {{ $card->name }}
                    </div>
                    <div class="property energy">5</div>
                    <div class="property attack">
                        <div class="text">12</div>
                    </div>
                    <div class="property armor">5</div>
                    <div class="property health">19</div>
                    <div class="tooltip" style="font-size: 16px;">
                        <img class="card" src="images/profile/100x100.jpg" alt="">
                        <span class="custom info hidden">
                                        {{ $card->name }}<br>
                                        Тип: {{ $card->cardType->name }}<br>
                            @if ($card->ability1)
                                Способность 1: {{ $card->ability1->name }}
                                ({{ $card->ability1->description }})
                            @endif
                                    </span>
                    </div>
                    @if ($card->ability1)
                        <div class="card-type">
                            {{ $card->ability1->name }}
                        </div>
                    @endif
                </a>
            </div>
        @endforeach
        {{--<table>--}}
        {{--@foreach($cards as $entity)--}}
        {{--<tr>--}}
        {{--<td>--}}
        {{--{{ $entity->name }}--}}
        {{--<br>--}}
        {{--<span class="label label-danger">{{ $entity->attack }}</span>--}}
        {{--<span class="label label-success">{{ $entity->health }}</span>--}}
        {{--<span class="label label-warning">{{ $entity->energy }}</span>--}}
        {{--<span class="label label-default">{{ $entity->armor }}</span>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--@if ($entity->ability1)--}}
        {{--{{ $entity->ability1->name }}--}}
        {{--@endif--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--@if ($entity->ability2)--}}
        {{--{{ $entity->ability2->name }}--}}
        {{--@endif--}}
        {{--</td>--}}
        {{--<td><img width="30" src="{{ $entity->avatar }}" alt=""></td>--}}
        {{--<td>--}}
        {{--@if ($entity->cardType)--}}
        {{--{{ $entity->cardType->name }}--}}
        {{--@endif--}}
        {{--</td>--}}
        {{--@endforeach--}}
        {{--</table>--}}
    </div>

    <div class="left-sidebar sidebar">
        <table>
            @foreach($cardSets as $cardSet)
                <tr>
                    <td><span class="pick">{{ $loop->iteration }}</span></td>
                    <td>{{ $cardSet->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
