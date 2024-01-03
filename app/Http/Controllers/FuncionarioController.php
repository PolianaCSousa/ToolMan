<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Time;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$dados = new Collection();
        $dados['funcionarios'] = Funcionario::select('id', 'nome', 'cargo', 'time_id')->with('time')->orderBy('nome')->get();
        //$dados['funcionarios'] = Funcionario::with('time')->orderBy('nome')->get();

        //NAO FUNCIONOU: $dados['load'] = Funcionario::select('id', 'nome', 'cargo')->orderBy('nome')->get()->load('time');


        
       //dd($dados);

        return view('cadastros.funcionarios.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastros.funcionarios.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->nome);
        //$request->validate([]);

        try{
            DB::beginTransaction();

            $funcionario = new Funcionario();
            $funcionario->nome      =  $request->nome;
            $funcionario->cargo     =  $request->cargo;
            $funcionario->codigo    =  $request->codigo;
            $funcionario->salario   =  $request->salario;
            $funcionario->telefone  =  $request->telefone;
            $funcionario->save();

            DB::commit();

            return redirect()->route('funcionario.index');

        }catch(Exception $e){
            DB::rollBack();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $dados['funcionario'] = Funcionario::findOrFail($id)->load(['time', 'lideranca']);
        $dados['times'] = Time::select('nome', 'id')->orderBy('nome')->get();;

        //dd($dados);

        return view('cadastros.funcionarios.show', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validação

        try{
            DB::beginTransaction();

            $funcionario           = Funcionario::findOrFail($id);
            $funcionario->nome     = $request->nome;
            $funcionario->time_id  = $request->time_id;
            $funcionario->cargo    = $request->cargo;
            $funcionario->codigo   = $request->codigo;
            $funcionario->salario  = $request->salario;
            $funcionario->telefone = $request->telefone;
            $funcionario->save();

            DB::commit();

            return redirect()->route('funcionario.index');

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
