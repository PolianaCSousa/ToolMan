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
    {{-- dd($funcionarios) --}}
    <x-tabler.select name="funcionario_id" label="Funcionários" :dados="$funcionarios"/>
    
  </form>
</div>

@endsection