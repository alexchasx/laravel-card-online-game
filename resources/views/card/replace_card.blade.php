@extends('layouts.app')

@section('content')

    <!--/start-inner-content-->
    <!-- blog -->
    <div class="blog">
        <!-- container -->
        <div class="wrapper">
            <form action="{{ route('replaceCardSubmit') }}" method="post">
                <div class="box text-center">
                    <label for="card-begin1">
                        <div class="card-begin" id="card-begin1">
                            <input id="card-begin1" type="checkbox" name="card-begin1">
                        </div>
                    </label>
                    <div class="card-begin" id="card-begin2">
                        <input type="checkbox" name="card-begin2">
                    </div>
                    <div class="card-begin" id="card-begin3">
                        <input type="checkbox" name="card-begin3">
                    </div>
                    <div class="card-begin" id="card-begin4">
                        <input type="checkbox" name="card-begin4">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg card-begin-submit">Принять</button>
                {{ csrf_field() }}
            </form>

            <div class="clearfix"></div>

        </div>
        <!-- //container -->
    </div>
    <!-- //blog -->
    <!--//end-inner-content-->

@endsection


