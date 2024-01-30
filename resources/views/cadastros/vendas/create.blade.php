@extends('layouts.main')

@section('body')

<div class="container-fluid mb-5 mt-3">
  <div class="row">
    <div class="col">
        Cadastrando uma venda
    </div>
    <div class="col text-end">
      <a href="{{route('venda.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>


<div class="container">
  <form action="{{route('venda.store')}}" method="POST">
    @csrf
    
    <x-tabler.select name="funcionario_id" label="Funcionário" :dados="$funcionarios"/>
    <x-tabler.select name="produto_id" label="Produto" :dados="$produtos"/>
    <x-tabler.input label="Quantidade" name="quantidade" type="number"/>
    <input type="date" name="data">

    <button  type="submit">Salvar</button>
    
  </form>
</div>

@endsection