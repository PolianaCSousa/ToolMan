<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Time;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados['times'] = Time::select('id', 'nome', 'descricao', 'lider_id')->with('lider')->get();
        //$dados['lider'] = Time::with('lider')->get();
        //$dados['membros'] = Time::with('funcionarios')->get();
        
        //dd($dados);

        return view('cadastros.times.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dados['funcionarios'] = Funcionario::select('nome', 'cargo','id')->orderBy('nome')->get();

        //dd($dados, $dados['funcionarios']);

        return view('cadastros.times.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        //validação

        //dd($request);
        try{
            DB::beginTransaction();
            $time = new Time();
            $time->lider_id   = $request->lider_id;
            $time->nome       = $request->nome;
            $time->descricao  = $request->descricao;
            $time->save();

            $lider = Funcionario::findOrFail($request->lider_id);
            $lider->time_id = $time->id; //atualiza o id do time na tabela de funcionarios
            $lider->save();

            if($request->membro_id){
                foreach($request->membro_id as $membro_id){
                   
                    $membro = Funcionario::findOrFail($membro_id);
                    $membro->time_id = $time->id;
                    $membro->save();
                }
            }
    
            DB::commit();

            return redirect()->route('time.index');
             //return view('cadastros.times.index');

        }catch(Exception $e){
             DB::rollback();        
            
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados['time'] = Time::findOrFail($id)->load(['lider', 'membros']);
        $dados['funcionarios'] = Funcionario::select('nome', 'id')->orderBy('nome')->get();

        //dd($dados, $dados['time']->membros);

        return view('cadastros.times.show', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validacao

        //dd($request->all());

        try{
            DB::beginTransaction();

            $time = Time::findOrFail($id);
            $time->nome = $request->nome;
            $time->lider_id = $request->lider_id;
            $time->descricao = $request->descricao;
            $time->save();

            //remove o membro em questão do time, deixando o campo de time_id nulo
            if($request->excluidos){
                foreach($request->excluidos as $id_excluido){
                    $membro_excluido = Funcionario::findOrFail($id_excluido);
                    $membro_excluido->time_id = null;
                    $membro_excluido->save();
                }
            }

            //atualiza o campo time_id para os novos membros do time
            if($request->novo_membro_id){
                foreach($request->novo_membro_id as $id_membro){
                    $novo_membro = Funcionario::findOrFail($id_membro);
                    $novo_membro->time_id = $id;
                    $novo_membro->save();
                }
            }

            DB::commit();

            return redirect()->route('time.index');

        }catch(Exception $e){
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
