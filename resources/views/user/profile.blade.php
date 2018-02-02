@extends('layouts.profile_layout')

@section('inner_content')
    <div class="container">
        <div class="row">
            @if(isAdmin())
                <a href="{{ route('cardIndex') }}">Админка</a>
            @endif

            <br>

            <table class="table table-striped table-bordered table-hover">
                <tbody>

                <tr>{{ $user->name }}</tr>
                <br>
                <tr>{{ $user->email }}</tr>
                <br>
                <tr>{{ $user->email }}</tr>

                </tbody>
            </table>


        </div>
    </div>
@endsection