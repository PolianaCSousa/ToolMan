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
    
  <div class="container my-5">
    <select id="membros">
      @foreach($funcionarios as $k => $f)
        <option value="{{$f->id}}" id="nome_membro">{{$f->nome}}</option>
      @endforeach
    </select>

    <button type="button" class="btn btn-sm btn-secondary" id="adiciona-membro"><i class="ti ti-square-rounded-plus"></i></button>
  </div>
    <div class="col-12 my-4">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-responsive-sm table-sm table-hover">
            <thead>
              <tr>
                <th>Membros do time</th>
                <th class="w-1"></th>
              </tr>
            </thead>
            <tbody>
              <tr id="tabela">
                <td class="text-secondary" colspan="2">Sem funcionários vinculados ao time!</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <button type="submit">Salvar</button>

  </form>
</div>

@endsection


@push('scripts')

<script type="module">
  $(document).ready(function() {

    var id = 0;

    $('#adiciona-membro').click(function () {

      var tam = $('tbody tr').length; //calcula a quantidade de linhas da tabela
      console.log(tam);

      id++;
      var id_funcionario = $('#membros').val();
      var nome_funcionario = $('#membros option:selected').text();

      if(tam == 1){

        //preciso pegar o id e o nome do funcionário. além disso, tenho que dar um id e um nome pra cada linha, já que é um array e vou armazenar cada um no bd. Na verdade, eu so preciso do id do funcionario pra eu buscar e ai sim guardar o id do time pra cada funcionario, logo o que me importa na requisição é o id do funcionario, que eu posso enviar em um campo hidden ja que o value do input vai ter que ser o nome pra poder exibir pro usuário
      
        $('#tabela').html(`<tr class="membros">
                            <td><input type="hidden" value="${id_funcionario}" name="membro_id[]" class="form-control form-control-sm"></td>
                            <td><input type="text" class="form-control form-control-sm" id="funcionario`+id+`" readonly value="${nome_funcionario}"></td>
                            <td class="align-middle"><button type="button" data-method="delete" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                          </tr>`);
      }else{

        var novoFuncionario = `<tr class="membros">
                          <td><input type="hidden" value="${id_funcionario}" name="membro_id[]" class="form-control form-control-sm"></td>
                          <td><input type="text" class="form-control form-control-sm" id="funcionario`+id+`" readonly value="${nome_funcionario}"></td>
                          <td class="align-middle"><button type="button" data-method="delete" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                        </tr>`

        $('#tabela').append(novoFuncionario);

      } 

    });

    $(document).on('click', '.btn-remover-funcionario', function(e){

      $(this).closest('tr').remove();

    });
    

  });

</script>

@endpush