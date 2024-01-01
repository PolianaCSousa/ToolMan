<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
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
        
       //dd($dados, $dados['funcionarios']);

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
            $funcionario->time_id   =  $request->time;
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
        //dd($id);
        //$dados['funcionario'] = Funcionario::where('id', $id)->firstOrFail();
        $dados['funcionario'] = Funcionario::where('id', $id)->firstOrFail();
        $dados['time'] = $dados['funcionario']->time;
        //$dados['time'] = Funcionario::where('id', $id)->select('time_id')->with('time')->get();
        //$teste = Funcionario::find($id);
        //$teste->load('time');
        
        //$funcionario = Funcionario::find($id);
        //$sql = $funcionario->toSql();
        //dd($sql);

        dd($dados);

        return view('cadastros.funcionarios.show');
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
