@extends('layouts.main')

@section('body')
 
  <div class="container">
    <h1>Exibindo funcionários</h1>
  </div>

 <div class="container text-end">
  <a class="btn btn-primary" href="{{route('funcionario.create')}}">Cadastrar Funcionário</a>
 </div>

 <div class="container mt-3 bg-secondary bg-opacity-25">
  <table>
    <tr>
      <th>Funcionário</th>
      <th>Cargo</th>
      <th>Time</th>
      <th></th>
    </tr>
    
    @foreach($funcionarios as $k => $f)
    <tr>
      <td>
        {{$f->nome}}
      </td>
      <td>
        {{$f->cargo}}
      </td>
      <td>
        @if(! $f->time)
          Sem time 
        @else
          {{$f->time->nome}}
        @endif
      </td>
      <td>
        <button class="btn btn-outline-dark">Visualizar</button>
      </td>
    </tr>

    @endforeach

  </table>
 </div>
@endsection