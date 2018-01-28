@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('logout') }}">Выйти</a>

            <br>

            <table class="table table-striped table-bordered table-hover">
                <tbody>

                <tr>{{ $user->name }}</tr>
                <br>
                <tr>{{ $user->email }}</tr>

                </tbody>
            </table>


        </div>
    </div>
@endsection