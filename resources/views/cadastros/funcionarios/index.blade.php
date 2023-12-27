@extends('layouts.main')

@section('body')
 <h1>Exibindo funcionários</h1>

 <a role="button" href="{{route('funcionarios.create')}}">Cadastrar Funcionário</a>
@endsection