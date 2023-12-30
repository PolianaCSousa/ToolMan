@extends('layouts.main')


@section('body')

<div class="container">
  <form method="POST" action="{{route('time.store')}}">
    @csrf
    <label for="lider">Líder:</label>
    <select name="lider_id" id="lider">
      @foreach ($funcionarios as $func)
        <option value="{{$func->id}}">{{$func->nome}}</option>
      @endforeach
    </select>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{old('nome', '')}}">
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" value="{{old('descricao', '')}}">

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
          </tr>
        </thead>
        
        <tbody>
          <tr>
            <td>
              Select pro nome
            </td>
            <td>
              Cargo automático
            </td>
          </tr>
        </tbody>
        

      </table>
    </div>

    <button type="submit">Salvar</button>

  </form>
</div>

@endsection

  
@push('scripts')



@endpush