<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->
        <br>
        <li><a class="link"
               @if ('cardIndex' == Route::current()->getName())
               style="color: #0b16d6;"
               @endif
               href="{{route('cardIndex')}}">Карты</a></li>
        <li><a class="link"
               @if ('cardSetIndex' == Route::current()->getName())
               style="color: #0b16d6;"
               @endif
               href="{{route('cardSetIndex')}}">Наборы</a></li>
        <li><a class="link active"
               @if ('raceIndex' == Route::current()->getName())
               style="color: #0b16d6;"
               @endif
               href="{{route('raceIndex')}}">Расы</a></li>
        <li><a class="link"
               @if ('abilityIndex' == Route::current()->getName())
               style="color: #0b16d6;"
               @endif
               href="{{route('abilityIndex')}}">Способности</a></li>
        <li><a class="link"
               @if ('achievement.index' == Route::current()->getName())
               style="color: #0b16d6;"
               @endif
               href="{{route('achievement.index')}}">Достижения</a></li>
    </ul>
</div>

<!-- Sidebar ends -->