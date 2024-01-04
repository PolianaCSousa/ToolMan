@extends('layouts.main')

@section('body')

<div class="container-fluid mb-5 mt-3">
  <div class="row">
    <div class="col">
      Exibindo Time
    </div>
    <div class="col text-end">
      <a href="{{route('time.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container">
  <form action="{{route('time.update', $time->id)}}" method="POST">
    @method('PUT')
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{old('nome', $time->nome)}}">

    <label for="lider">Líder:</label>
    <select name="lider_id" id="lider">
      @foreach($funcionarios as $f)
        <option value="{{$f->id}}" @if($f->id == $time->lider->id) selected @endif>{{$f->nome}}</option>
      @endforeach
    </select>

    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" value="{{old('descricao', $time->descricao)}}">

    <div class="container my-5">
      <select id="membros">
        @foreach($funcionarios as $k => $f)
          <option value="{{$f->id}}">{{$f->nome}}</option>
        @endforeach
      </select>

      <button type="button" id="adiciona-membro"><i class="ti ti-square-rounded-plus" title="Adicionar membro"></i></button>
    </div>

    <div class="col-12 my-4">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-responsive-sm table-sm table-hover">
            <thead>
              <tr>
                <th class="w-1"></th>
                <th>Membros do time</th>
                <th class="w-1"></th>
              </tr>
            </thead>
            <tbody>

              @if($time->membros)
                @foreach($time->membros as $membro)
                  <tr class="membros" id="tabela">
                    <td><input type="hidden" value="{{$membro->id}}" name="membro_id[]" class="form-control form-control-sm"></td>
                    <td><input type="text" class="form-control form-control-sm" id="funcionario" readonly value="{{$membro->nome}}"></td>
                    <td class="align-middle"><button type="button" data-id="{{$membro->id}}" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                  </tr>
                @endforeach

              @else
                <tr id="tabela">
                  <td class="text-secondary" colspan="2">Sem funcionários vinculados ao time!</td>
                </tr>
              @endif
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="excluidos">
      
    </div>
        

    <button type="submit">Salvar alterações</button>

  </form>
</div>

@endsection

@push('scripts')

<script type="module">
  $(document).ready(function(){

    $('#adiciona-membro').click(function(){

      let id_funcionario = $('#membros').val();
      let nome_funcionario = $('#membros option:selected').text();

    console.log(id_funcionario + ' ' + nome_funcionario);

      if($('#tabela').hasClass('membros')) { //isso significa que existem membros no time

        var novoFuncionario = `<tr class="membros" id="tabela">
                                <td><input type="hidden" value="${id_funcionario}" name="novo_membro_id[]" class="form-control form-control-sm"></td>
                                <td><input type="text" class="form-control form-control-sm" id="funcionario" readonly value="${nome_funcionario}"></td>
                                <td class="align-middle"><button type="button" data-id="${id_funcionario}" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                              </tr>`;

        $('#tabela').append(novoFuncionario);

      }else{ //não havia membros no time

        var novoFuncionario = `<tr class="membros" id="tabela">
                                <td><input type="hidden" value="${id_funcionario}" name="novo_membro_id[]" class="form-control form-control-sm"></td>
                                <td><input type="text" class="form-control form-control-sm" id="funcionario" readonly value="${nome_funcionario}"></td>
                                <td class="align-middle"><button type="button" data-id="${id_funcionario}" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                              </tr>`;
        
        $('#tabela').html(novoFuncionario);

      }

    });

    $(document).on('click', '.btn-remover-funcionario', function (){

      //antes de remover, pega o id do funcionário que foi excluído do time
      let id_membro_excluido = $(this).data('id');
      $(this).closest('tr').remove();

      //cria inputs do tipo hidden com o id do funcionario que foi excluído
      $('.excluidos').append(`<input type="hidden" name="excluidos[]" value="${id_membro_excluido}">`);

      //console.log(id_membro_excluido);

    });

  });
</script>

@endpush