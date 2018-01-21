@extends('layouts.app')

@section('content')

    <!--/start-inner-content-->
    <!-- blog -->
    <div class="blog">

        <!-- container -->
        <div class="container">
            Главная!
            <a href="{{ route('replaceCard') }}">
                <button class="btn2" style="top: 200px;z-index: 900;">
                    Бой
                </button>
            </a>
        </div>
        <!-- //container -->
    </div>
    <!-- //blog -->
    <!--//end-inner-content-->

@endsection


