@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col">
      <h1>Exibindo Times</h1>
    </div>
    
    <div class="col text-end">
      <a href="{{route('home')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container text-end">
  <a class="btn btn-primary" href="{{route('time.create')}}">Cadastrar Time</a>
</div>

<div class="container mt-3 bg-secondary bg-opacity-25">
  <table >
    <thead>
      <tr>
        <th>Nome</th>
        <th>Líder</th>
        <th>Descrição</th>
        <th class="w-1"></th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($times as $k => $t)
      <tr>
        <td>{{$t->nome}}</td>
        <td>{{$t->lider->nome}}</td>
        <td>{{$t->descricao}}</td>
        <td><a href="{{route('time.show', $t->id)}}" class="btn btn-outline-dark">Visualizar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection