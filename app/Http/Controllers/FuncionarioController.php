<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('cadastros.funcionarios.create')
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

            return view('cadastros.funcionarios.index');

        }catch(Exception $e){
            DB::rollBack();

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
