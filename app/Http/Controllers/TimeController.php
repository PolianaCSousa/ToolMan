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
        $dados['time'] = Time::select('nome', 'descricao', 'lider_id')->with('lider')->get();
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

            //FARIA UM FORAEACH AQUI PRA SALVAR O TIME_ID PARA CADA MEMBRO DO TIME
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
