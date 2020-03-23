@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>
                Bienvenido
                <strong>
                    {{ Auth::user()->name }}
                </strong>
                <hr>
            </h3>
            <ul>
                <li>
                    Último incio de sesión correcto hace <strong data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$success->access_timestamp}}">{{$success->access_timestamp->diffForHumans()}}</strong>
                </li>
                <li>
                    Último incio de sesión fallido hace <strong  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$failed->access_timestamp}}">{{$failed->access_timestamp->diffForHumans()}}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
