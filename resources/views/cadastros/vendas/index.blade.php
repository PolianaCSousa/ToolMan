@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col">
      <h1>Exibindo Vendas</h1>
    </div>
    
    <div class="col text-end">
      <a href="{{route('home')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container text-end">
  <a class="btn btn-primary" href="{{route('venda.create')}}">Cadastrar Venda</a>
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
      @foreach($vendas as $k => $v)
        <tr>
          <td>{{$v->}}</td>
          <td>{{$v->}}</td>
          <td>{{$v->data}}</td>
          <td><a href="{{route('venda.show', $p->id)}}" class="btn btn-outline-dark">Visualizar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection