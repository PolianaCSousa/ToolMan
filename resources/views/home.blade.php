@extends('layouts.main')

@section('body')

<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <a href="{{route('home')}}" class="navbar-brand">Toolman</a>
    <div>
      <div class="navbar-nav">
        <a href="{{route('funcionario.index')}}" class="nav-link">Funcionários</a>
        <a href="{{route('time.index')}}" class="nav-link">Times</a>
        <a href="{{route('faturamento.index')}}" class="nav-link">Faturamentos</a>
        <a href="{{route('produto.index')}}" class="nav-link">Produtos</a>
        <a href="{{route('venda.index')}}" class="nav-link">Vendas</a>
        @auth
          <a href="{{route('dashboard')}}" class="nav-link">Meu perfil</a>
          <form action="{{route('logout')}}" method="POST">
            @csrf
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();"> Sair</a>
          </form>
        @endauth
        @guest
          <a href="{{route('login')}}" class="nav-link">Entrar</a>
          <a href="{{route('register')}}" class="nav-link">Registrar-se</a>
        @endguest
      </div>
    </div>
  </div>
</nav>




  <div class="m-3 mt-5">
    <h1>Home</h1>
  </div>
  
</div>
  
@endsection