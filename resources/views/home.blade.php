@extends('layouts.main')

@section('body')
  
  <div class="row">
    <div class="col">
      <a href="{{route('funcionarios.index')}}">Funcionários</a>
    </div>
    <div class="col">
      <a href="#">Times</a>
    </div>
  </div>
  <h1>Home</h1>
@endsection