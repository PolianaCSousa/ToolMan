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
                    <td class="align-middle"><button type="button" data-method="delete" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
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


    <button type="submit">Salvar alterações</button>

  </form>
</div>

@endsection

@push('scripts')

<script type="module">
  $(document).ready(function(){

    //var qtd_membros = $('tbody tr').length

    //eu posso verificar se a linha com a classe tabela existe, se ela existir é porque nao tem nenhum membro no time, se ela nao existir quer dizer que existem membros no time, ou algo do tipo

    //console.log('qtd_membros: ' + qtd_membros);

    $('#adiciona-membro').click(function(){

      let id_funcionario = $('#membros').val();
      let nome_funcionario = $('#membros option:selected').text();

    console.log(id_funcionario + ' ' + nome_funcionario);

      if($('#tabela').hasClass('membros')) { //isso significa que existem membros no time

        var novoFuncionario = `<tr class="membros" id="tabela">
                                <td><input type="hidden" value="${id_funcionario}" name="membro_id[]" class="form-control form-control-sm"></td>
                                <td><input type="text" class="form-control form-control-sm" id="funcionario" readonly value="${nome_funcionario}"></td>
                                <td class="align-middle"><button type="button" data-method="delete" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                              </tr>`;

        $('#tabela').append(novoFuncionario);

      }else{

        var novoFuncionario = `<tr class="membros" id="tabela">
                                <td><input type="hidden" value="${id_funcionario}" name="membro_id[]" class="form-control form-control-sm"></td>
                                <td><input type="text" class="form-control form-control-sm" id="funcionario" readonly value="${nome_funcionario}"></td>
                                <td class="align-middle"><button type="button" data-method="delete" class="btn btn-crud-sm btn-pill btn-remover-funcionario" title="Excluir funcionário"><i class="ti ti-trash"/></button></td>
                              </tr>`;
        
        $('#tabela').html(novoFuncionario);

      }

    });

    $(document).on('click', '.btn-remover-funcionario', function (){

      $(this).closest('tr').remove();

      //ao remover um funcionario que estava no time, eu posso enviar no request o time_id como null pro funcionário :)

    });

  });
</script>

@endpush