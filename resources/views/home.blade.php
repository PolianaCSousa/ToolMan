@extends('layouts.main')

@section('body')
  
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <a class="btn btn-primary" href="{{route('funcionario.index')}}">Funcionários</a>
    </div>
    <div class="col">
      <a class="btn btn-primary" href="{{route('time.index')}}">Times</a>
    </div>
    <div class="col">
      <a class="btn btn-primary" href="{{route('faturamento.index')}}">Faturamentos</a>
    </div>
  </div>

  <div class="m-3 mt-5">
    <h1>Home</h1>
  </div>
  
</div>
  
@endsection