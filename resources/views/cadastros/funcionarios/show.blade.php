@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3 mb-5">
  <div class="row">
    <div class="col">
      <h1>Exibindo funcionário</h1>
    </div>
    <div class="col text-end">
      <a href="{{route('funcionario.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container">
  <form action="#">
    <input type="text" name="nome" value="{{old('nome', )}}">
  </form>
</div>

@endsection