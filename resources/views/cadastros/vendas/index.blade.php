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

@endsection