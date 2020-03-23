@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Accesos exitosos</h3>
    <hr>
    <table class="table" style="background-color:#ffffff">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-center" style="width:33.3%">Usuario</th>
            <th scope="col" class="text-center" style="width:33.3%">Fecha y hora</th>
            <th scope="col" class="text-center" style="width:33.3%">Dirección IP</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($access_control["C"] as $item)
              <tr>
                <td class="text-center" style="width:33.3%">
                  @if (!empty($item->user))
                    <strong>{{ $item->user->name }}</strong> 
                    ({{$item->user->email}})
                  @else
                      Usuario desconocido.
                  @endif
                  
                </td>
                <td class="text-center" style="width:33.3%">
                  <span  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$item->access_timestamp->diffForHumans()}}">
                    {{ $item->access_timestamp}}
                  </span>
                </td>
                <td class="text-center" style="width:33.3%">{{ $item->ip }}</td>
              </tr>
          @endforeach
          
        </tbody>
      </table>

      <h3>Accesos fallidos</h3>
    <hr>
    <table class="table" style="background-color:#ffffff">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-center" style="width:33.3%">Usuario</th>
            <th scope="col" class="text-center" style="width:33.3%">Fecha y hora</th>
            <th scope="col" class="text-center" style="width:33.3%">Dirección IP</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($access_control["I"] as $item)
              <tr>
                <td class="text-center" style="width:33.3%">
                  @if (!empty($item->user))
                    <strong>{{ $item->user->name }}</strong> 
                    ({{$item->user->email}})
                  @else
                      Usuario desconocido.
                  @endif                  
                </td>
                <td class="text-center" style="width:33.3%">
                  <span  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$item->access_timestamp->diffForHumans()}}">
                    {{ $item->access_timestamp}}
                  </span>
              </td>
                <td class="text-center" style="width:33.3%">{{ $item->ip }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection