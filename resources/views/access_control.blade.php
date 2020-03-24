@extends('layouts.app')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between" >
    <span><h3>Accesos exitosos</h3></span>
    <span> <h3>Total: 
        @if ($success==null)
            0
        @else
          {{ $success->count() }}
        @endif  
      </h3></span>
  </div>
    <hr>
    <table class="table" style="background-color:#ffffff">
        <thead class="thead-light">
          <tr>
            <th  scope="col" class="text-center" style="width:33.3%">Usuario</th>
            <th  scope="col" class="text-center" style="width:33.3%">Fecha y hora</th>
            <th  scope="col" class="text-center" style="width:33.3%">Dirección IP</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($success as $item)
              <tr>
                <td data-label="Usuario" class="text-center" style="width:33.3%">
                  @if (!empty($item->user))
                    <strong>{{ $item->user->name }}</strong> 
                    ({{$item->user->email}})
                  @else
                      Usuario desconocido.
                  @endif
                  
                </td>
                <td data-label="Fecha y hora" class="text-center" style="width:33.3%">
                  <span  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$item->access_timestamp->diffForHumans()}}">
                    {{ $item->access_timestamp}}
                  </span>
                </td>
                <td data-label="Dirección IP" class="text-center" style="width:33.3%">{{ $item->ip }}</td>
              </tr>
          @endforeach
          
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $success->links() }}
      </div>
      <div class="d-flex justify-content-between" >
        <span><h3>Accesos fallidos</h3></span>
        <span> <h3>Total: 
            @if ($failed==null)
                0
            @else
              {{ $failed->count() }}
            @endif  
          </h3></span>
      </div>
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
          @foreach ($failed as $item)
              <tr>
                <td data-label="Usuario"  class="text-center" style="width:33.3%">
                  @if (!empty($item->user))
                    <strong>{{ $item->user->name }}</strong> 
                    ({{$item->user->email}})
                  @else
                      Usuario desconocido.
                  @endif                  
                </td>
                <td data-label="Fecha y hora" class="text-center" style="width:33.3%">
                  <span  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="{{$item->access_timestamp->diffForHumans()}}">
                    {{ $item->access_timestamp}}
                  </span>
              </td>
                <td data-label="Dirección IP" class="text-center" style="width:33.3%">{{ $item->ip }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $failed->links() }}
      </div>
</div>
@endsection