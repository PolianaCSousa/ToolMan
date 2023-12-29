@extends('layouts.main')

@section('body')
  
  <div class="row">
    <div class="col">
      <a href="{{route('funcionario.index')}}">Funcionários</a>
    </div>
    <div class="col">
      <a href="{{route('time.index')}}">Times</a>
    </div>
    <div class="col">
      <a href="{{route('faturamento.index')}}">Faturamentos</a>
    </div>
  </div>
  <h1>Home</h1>
@endsection