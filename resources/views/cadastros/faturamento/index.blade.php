@extends('layouts.main')

@section('body')
<div class="container-fluid mt-3">
  <div class="row">
      <div class="col">
        <h1>Exibindo faturamentos</h1>
      </div>
      <div class="col text-end">
        <a href="{{route('home')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
      </div>
  </div>  
</div>

<div class="container text-end">
  <a class="btn btn-primary" href="{{route('faturamento.create')}}">Cadastrar faturamento</a>
</div>


<div class="container mt-3 bg-secondary bg-opacity-25">
  <table>
    <thead>
      <tr>
        <th>Funcionario</th>
        <th>Valor</th>
        <th>Data</th>
        <th class="w-1"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($faturamentos as $k => $f)
        <tr>
          <td>{{$f->funcionario->nome}}</td>
          <td>{{$f->valor}}</td>
          <td>{{$f->data}}</td>
          <td><button class="btn btn-outline-dark">Visualizar</button></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection