@extends('layouts.main')

@section('body')
 
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col">
        <h1>Exibindo funcionários</h1>
      </div>
      <div class="col text-end">
        <a href="{{route('home')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
      </div>
    </div>
    
  </div>

 <div class="container text-end">
  <a class="btn btn-primary" href="{{route('funcionario.create')}}">Cadastrar Funcionário</a>
 </div>

 <div class="container mt-3 bg-secondary bg-opacity-25">
  <table>
    <thead>
      <tr>
        <th>Funcionário</th>
        <th>Cargo</th>
        <th>Time</th>
        <th class="w-1"></th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($funcionarios as $k => $f)
      <tr>
        <td>{{$f->nome}}</td>
        <td>{{$f->cargo}}</td>
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
    </tbody>
    
  </table>
 </div>
@endsection