<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastros.times.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dados['funcionarios'] = Funcionario::select('nome', 'id')->orderBy('nome')->get();

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

        /*$time = new Time();
        $time->lider_id   = $request->lider_id;
        $time->nome       = $request->nome;
        $time->descricao  = $request->descricao;
        */
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
