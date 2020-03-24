@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table" style="background-color:#ffffff">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="text-center " style="width:25%">Nombre</th>
                <th scope="col" class="text-center" style="width:25%">Email</th>
                <th scope="col" class="text-center" style="width:25%">Fecha de creación</th>
                <th scope="col" class="text-center" style="width:25%">Operaciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <td data-label="Nombre" class="text-center" style="width:25%">
                    {{ $user->name }}
                </td>
                <td data-label="Email" class="text-center" style="width:25%">
                    {{ $user->email }}
                </td>
                <td data-label="Fecha de creación" class="text-center" style="width:25%">
                   @if ($user->updated_at == $user->created_at)
                     {{ $user->created_at }}
                   @else
                     {{ $user->updated_at }}  <i class="fa fa-info-circle" aria-hidden="true" href="#" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Fecha de edición"></i>
                   @endif
                </td>
                <td data-label="Operaciones" class="text-center" style="width:25%">
                    <form action="{{ route("delete", ['user'=>$user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                
                        <button href="s" type="submit" class="btn btn-outline-danger" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Eliminar" {{ $user->id==Auth::user()->id ? 'disabled' : ''}}>
                            <i class="fa fa-trash" aria-hidden="true" ></i>
                        </button>
                        <a href="{{url("/edit/$user->id")}}" type="button" class="btn btn-outline-secondary" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Modificar">
                            <i class="fa fa-pencil"  aria-hidden="true" ></i>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection